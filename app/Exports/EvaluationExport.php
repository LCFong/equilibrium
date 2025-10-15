<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EvaluationExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        $pssOptions = config('evaluation.pssOptions');
        $wellbeingOptions = config('evaluation.wellbeingOptions');
        $learningOptions = config('evaluation.learningOptions');

        // 建立選項映射表
        $optionMaps = [
            'pss' => array_column($pssOptions, 'label', 'value'),
            'wellbeing' => array_column($wellbeingOptions, 'label', 'value'),
            'learning' => array_column($learningOptions, 'label', 'value'),
        ];

        $users = User::with(['evaluations' => function ($query) {
            $query->orderBy('user_id');
        }, 'evaluations.items.question'])->get();

        $data = collect();

        // 首先收集所有可能的問題（作為表頭）
        $allQuestions = [];
        foreach ($users as $user) {
            foreach ($user->evaluations as $evaluation) {
                foreach ($evaluation->items->toArray() as $item) {
                    if (isset($item['question']) && is_array($item['question'])) {
                        $allQuestions[$item['question']['code']] = [
                            'title' => $item['question']['title'],
                            'category' => $item['question']['category'] // 保存分類資訊
                        ];
                    }
                }
            }
        }

        // 為每個 evaluation 創建一行數據
        foreach ($users as $user) {
            foreach ($user->evaluations as $evaluation) {
                $row = ['用戶' => $user->name];

                // 初始化所有問題值為空
                foreach ($allQuestions as $code => $questionInfo) {
                    $row[$code] = '';
                }

                // 填充該 evaluation 的實際答案
                foreach ($evaluation->items->toArray() as $item) {
                    if (isset($item['question']) && is_array($item['question']) && isset($item['value'])) {
                        $code = $item['question']['code'];
                        $category = $item['question']['category'];
                        $value = $item['value'];

                        // 根據分類轉換數值為 label
                        if (isset($optionMaps[$category]) && isset($optionMaps[$category][$value])) {
                            $row[$code] = $optionMaps[$category][$value];
                        } else {
                            // 如果找不到對應的 label，保持原值
                            $row[$code] = $value;
                        }
                    }
                }

                $data->push($row);
            }
        }

        return $data;
    }

    public function headings(): array
    {
        $users = User::with('evaluations.items.question')->get();

        $headings = ['用戶'];
        $questionCodes = [];

        foreach ($users as $user) {
            foreach ($user->evaluations as $evaluation) {
                foreach ($evaluation->items->toArray() as $item) {
                    if (
                        isset($item['question']) &&
                        is_array($item['question']) &&
                        !in_array($item['question']['code'], $questionCodes)
                    ) {
                        $questionCodes[] = $item['question']['code'];
                        $headings[] = $item['question']['title'];
                    }
                }
            }
        }

         return [
            ['问卷结果'], // 第一行標題
            $headings        // 第二行欄位標題
        ];
    }

    public function title(): string
    {
        return '问卷结果';
    }
    

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EvaluationQuestion;

class EvaluationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ["category"=>"normal","code"=>"p1","type"=>"seven_options","title"=>"我的朋友们对我的决定有很大的影响。"],
            ["category"=>"normal","code"=>"p2","type"=>"seven_options","title"=>"您对我们产品的整体满意度如何？"],
            ["category"=>"normal","code"=>"p3","type"=>"seven_options","title"=>"您觉得我们的服务响应时间是否满意？"],
            ["category"=>"normal","code"=>"p4","type"=>"seven_options","title"=>"您在使用产品时遇到的技术问题是否得到及时解决？"],
            ["category"=>"normal","code"=>"p5","type"=>"seven_options","title"=>"您认为我们的产品质量是否符合您的期望？"],
            ["category"=>"normal","code"=>"p6","type"=>"seven_options","title"=>"您在购买过程中是否感到顺畅和便捷？"],
            ["category"=>"normal","code"=>"p7","type"=>"seven_options","title"=>"我们的员工是否提供了专业和友好的服务？"],
            ["category"=>"normal","code"=>"p8","type"=>"seven_options","title"=>"您对我们提供的信息和支持的清晰度是否满意？"],
            ["category"=>"normal","code"=>"p9","type"=>"seven_options","title"=>"您是否愿意向他人推荐我们的产品或服务？"],
            ["category"=>"normal","code"=>"p10","type"=>"seven_options","title"=>"您对我们的定价是否感到合理？"],
            ["category"=>"normal","code"=>"p11","type"=>"seven_options","title"=>"请分享您对我们产品或服务的任何其他意见或建议。"],
        ];
        EvaluationQuestion::insert($data);
    }

}
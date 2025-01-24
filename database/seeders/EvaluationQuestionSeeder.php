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
        // $data=[
        //     ["category"=>"normal","code"=>"p1","type"=>"seven_options","title"=>"我的朋友们对我的决定有很大的影响。"],
        //     ["category"=>"normal","code"=>"p2","type"=>"seven_options","title"=>"您对我们产品的整体满意度如何？"],
        //     ["category"=>"normal","code"=>"p3","type"=>"seven_options","title"=>"您觉得我们的服务响应时间是否满意？"],
        //     ["category"=>"normal","code"=>"p4","type"=>"seven_options","title"=>"您在使用产品时遇到的技术问题是否得到及时解决？"],
        //     ["category"=>"normal","code"=>"p5","type"=>"seven_options","title"=>"您认为我们的产品质量是否符合您的期望？"],
        //     ["category"=>"normal","code"=>"p6","type"=>"seven_options","title"=>"您在购买过程中是否感到顺畅和便捷？"],
        //     ["category"=>"normal","code"=>"p7","type"=>"seven_options","title"=>"我们的员工是否提供了专业和友好的服务？"],
        //     ["category"=>"normal","code"=>"p8","type"=>"seven_options","title"=>"您对我们提供的信息和支持的清晰度是否满意？"],
        //     ["category"=>"normal","code"=>"p9","type"=>"seven_options","title"=>"您是否愿意向他人推荐我们的产品或服务？"],
        //     ["category"=>"normal","code"=>"p10","type"=>"seven_options","title"=>"您对我们的定价是否感到合理？"],
        //     ["category"=>"normal","code"=>"p11","type"=>"seven_options","title"=>"请分享您对我们产品或服务的任何其他意见或建议。"],
        // ];

        $pss=[
            ["category"=>"pss","code"=>"p1","type"=>"five_options","title"=>"1.在过去的一个月里，您有多少次因为意外发生的事情而感到不安？"],
            ["category"=>"pss","code"=>"p2","type"=>"five_options","title"=>"2.在过去的一个月里，您有多少次感到无法控制生活中重要的事情?"],
            ["category"=>"pss","code"=>"p3","type"=>"five_options","title"=>"3.在过去的一个月里，您有多少次感到紧张和“有压力”?"],
            ["category"=>"pss","code"=>"p4","type"=>"five_options","title"=>"4.在过去的一个月里，您有多少次成功处理日常问题和烦恼？"],
            ["category"=>"pss","code"=>"p5","type"=>"five_options","title"=>"5.在过去的一个月里，您有多少次觉得自己有效地应对了生活中的重要变化？"],
            ["category"=>"pss","code"=>"p6","type"=>"five_options","title"=>"6.在过去的一个月里，您有多少次对自己能够处理个人问题的能力感到自信?"],
            ["category"=>"pss","code"=>"p7","type"=>"five_options","title"=>"7.在过去的一个月里，您有多少次感到事情按照你的计划进行？"],
            ["category"=>"pss","code"=>"p8","type"=>"five_options","title"=>"8.在过去的一个月里，您有多少次发现自己无法应对所有您必须要做的事情?"],
            ["category"=>"pss","code"=>"p9","type"=>"five_options","title"=>"9.在过去的一个月里，您有多少次能够把控好生活中的烦心事?"],
            ["category"=>"pss","code"=>"p10","type"=>"five_options","title"=>"10.在过去的一个月里，您有多少次觉得一切尽在掌握?"],
            ["category"=>"pss","code"=>"p11","type"=>"five_options","title"=>"11.在过去的一个月里，因为一些超出您控制范围的事情，您有多少次感到愤怒?"],
            ["category"=>"pss","code"=>"p12","type"=>"five_options","title"=>"12.在过去的一个月里，您有多少次发现自己正在思考必须完成的事情？"],
            ["category"=>"pss","code"=>"p13","type"=>"five_options","title"=>"13.在过去的一个月里，您有多少次能够控制自己安排时间的方式？"],
            ["category"=>"pss","code"=>"p14","type"=>"five_options","title"=>"14.在过去的一个月里，您有多少次感到困难堆积如山，以至于无法克服它们？"],
        ];
        EvaluationQuestion::insert($pss);

        $wellbeing=[
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直对未来感到乐观"], 
            ["category"=>"wellbeing","code"=>"w2","type"=>"five_options","title"=>"我一直感到自己是有用"],
            ["category"=>"wellbeing","code"=>"w3","type"=>"five_opti ons","title"=>"我一直感觉轻松"],
            ["category"=>"wellbeing","code"=>"w4","type"=>"five_options","title"=>"我对别人的事情感兴趣"],
            ["category"=>"wellbeing","code"=>"w5","type"=>"five_options","title"=>"我有很多精力和能量"],
            ["category"=>"wellbeing","code"=>"w6","type"=>"five_options","title"=>"我一直能妥善地处理问题"],
            ["category"=>"wellbeing","code"=>"w7","type"=>"five_options","title"=>"我一直能清晰地思考"],
            ["category"=>"wellbeing","code"=>"w8","type"=>"five_options","title"=>"我对自己感觉良好"],
            ["category"=>"wellbeing","code"=>"w9","type"=>"five_options","title"=>"我一直感觉与人亲近"],
            ["category"=>"wellbeing","code"=>"w10","type"=>"five_options","title"=>"我觉得自信"],
            ["category"=>"wellbeing","code"=>"w11","type"=>"five_options","title"=>"我一直能对事情做决定"],
            ["category"=>"wellbeing","code"=>"w12","type"=>"five_options","title"=>"我感觉被爱"],
            ["category"=>"wellbeing","code"=>"w13","type"=>"five_options","title"=>"我对新鲜事情感兴趣"],
            ["category"=>"wellbeing","code"=>"w14","type"=>"five_options","title"=>"我感觉愉快"],        
        ];
        EvaluationQuestion::insert($wellbeing);

        $learning=[
            ["category"=>"learning","code"=>"l1","type"=>"seven_options","title"=>"1 因为当我发现以前从未见过的新事物时，我能体验到乐趣。"], 
            ["category"=>"learning","code"=>"l2","type"=>"seven_options","title"=>"2 因为我的学业让我能够继续了解许多我感兴趣的事物。"], 
            ["category"=>"learning","code"=>"l3","type"=>"seven_options","title"=>"3 因为当我在某项个人成就上超越自我时，我能体验到乐趣。"], 
            ["category"=>"learning","code"=>"l4","type"=>"seven_options","title"=>"4 因为大学让我在追求学业卓越的过程中能体验到一种个人满足感。"], 
            ["category"=>"learning","code"=>"l5","type"=>"seven_options","title"=>"5 因为当我阅读有趣的作者的作品时，我能体验到乐趣。"], 
            ["category"=>"learning","code"=>"l6","type"=>"seven_options","title"=>"6 因为当我完全沉浸在某些作者所写的内容中时，我能体验到乐趣。"], 
            ["category"=>"learning","code"=>"l7","type"=>"seven_options","title"=>"7 因为我认为大学教育将有助于我为自己所选的职业更好地做准备。"], 
            ["category"=>"learning","code"=>"l8","type"=>"seven_options","title"=>"8 因为最终它将使我能够进入我喜欢的领域的就业市场。"], 
            ["category"=>"learning","code"=>"l9","type"=>"seven_options","title"=>"9 因为当我在大学里取得成功时，我会觉得自己很重要。"], 
            ["category"=>"learning","code"=>"l10","type"=>"seven_options","title"=>"10 因为我想向自己证明我能在学业上取得成功。"], 
            ["category"=>"learning","code"=>"l11","type"=>"seven_options","title"=>"11 为了以后能获得一份更有声望的工作。"], 
            ["category"=>"learning","code"=>"l12","type"=>"seven_options","title"=>"12 为了以后能有一份更高的薪水。"], 
            ["category"=>"learning","code"=>"l13","type"=>"seven_options","title"=>"13 我不明白自己为什么要上大学，坦率地说，我一点也不在乎。"], 
            ["category"=>"learning","code"=>"l14","type"=>"seven_options","title"=>"14 我不知道；我不明白自己在学校里做什么。"], 
        ];
        EvaluationQuestion::insert($learning);

       }

}
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
            ["category"=>"pss","code"=>"p1","type"=>"five_options","title"=>"1. In the last month, how often have you been upset because of something that happened unexpectedly?"],
            ["category"=>"pss","code"=>"p2","type"=>"five_options","title"=>"2. In the last month, how often have you felt that you were unable to control the important things in your life?"],
            ["category"=>"pss","code"=>"p3","type"=>"five_options","title"=>"3. In the last month, how often have you felt nervous and 'stressed'?"],
            ["category"=>"pss","code"=>"p4","type"=>"five_options","title"=>"4. In the last month, how often have you dealt successfully with day to day problems and annoyances"],
            ["category"=>"pss","code"=>"p5","type"=>"five_options","title"=>"5. In the last month, how often have you felt that you were effectively coping with important changes that were occurring in your life?"],
            ["category"=>"pss","code"=>"p6","type"=>"five_options","title"=>"6. In the last month, how often have you felt confident about your ability to handle your personal problems?"],
            ["category"=>"pss","code"=>"p7","type"=>"five_options","title"=>"7. In the last month, how often have you felt that things were going your way?"],
            ["category"=>"pss","code"=>"p8","type"=>"five_options","title"=>"8. In the last month, how often have you found that you could not cope with all the things that you had to do?"],
            ["category"=>"pss","code"=>"p9","type"=>"five_options","title"=>"9. In the last month, how often have you been able to control irritations in your life?"],
            ["category"=>"pss","code"=>"p10","type"=>"five_options","title"=>"10. In the last month, how often have you felt that you were on top of things?"],
            ["category"=>"pss","code"=>"p11","type"=>"five_options","title"=>"11. In the last month, how often have you been angered because of things that were outside your control?"],
            ["category"=>"pss","code"=>"p12","type"=>"five_options","title"=>"12. In the last month, how often have you found yourself thinking about things that you have to accomplish"],
            ["category"=>"pss","code"=>"p13","type"=>"five_options","title"=>"13. In the last month, how often have you been able to control the way you spend your time"],
            ["category"=>"pss","code"=>"p14","type"=>"five_options","title"=>"14. In the last month, how often have you felt difficulties were piling up so high that you could not overcome them?"],
        ];
        EvaluationQuestion::insert($pss);

        $wellbeing=[
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直对未来感到乐观"], 
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直感到自己是有用"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直感觉轻松"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我对别人的事情感兴趣"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我有很多精力和能量"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直能妥善地处理问题"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直能清晰地思考"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我对自己感觉良好"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直感觉与人亲近"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我觉得自信"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我一直能对事情做决定"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我感觉被爱"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我对新鲜事情感兴趣"],
            ["category"=>"wellbeing","code"=>"w1","type"=>"five_options","title"=>"我感觉愉快"],        
        ];
        EvaluationQuestion::insert($wellbeing);
    }

}
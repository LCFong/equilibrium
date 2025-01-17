<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConsultationOption;

class ConsultationOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ["category"=>"peer","code"=>"p1","type"=>"options","title"=>"我的朋友们对我的决定有很大的影响。" ,"classify"=>"positive"],
            ["category"=>"peer","code"=>"p2","type"=>"options","title"=>"我常常感到需要迎合同伴的期望。","classify"=>"positive"],
            ["category"=>"peer","code"=>"p3","type"=>"options","title"=>"我在社交场合中感到不安，担心别人对我的看法。 ","classify"=>"negative"],
            ["category"=>"peer","code"=>"p4","type"=>"options","title"=>"我愿意为了融入群体而改变自己的意见或行为。 ","classify"=>"negative"],
            ["category"=>"peer","code"=>"p5","type"=>"input","title"=>"请描述一个具体的情况，您感受到同伴影响的经历。 ","classify"=>null],
            ["category"=>"study","code"=>"p6","type"=>"options","title"=>"我经常感到学业负担沉重。 ","classify"=>"positive"],
            ["category"=>"study","code"=>"p7","type"=>"options","title"=>"我担心自己的学业成绩会影响未来的机会。 ","classify"=>"positive"],
            ["category"=>"study","code"=>"p8","type"=>"options","title"=>"我觉得自己在学习上有时感到无助。 ","classify"=>"negative"],
            ["category"=>"study","code"=>"p9","type"=>"options","title"=>"我为即将到来的考试感到焦虑。 ","classify"=>"negative"],
            ["category"=>"study","code"=>"p10","type"=>"input","title"=>"请描述您在学业上遇到的一个主要压力源。 ","classify"=>null],
            ["category"=>"interpersonal","code"=>"p11","type"=>"options","title"=>"我与朋友和家人之间的关系让我感到压力。 ","classify"=>"positive"],
            ["category"=>"interpersonal","code"=>"p12","type"=>"options","title"=>"我经常担心与他人的交流是否顺畅。 ","classify"=>"positive"],
            ["category"=>"interpersonal","code"=>"p13","type"=>"options","title"=>"我在与人交往时常常感到紧张。 ","classify"=>"negative"],
            ["category"=>"interpersonal","code"=>"p14","type"=>"options","title"=>"我觉得自己在群体中常常被忽视。 ","classify"=>"negative"],
            ["category"=>"interpersonal","code"=>"p15","type"=>"input","title"=>"请分享一个您在人际关系中面临的挑战。 ","classify"=>null],
            ["category"=>"sleep","code"=>"p16","type"=>"options","title"=>"我经常感到无缘无故的紧张或焦虑。 ","classify"=>"positive"],
            ["category"=>"sleep","code"=>"p17","type"=>"options","title"=>"我在日常生活中有时感到不安。 ","classify"=>"positive"],
            ["category"=>"sleep","code"=>"p18","type"=>"options","title"=>"我对未来感到不确定和焦虑。 ","classify"=>"negative"],
            ["category"=>"sleep","code"=>"p19","type"=>"options","title"=>"我有时会因为小事而感到过度担忧。 ","classify"=>"negative"],
            ["category"=>"sleep","code"=>"p120","type"=>"input","title"=>"请描述您感到焦虑的一个具体情况。 ","classify"=>null],
        ];
        ConsultationOption::insert($data);
    }
}


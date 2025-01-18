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
        // $data=[
        //     ["category"=>"peer","code"=>"p1","type"=>"options","title"=>"我的朋友们对我的决定有很大的影响。" ,"classify"=>"positive"],
        //     ["category"=>"peer","code"=>"p2","type"=>"options","title"=>"我常常感到需要迎合同伴的期望。","classify"=>"positive"],
        //     ["category"=>"peer","code"=>"p3","type"=>"options","title"=>"我在社交场合中感到不安，担心别人对我的看法。 ","classify"=>"negative"],
        //     ["category"=>"peer","code"=>"p4","type"=>"options","title"=>"我愿意为了融入群体而改变自己的意见或行为。 ","classify"=>"negative"],
        //     ["category"=>"peer","code"=>"p5","type"=>"input","title"=>"请描述一个具体的情况，您感受到同伴影响的经历。 ","classify"=>null],
        //     ["category"=>"study","code"=>"p6","type"=>"options","title"=>"我经常感到学业负担沉重。 ","classify"=>"positive"],
        //     ["category"=>"study","code"=>"p7","type"=>"options","title"=>"我担心自己的学业成绩会影响未来的机会。 ","classify"=>"positive"],
        //     ["category"=>"study","code"=>"p8","type"=>"options","title"=>"我觉得自己在学习上有时感到无助。 ","classify"=>"negative"],
        //     ["category"=>"study","code"=>"p9","type"=>"options","title"=>"我为即将到来的考试感到焦虑。 ","classify"=>"negative"],
        //     ["category"=>"study","code"=>"p10","type"=>"input","title"=>"请描述您在学业上遇到的一个主要压力源。 ","classify"=>null],
        //     ["category"=>"interpersonal","code"=>"p11","type"=>"options","title"=>"我与朋友和家人之间的关系让我感到压力。 ","classify"=>"positive"],
        //     ["category"=>"interpersonal","code"=>"p12","type"=>"options","title"=>"我经常担心与他人的交流是否顺畅。 ","classify"=>"positive"],
        //     ["category"=>"interpersonal","code"=>"p13","type"=>"options","title"=>"我在与人交往时常常感到紧张。 ","classify"=>"negative"],
        //     ["category"=>"interpersonal","code"=>"p14","type"=>"options","title"=>"我觉得自己在群体中常常被忽视。 ","classify"=>"negative"],
        //     ["category"=>"interpersonal","code"=>"p15","type"=>"input","title"=>"请分享一个您在人际关系中面临的挑战。 ","classify"=>null],
        //     ["category"=>"sleep","code"=>"p16","type"=>"options","title"=>"我经常感到无缘无故的紧张或焦虑。 ","classify"=>"positive"],
        //     ["category"=>"sleep","code"=>"p17","type"=>"options","title"=>"我在日常生活中有时感到不安。 ","classify"=>"positive"],
        //     ["category"=>"sleep","code"=>"p18","type"=>"options","title"=>"我对未来感到不确定和焦虑。 ","classify"=>"negative"],
        //     ["category"=>"sleep","code"=>"p19","type"=>"options","title"=>"我有时会因为小事而感到过度担忧。 ","classify"=>"negative"],
        //     ["category"=>"sleep","code"=>"p120","type"=>"input","title"=>"请描述您感到焦虑的一个具体情况。 ","classify"=>null],
        // ];
        // ConsultationOption::insert($data);

        $peer=[
            ["category"=>"peer","code"=>"p1","type"=>"options","title"=>"获得同伴的陪伴、安慰和鼓励","classify"=>'正向作用'],
            ["category"=>"peer","code"=>"p2","type"=>"options","title"=>"在学习、工作或生活中，获得同伴的帮助和协作","classify"=>'正向作用'],
            ["category"=>"peer","code"=>"p3","type"=>"options","title"=>"从同伴中学习到健康的压力应对方法，如冥想、运动或问题解决","classify"=>'正向作用'],
            ["category"=>"peer","code"=>"p4","type"=>"options","title"=>"与同伴的密切关系，增强我的归属感和安全感","classify"=>'正向作用'],
            ["category"=>"peer","code"=>"p5","type"=>"options","title"=>"同伴表现优异，导致我对自身能力产生怀疑","classify"=>'反向作用'],
            ["category"=>"peer","code"=>"p6","type"=>"options","title"=>"过度的同伴竞争，尤其在学业或职业领域","classify"=>'反向作用'],
            ["category"=>"peer","code"=>"p7","type"=>"options","title"=>"被同伴排斥或孤立","classify"=>'反向作用'],
            ["category"=>"peer","code"=>"p8","type"=>"options","title"=>"同伴群体倾向于采用逃避、抱怨或其他不健康的压力应对方式","classify"=>'反向作用'],
            ["category"=>"peer","code"=>"p9","type"=>"options","title"=>"同伴群体对成功、责任或表现的高要求可能成为压力源，我在试图符合这些期望","classify"=>'群体特性'],
            ["category"=>"peer","code"=>"p10","type"=>"options","title"=>"群体中不提倡开放的沟通和情感表达","classify"=>'群体特性'],
            ["category"=>"peer","code"=>"p11","type"=>"options","title"=>"为了获得群体认同，我感受到同伴施加的压力，例如参与某些活动、表现特定行为或达到特定目标","classify"=>'群体特性'],
            ["category"=>"peer","code"=>"p12","type"=>"options","title"=>"在群体中地位较低的，我需要更多努力去争取认同","classify"=>'群体特性'],
            ["category"=>"peer","code"=>"p13","type"=>"options","title"=>"消极的应对方式：如共同抱怨或过度依赖","classify"=>'群体应对压力策略'],
            ["category"=>"peer","code"=>"p14","type"=>"options","title"=>"同伴群体间讨论问题、寻求解决方法或情感发泄","classify"=>'群体应对压力策略'],
            ["category"=>"peer","code"=>"p15","type"=>"options","title"=>"同伴的协助，减少我任务的负担","classify"=>'群体应对压力策略'],
            ["category"=>"peer","code"=>"p16","type"=>"input","title"=>"其它你感知到的同伴影响有哪些？","classify"=>'扩大数据类型'],
            ["category"=>"peer","code"=>"p17","type"=>"input","title"=>"你可以在这里更详细的用文字进行人际关系问题的描述。","classify"=>'扩大数据类型'],
        ];
        ConsultationOption::insert($peer);
        
        $study=[
            ["category"=>"study","code"=>"s1","type"=>"options","title"=>"课程负担重、作业量大、考试频繁。","classify"=>'学习任务'],
            ["category"=>"study","code"=>"s2","type"=>"options","title"=>"对成绩的高度关注以及奖学金、保研等竞争带来的压力","classify"=>'学业成绩'],
            ["category"=>"study","code"=>"s3","type"=>"options","title"=>"学习与其他事务（如社交、兼职）的平衡困难","classify"=>'时间管理'],
            ["category"=>"study","code"=>"s4","type"=>"options","title"=>"对毕业后的就业和发展方向的不确定性","classify"=>'职业前景'],
            ["category"=>"study","code"=>"s5","type"=>"options","title"=>"来自家长、老师或同学的高期待可能放大压力感知","classify"=>'他人期望'],
            ["category"=>"study","code"=>"s6","type"=>"options","title"=>"学业任务视为不可控的威胁，从而导致拖延、回避","classify"=>'高压力感知体验'],
            ["category"=>"study","code"=>"s7","type"=>"options","title"=>"引发焦虑、抑郁等情绪，导致失眠、食欲不振等问题","classify"=>'高压力感知体验'],
            ["category"=>"study","code"=>"s8","type"=>"options","title"=>"将学业压力转化为动力，保持良好的学习状态","classify"=>'低压力感知体验'],
            ["category"=>"study","code"=>"s9","type"=>"options","title"=>"采用积极的应对策略，如时间管理或寻求支持","classify"=>'低压力感知体验'],
            ["category"=>"study","code"=>"s10","type"=>"input","title"=>"其它你感知到的学业压力有哪些？","classify"=>'扩大数据类型'],
            ["category"=>"study","code"=>"s11","type"=>"input","title"=>"你可以在这里更详细的用文字进行人际关系问题的描述。","classify"=>'扩大数据类型'],
        ];  
        ConsultationOption::insert($study);

        $interpersonal=[
            ["category"=>"interpersonal","code"=>"i1","type"=>"options","title"=>"与同学、室友的关系出了问题","classify"=>'同伴关系'],
            ["category"=>"interpersonal","code"=>"i2","type"=>"options","title"=>"与导师或任课老师的关系出了问题","classify"=>'师生关系'],
            ["category"=>"interpersonal","code"=>"i3","type"=>"options","title"=>"恋爱关系带来的困扰","classify"=>'亲密关系'],
            ["category"=>"interpersonal","code"=>"i4","type"=>"options","title"=>"家庭成员时间的问题或得不到家庭不支持","classify"=>'家庭关系'],
            ["category"=>"interpersonal","code"=>"i5","type"=>"options","title"=>"与社团、实习单位的同事或朋友的关系出了问题","classify"=>'社会关系'],
            ["category"=>"interpersonal","code"=>"i6","type"=>"input","title"=>"其它你感知到的人际关系问题有哪些？","classify"=>'扩大数据类型'],
            ["category"=>"interpersonal","code"=>"i7","type"=>"input","title"=>"你可以在这里更详细的用文字进行人际关系问题的描述。","classify"=>'扩大数据类型'],
        ];  
        ConsultationOption::insert($interpersonal);

        $sleep=[
            ["category"=>"sleep","code"=>"s1","type"=>"options","title"=>"最近注意力、记忆力和决策能力下降","classify"=>'睡眠不足'],
            ["category"=>"sleep","code"=>"s2","type"=>"options","title"=>"由于学业繁重","classify"=>'睡眠不足'],
            ["category"=>"sleep","code"=>"s3","type"=>"options","title"=>"由于社交时间太长","classify"=>'睡眠不足'],
            ["category"=>"sleep","code"=>"s4","type"=>"options","title"=>"由于娱乐：长时间使用电子设备","classify"=>'睡眠不足'],
            ["category"=>"sleep","code"=>"s5","type"=>"options","title"=>"焦虑或过度思考，使学生在入睡时难以平静下来：难以入睡","classify"=>'睡眠质量查'],
            ["category"=>"sleep","code"=>"s6","type"=>"options","title"=>"夜间频繁醒来或做噩梦，睡眠的连贯性低，睡眠中断后恢复效果差","classify"=>'睡眠质量查'],
            ["category"=>"sleep","code"=>"s7","type"=>"options","title"=>"早醒后，白天感到疲劳","classify"=>'睡眠质量查'],
            ["category"=>"sleep","code"=>"s8","type"=>"options","title"=>"熬夜","classify"=>'睡眠节律混乱'],
            ["category"=>"sleep","code"=>"s9","type"=>"options","title"=>"失眠","classify"=>'睡眠节律混乱'],
            ["category"=>"sleep","code"=>"s10","type"=>"options","title"=>"过度嗜睡或补觉","classify"=>'睡眠节律混乱'],
         ];  
        ConsultationOption::insert($sleep);
        


    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediateOption;

class MediateOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $selection=[
            ["category"=>"selection","code"=>"s1","type"=>"options","title"=>"情感上更有意义的互动的社会伙伴","classify"=>null],
            ["category"=>"selection","code"=>"s2","type"=>"options","title"=>"改变生活","classify"=>null],
            ["category"=>"selection","code"=>"s3","type"=>"options","title"=>"朋友互动或其它可以增强积极状态的愉快活动","classify"=>null],
            ["category"=>"selection","code"=>"s4","type"=>"options","title"=>"减少有害环境的机会，例如：吸毒等","classify"=>null],
        ];
        MediateOption::insert($selection);

        $attention=[
            ["category"=>"attention","code"=>"a1","type"=>"options","title"=>"集中注意力：主动将注意力集中在当前任务或活动上，以减少情绪波动对效率的影响。示例：在感到焦虑时，通过专注完成手头的工作或学习任务来屏蔽消极情绪。","classify"=>"注意集中"],
            ["category"=>"attention","code"=>"a2","type"=>"options","title"=>"将注意力从情绪诱发事件上转移到其他无关的刺激或活动上。示例：在感到愤怒时，把注意力集中在观看喜欢的电影或阅读小说上。或在等待重要考试结果时，通过听音乐或锻炼来分散注意力。","classify"=>"注意分散"],
            ["category"=>"attention","code"=>"a3","type"=>"options","title"=>"冥想和正念练习：通过正念练习将注意力专注于当下的感受和环境，而不对情绪进行判断或反应。示例：使用深呼吸技术专注于自己的呼吸节奏，从而减少对负面情绪的关注。或通过身体扫描练习，逐一关注身体部位的感觉，避免情绪泛化。","classify"=>"冥想"],
            ["category"=>"attention","code"=>"a4","type"=>"options","title"=>"重新聚焦积极因素：将注意力从负面情绪转移到当前情境中的积极方面或令人愉快的事物上。示例：在压力大的工作日，关注团队合作中展现的友好和支持，而不是任务的艰巨。或在一场不愉快的对话后，回忆对方曾表现出的关心或善意。","classify"=>"重新聚焦积极因素"],
            ["category"=>"attention","code"=>"a5","type"=>"options","title"=>"预测性注意管理：在进入可能引发情绪的情境之前，有意识地调整注意力的焦点，避免对情绪触发点的过度关注。示例：在即将参加可能引发焦虑的公众演讲时，将注意力集中于讲稿内容，而非观众的表情反应。","classify"=>"预测性注意管理"],
            ["category"=>"attention","code"=>"a6","type"=>"options","title"=>"忽略与屏蔽：有意忽视情境中可能引发负面情绪的刺激，避免情绪升级。示例：在网上看到挑衅性评论时选择不去回应，而是直接忽略。或面对批评时，只关注建设性的部分，忽略攻击性的语言。","classify"=>"忽略与屏蔽"],
            ["category"=>"attention","code"=>"a7","type"=>"options","title"=>"自我暗示与肯定：通过关注自身的优点或过去的成功经验，转移对当前负面情绪的关注。示例：在面临失败时，提醒自己“我之前也克服过类似的挑战，我能行”。","classify"=>"自我暗示"],
        ];
        MediateOption::insert($attention);

        $cognition=[
            ["category"=>"cognition","code"=>"c1","type"=>"options","title"=>"重新解读情境：赋予情境不同的意义或视角来看待事情，从而改变情绪反应。例如：将考试失败解读为学习的机会，而不是能力的不足","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c2","type"=>"options","title"=>"改变归因方式：改变对事件原因的解释，避免过于消极的归因方式。示例：当他人对你态度冷淡时，不将其归因于对你的反感，而是考虑他们可能正在经历个人问题。","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c3","type"=>"options","title"=>"假设更大的图景：从宏观或长期的视角来看待当前问题，减轻情绪的即时冲击。示例：在交通堵塞时，告诉自己这只是日常生活中的一个小插曲，对整体生活并无重大影响。","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c4","type"=>"options","title"=>"假设更大的图景：从宏观或长期的视角来看待当前问题，减轻情绪的即时冲击。示例：在交通堵塞时，告诉自己这只是日常生活中的一个小插曲，对整体生活并无重大影响。","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c5","type"=>"options","title"=>"积极预期：关注事件中可能出现的积极结果，而不是沉溺于消极后果的想象。示例：面对一场重要的面试，期待学到新经验，而不是过度担忧失败。","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c6","type"=>"options","title"=>"情境对比：与更糟糕的可能情境相比，从而减轻负面情绪。示例：在一次摔倒后想到“至少我没有受重伤”。","classify"=>"认知重评/改变"],
        ];
        MediateOption::insert($cognition);

        $cognition=[
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"表达抑制：持续努力抑制一个人的情绪表达行为，比如控制面部表情或身体动作，以隐藏真实的情绪状态。示例：在听到不愉快的话时强忍愤怒，不表现出任何情绪。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"情绪释放：在适当的场合哭泣以释放悲伤或与可信赖的朋友倾诉来排解不安或压力。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"正面情绪强化：在负面情绪占主导时，有意识地诱发积极情绪来平衡情绪状态。方式：观看搞笑视频或听轻松的音乐以缓解压力或回忆过去的美好经历来中和当前的悲伤情绪。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"冷静反思：在强烈情绪反应后，通过理性分析和反思来消解情绪。示例：在与人发生冲突后，冷静下来回想事件经过，寻找误解或误会的可能性或写下一封表达情绪的信，但不寄出去，仅作为释放情绪的方式。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"社会适应性行为调整：调整自己的情绪表现以适应社会环境的需求。示例：在面对批评时，表现出接受与冷静的态度，即使内心可能感到不满或委屈或在其它人面前隐藏悲伤情绪，以保持所处环境的积极氛围。","classify"=>"社会适应性行为"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"香薰","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"体育运动","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"深呼吸","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"冷水刺激","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"肌肉放松","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"食物","classify"=>"物理方式"],  
        ];
        MediateOption::insert($cognition);


    }
}


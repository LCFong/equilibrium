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
            ["category"=>"selection","code"=>"s1","type"=>"options","title"=>"主动避免负面情境：通过避开那些你预期会引发负面情绪的场所、活动或与某些人接触，来减少情绪困扰。示例：如果你对某些社交场合感到焦虑，可以选择不参加这些活动。如果你知道某些新闻报道或社交媒体内容会让你感到沮丧，可以避免观看或阅读这些内容。","classify"=>null],
            ["category"=>"selection","code"=>"s2","type"=>"options","title"=>"选择积极的情境：寻找并主动参与那些能带来快乐、放松、满足或愉悦的活动或环境。示例：如果你喜欢运动，可以选择去健身房或参加跑步活动来提升自己的情绪。如果你感到压力大，可以选择和朋友一起去看电影、吃饭或进行户外活动来放松自己。","classify"=>null],
            ["category"=>"selection","code"=>"s3","type"=>"options","title"=>"避开有害或引发压力的情境：避免与某些总是带来负能量的人接触，或避免那些你知道会引起冲突的场合。示例：如果你知道某个社交聚会会引发过多的冲突或不愉快的讨论，你可以选择不参加。如果你与某个同事的工作关系总是导致你焦虑，可以选择避免与这个同事独自共事。","classify"=>null],
            ["category"=>"selection","code"=>"s4","type"=>"options","title"=>"选择支持性情境：主动寻找那些能够给你带来情感支持、正面反馈或安慰的情境或人群。示例：如果你感到孤独或压力大，可以选择与家人、朋友或信任的人共度时光，他们能给你带来情感上的支持和慰藉。如果你在工作上感到迷茫或无助，主动找一个能提供建议和帮助的导师或同事谈一谈。","classify"=>null],
            ["category"=>"selection","code"=>"s5","type"=>"options","title"=>"选择能提升自信的情境：选择那些能展现你技能、能力或获得正向反馈的情境。示例：如果你在某项活动（如演讲、比赛或工作项目）中有信心，你可以主动选择参与这些活动，以增强自信心。 如果你正在学习一项新技能，选择进入一个可以展示这项技能并获得他人认可的情境。","classify"=>null],
            ["category"=>"selection","code"=>"s6","type"=>"options","title"=>"避免不健康的情境：主动避免可能引发不健康行为的情境（例如，过度饮酒、暴饮暴食、冲动消费等）。示例：如果你发现自己在压力大的时候容易冲动购物，可以选择避免浏览网上购物平台，或将购物应用程序从手机上卸载。如果你有过度饮酒的倾向，避免参加聚会中有酒精饮品的场合，或者在聚会时提前设定好饮酒的限制。","classify"=>null],
            ["category"=>"selection","code"=>"s7","type"=>"options","title"=>"7.选择正面挑战的情境：选择那些适度的挑战情境，这些情境能够激发你的兴趣和解决问题的动力，最终带来满足感和成就感。示例：如果你对某个工作项目或任务感到挑战性强，但又充满信心和动力，你可以主动承担这个任务，享受克服挑战的过程。如果你在运动上设定了一个新的目标（如跑步10公里），你可以选择参加相关的赛事或训练，以挑战自己并获得成就感。","classify"=>null],
        ];
        MediateOption::insert($selection);

        $revision=[
            ["category"=>"revision","code"=>"rev1","type"=>"options","title"=>"改变话题或沟通方式：可以主动引导话题转向一个更加轻松或中立的主题，通过改变交流的内容或语气，避免不必要的情绪冲突或压力。示例：在一场家庭聚会中，如果讨论逐渐变得过于激烈，可以提出一个新的、更愉快的话题（例如，共同回忆的美好时光），以缓解紧张气氛。","classify"=>null],
            ["category"=>"revision","code"=>"rev2","type"=>"options","title"=>"物理环境改变：在噪声过大、温度不适或环境本身让人感到不适时，情境修正可以通过改善物理环境来调节情绪。示例：若你处在一个过于嘈杂的地方，可以选择关闭噪音源、搬到更安静的区域，或通过使用耳机减少噪音干扰。若环境温度过高或过低，可以调节温控设备，使环境更舒适。","classify"=>null],
            ["category"=>"revision","code"=>"rev3","type"=>"options","title"=>"调整身体或情绪表达：适用情境：当情绪非常强烈时，情境修正也可以通过身体或非语言表达的改变来调整情绪体验。示例：通过深呼吸、冥想、伸展运动等方式来调整身体状态，或者通过改变自己的姿势、面部表情来传递更积极的情绪信号，或者当你在面对压力大的会议时，可以通过深呼吸和冥想来调整情绪，避免情绪失控或焦虑加剧。","classify"=>null],
            ["category"=>"revision","code"=>"rev4","type"=>"options","title"=>"寻求社交支持：与朋友、家人或同事交流，寻求理解和支持，可以有效减轻负面情绪。示例：当你在一个社交场合感到尴尬时，找到一个熟悉的人交谈，可以让你感到更加舒适，从而减轻焦虑。","classify"=>null],
            ["category"=>"revision","code"=>"rev5","type"=>"options","title"=>"改变时间安排：如果你知道自己在某个时间段情绪容易波动，可以选择推迟或提前某些活动，避免在情绪低落时面对高压的任务。也可以通过重新安排会议或休息时间来减轻压力。示例：如果你发现自己在早晨容易焦虑，可以选择将重要的会议或任务安排在下午，等你状态更好时再处理。","classify"=>null],
            ["category"=>"revision","code"=>"rev6","type"=>"options","title"=>"设置明确的边界：明确表示自己不希望涉及某些话题或不愿意参与某些活动。如果他人过于侵犯你的个人空间或提出过高的要求，及时设立界限，保护自己的情绪。示例：如果同学、同事或朋友在没有征求你意见的情况下要求你参加额外的任务，而你感到压力山大，可以礼貌地拒绝并说明自己的理由。","classify"=>null],
            ["category"=>"revision","code"=>"rev7","type"=>"options","title"=>"重新构建情境的意义：通过改变情境的某些因素，使其看起来更加符合自己的需求或价值观。通过改变任务的分配方式或讨论的焦点，减少不必要的压力。示例：在工作中，如果你觉得某个任务太过繁重，调整任务的优先级，或者把某些小任务分配给同学或同事，从而让自己感到更有掌控感和信心。","classify"=>null],
        ];
        MediateOption::insert($revision);
        
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
            ["category"=>"cognition","code"=>"c5","type"=>"options","title"=>"积极预期：关注事件中可能出现的积极结果，而不是沉溺于消极后果的想象。示例：面对一场重要的面试，期待学到新经验，而不是过度担忧失败。","classify"=>"认知重评/改变"],
            ["category"=>"cognition","code"=>"c6","type"=>"options","title"=>"情境对比：与更糟糕的可能情境相比，从而减轻负面情绪。示例：在一次摔倒后想到“至少我没有受重伤”。","classify"=>"认知重评/改变"],
        ];
        MediateOption::insert($cognition);

        $reaction=[
            ["category"=>"reaction","code"=>"r1","type"=>"options","title"=>"表达抑制：持续努力抑制一个人的情绪表达行为，比如控制面部表情或身体动作，以隐藏真实的情绪状态。示例：在听到不愉快的话时强忍愤怒，不表现出任何情绪。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r2","type"=>"options","title"=>"情绪释放：在适当的场合哭泣以释放悲伤或与可信赖的朋友倾诉来排解不安或压力。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r3","type"=>"options","title"=>"正面情绪强化：在负面情绪占主导时，有意识地诱发积极情绪来平衡情绪状态。方式：观看搞笑视频或听轻松的音乐以缓解压力或回忆过去的美好经历来中和当前的悲伤情绪。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r4","type"=>"options","title"=>"冷静反思：在强烈情绪反应后，通过理性分析和反思来消解情绪。示例：在与人发生冲突后，冷静下来回想事件经过，寻找误解或误会的可能性或写下一封表达情绪的信，但不寄出去，仅作为释放情绪的方式。","classify"=>"情绪方式"],
            ["category"=>"reaction","code"=>"r5","type"=>"options","title"=>"社会适应性行为调整：调整自己的情绪表现以适应社会环境的需求。示例：在面对批评时，表现出接受与冷静的态度，即使内心可能感到不满或委屈或在其它人面前隐藏悲伤情绪，以保持所处环境的积极氛围。","classify"=>"社会适应性行为"],
            ["category"=>"reaction","code"=>"r6","type"=>"options","title"=>"香薰","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r7","type"=>"options","title"=>"体育运动","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r8","type"=>"options","title"=>"深呼吸","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r9","type"=>"options","title"=>"冷水刺激","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r10","type"=>"options","title"=>"肌肉放松","classify"=>"物理方式"],
            ["category"=>"reaction","code"=>"r11","type"=>"options","title"=>"食物","classify"=>"物理方式"],  
        ];
        MediateOption::insert($reaction);


    }
}


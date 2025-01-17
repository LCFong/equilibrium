<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediateOption;

class MediateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["category" => "selection", "code" => "s1", "type" => "options", "title" => "在选择场景时，我通常会考虑工作会议的安排。"],
            ["category" => "selection", "code" => "s2", "type" => "options", "title" => "家庭聚会让我感到温暖和归属。"],
            ["category" => "selection", "code" => "s3", "type" => "options", "title" => "社交活动为我提供了交朋友的机会。"],
            ["category" => "selection", "code" => "s4", "type" => "options", "title" => "观看运动比赛让人兴奋，增强了团队精神。"],
            ["category" => "selection", "code" => "s5", "type" => "options", "title" => "参加学术讨论让我能够接触到新的知识。"],

            ["category" => "modification", "code" => "m1", "type" => "options", "title" => "我会改变沟通方式，以便更好地传达我的想法。"],
            ["category" => "modification", "code" => "m2", "type" => "options", "title" => "调整会议时间可以确保更多人能够参与。"],
            ["category" => "modification", "code" => "m3", "type" => "options", "title" => "选择不同的场地可以创造更轻松的氛围。"],
            ["category" => "modification", "code" => "m4", "type" => "options", "title" => "变更参与者有时可以带来新的视角。"],
            ["category" => "modification", "code" => "m5", "type" => "options", "title" => "修改议题可以使讨论更具吸引力。"],

            ["category" => "attention", "code" => "a1", "type" => "options", "title" => "我会专注于关键发言者，以便更好地理解他们的观点。"],
            ["category" => "attention", "code" => "a2", "type" => "options", "title" => "记录重要信息可以帮助我后续回顾。"],
            ["category" => "attention", "code" => "a3", "type" => "options", "title" => "使用视觉辅助工具可以增强信息的传达效果。"],
            ["category" => "attention", "code" => "a4", "type" => "options", "title" => "定时休息有助于保持注意力。"],
            ["category" => "attention", "code" => "a5", "type" => "options", "title" => "参与互动环节可以提高我的参与感。"],

            ["category" => "cognition", "code" => "c1", "type" => "options", "title" => "我会反思个人偏见，以更开放的心态看待他人。"],
            ["category" => "cognition", "code" => "c2", "type" => "options", "title" => "积极思维能让我更好地应对挑战。"],
            ["category" => "cognition", "code" => "c3", "type" => "options", "title" => "角色扮演有助于我理解他人的感受。"],
            ["category" => "cognition", "code" => "c4", "type" => "options", "title" => "学习新技能让我在工作中更具竞争力。"],
            ["category" => "cognition", "code" => "c5", "type" => "options", "title" => "寻求反馈能帮助我调整自己的观点。"],

            ["category" => "reaction", "code" => "r1", "type" => "options", "title" => "在紧张时，我会深呼吸来放松自己。"],
            ["category" => "reaction", "code" => "r2", "type" => "options", "title" => "短暂的身体活动有助于我保持精力充沛。"],
            ["category" => "reaction", "code" => "r3", "type" => "options", "title" => "积极自我对话能增强我的自信心。"],
            ["category" => "reaction", "code" => "r4", "type" => "options", "title" => "提前制定应对计划能让我更从容应对挑战。"],
            ["category" => "reaction", "code" => "r5", "type" => "options", "title" => "向他人寻求支持让我感到不再孤单。"]
        ];
        MediateOption::insert($data);
    }
}

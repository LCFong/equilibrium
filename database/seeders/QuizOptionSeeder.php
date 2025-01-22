<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuizOption;

class QuizOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ["property"=>"sleep", "code"=>"p1", "type"=>"options", "title"=>"1、身体是否感觉疲劳？选择是或否。"],
            ["property"=>"sleep", "code"=>"p2", "type"=>"options", "title"=>"2、睡眠是否出现入睡困难和早醒等问题？选择是或否。"],
            ["property"=>"sleep", "code"=>"p3", "type"=>"options", "title"=>"3、身体是否有局部疼痛？选择是或否。"],
            ["property"=>"sleep", "code"=>"p4", "type"=>"options", "title"=>"4、心跳是否有加速？选择是或否。"],
            ["property"=>"sleep", "code"=>"p5", "type"=>"options", "title"=>"5、呼吸是否出现急促短暂的呼吸困难？选择是或否。"],
            ["property"=>"sleep", "code"=>"p6", "type"=>"options", "title"=>"6、食欲是否出现改变？选择是或否。"],
            ["property"=>"sleep", "code"=>"p7", "type"=>"options", "title"=>"7、情绪是否低落？选择是或否。"],
            ["property"=>"sleep", "code"=>"p8", "type"=>"options", "title"=>"8、消化是否出现问题？选择是或否。"],
            ["property"=>"sleep", "code"=>"p9", "type"=>"options", "title"=>"9、是否感觉到肌肉紧绷？选择是或否。"],
            ["property"=>"sleep", "code"=>"p10", "type"=>"options", "title"=>"10、是否感觉恶心或头晕？选择是或否。"],
            ["property"=>"sleep", "code"=>"p11", "type"=>"options", "title"=>"11、皮肤是否出现过敏或痤疮等问题？选择是或否。"],
            ["property"=>"sleep", "code"=>"p12", "type"=>"options", "title"=>"12、是否回避正常的社交互动？选择是或否。"],
            ["property"=>"sleep", "code"=>"p13", "type"=>"options", "title"=>"13、注意力是否出现问题？选择是或否。"],
            ["property"=>"sleep", "code"=>"p14", "type"=>"options", "title"=>"14、记忆力是否出现问题？选择是或否。"],
            ["property"=>"sleep", "code"=>"p15", "type"=>"options", "title"=>"15、是否易怒？选择是或否。"],
            ["property"=>"sleep", "code"=>"p16", "type"=>"options", "title"=>"16、是否反复回忆过去发生的事情？选择是或否。"],
            ["property"=>"sleep", "code"=>"p17", "type"=>"options", "title"=>"17、是否感到孤独？选择是或否。"],
        ];  
        QuizOption::insert($data);
        
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meditation;

class MeditationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities=[
            ["sequence"=>1,"category"=>"study","title"=>"當你面對學業壓力時，你通常會怎麼做？","options"=>["放鬆自己","努力學習","尋求幫助","尋求幫助"]],
            ["sequence"=>2,"category"=>"study","title"=>"當學校的考試臨近時，你的感受是？","options"=>["非常焦慮","有些緊張","平靜自信","平靜自信"]],
            ["sequence"=>3,"category"=>"study","title"=>"你如何處理學習中的挫折？","options"=>["重新檢視問題","逃避","向同學請教","向同學請教"]],
            ["sequence"=>4,"category"=>"study","title"=>"你喜歡在學習時使用哪些方法？","options"=>["獨立學習","小組討論","在線課程","在線課程"]],
            ["sequence"=>5,"category"=>"interpersonal","title"=>"當朋友對你不友好時，你的反應是？","options"=>["直接對質","認真思考原因","轉移注意力","轉移注意力"]],
            ["sequence"=>6,"category"=>"interpersonal","title"=>"你如何維護和朋友之間的關係？","options"=>["經常聯繫","互相幫助","參加聚會","參加聚會"]],
            ["sequence"=>7,"category"=>"interpersonal","title"=>"當朋友需要幫助時，你會？","options"=>["馬上幫忙","提供建議","先詢問情況","先詢問情況"]],
            ["sequence"=>8,"category"=>"interpersonal","title"=>"當與他人發生衝突時，你通常會怎麼處理？","options"=>["冷靜對話","避免衝突","直接對抗","直接對抗"]],
            ["sequence"=>9,"category"=>"peers","title"=>"在同伴聚會中，你感到焦慮時，你會？","options"=>["參加互動","找個地方冷靜","主動聊天","主動聊天"]],
            ["sequence"=>10,"category"=>"peers","title"=>"當你在團隊中意見不合時，你的反應是？","options"=>["提出自己的觀點","聆聽他人意見","隨大流","隨大流"]],
            ["sequence"=>11,"category"=>"peers","title"=>"你如何看待與同伴的競爭？","options"=>["激勵自己","感到壓力","無所謂","無所謂"]],
            ["sequence"=>12,"category"=>"peers","title"=>"你更喜歡怎樣的社交活動？","options"=>["大型派對","小型聚會","一對一交流","一對一交流"]],
            ["sequence"=>13,"category"=>"sleep","title"=>"如果你晚上睡不著，你會如何應對？","options"=>["嘗試冥想","看書","聽音樂","聽音樂"]],
            ["sequence"=>14,"category"=>"sleep","title"=>"你認為良好的睡眠習慣是什麼？","options"=>["固定作息","適量運動","遠離電子產品","遠離電子產品"]],
            ["sequence"=>15,"category"=>"sleep","title"=>"當你感到疲倦時，你通常會？","options"=>["休息","繼續工作","喝咖啡","喝咖啡"]],
            ["sequence"=>16,"category"=>"sleep","title"=>"你認為睡眠對情緒的影響是？","options"=>["很大","有些影響","無影響","無影響"]],
           
        ];
        $meditation=Meditation::create([
            "title"=>"Meditation 1",
            "category_groups"=>["study","interpersonal","peers","sleep"],
            "is_valid"=>true
        ]);
        foreach($activities as $activity){
            $meditation->activities()->create($activity);
        }
    }
}

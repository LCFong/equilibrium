<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function index(){
        $treatment=Treatment::find(1);
        $treatment->consultations;
        echo '<hr>';
        echo $treatment->fullname.' @ '.$treatment->date_start.'<br>';
        echo '<ol>';
        foreach($treatment->consultations as $consultation){
            $consultation->peers;
            $consultation->studies;
            echo '<li>';
            echo $consultation->date_start;
            echo '<h3>Peer</h3>';
            echo '<ul>';
            foreach($consultation->peers as $item){
                // echo '<li>'.json_encode($item).'</li>';
                echo '<li>'.$item->option_code.'::'.json_encode($item->selection).'::'.$item->content.'<br>'.json_encode($item->option).'</li>';
            };
            echo '</ul>';

            echo '<h3>Study</h3>';
            echo '<ul>';
            foreach($consultation->studies as $item){
                echo '<li>'.$item->option_code.'::'.$item->content.'::'.$item->option->title.'</li>';
            };

            // echo '</ul>';
            echo '</li>';
        };
        dd($treatment);
    }
}

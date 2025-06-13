<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\User;
use App\Models\Consultation;

class DashboardController extends Controller
{
    public function index(){
        
        if(Auth()->user()->hasRole('admin')){
            // Admin
            return redirect()->route('admin.consultations.index');
        }else{
            if( Auth()->user()->gender == null || Auth()->user()->education == null ){
                return redirect()->route('member.users.edit');
            }
            // Member
            // 就一次login就先做問卷
            if ( !Auth()->user()->do_evaluation_first ) {
                return redirect()->route('member.evaluations.answer');
            }
            
            // 一共做了33天的consultations
            $consultations = Consultation::where('user_id', Auth()->user()->id)
                    ->selectRaw('*, DATE_FORMAT(created_at, "%Y-%m-%d") as created_date')
                    ->pluck('created_date')
                    ->toArray();

            if( Auth()->user()->do_evaluation_again === "1" ){ 
                return redirect()->route('member.evaluations.answer' , ['do_evaluation_again' => 1] );
            }
            if ($consultations && Auth()->user()->do_evaluation_again !== "0" ) {
                // 使用33天後再做一次問卷, do_evaluation_again是0的話即已經再做了一次
                
                if (count( array_unique($consultations) ) >= 7) {
                    User::where('id', Auth()->user()->id)->update(['do_evaluation_again' => 1]);
                
                    return redirect()->route('member.evaluations.answer' , ['do_evaluation_again' => 1] );
                } 
                
            }


            return redirect()->route('member.quizs.answer');
            // 跳壓力感知
            // return redirect()->route('member.consultations.index');
        }
    }
}

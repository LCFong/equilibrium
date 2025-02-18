<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;

class DashboardController extends Controller
{
    public function index(){
        
        if(Auth()->user()->hasRole('admin')){
            // Admin
            return redirect()->route('admin.consultations.index');
        }else{
            // Member
            // 就一次login就先做問卷
            if ( !Auth()->user()->do_evaluation_first ) {
                return redirect()->route('member.evaluations.answer');
            }else{
                return redirect()->route('member.quizs.answer');
            }

            // 跳壓力感知
            return redirect()->route('member.consultations.index');
        }
    }
}

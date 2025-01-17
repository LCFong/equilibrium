<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Evaluation;
use App\Models\EvaluationQuestion;

class EvaluationController extends Controller
{


    public function answer(Request $request){
        // Evaluation 作答頁
        if($request->exists('test')){
            $questions = EvaluationQuestion::get();
            return Inertia::render('Member/Evaluation/Answer',[
                'questions' => $questions,
            ]);
        }else{
            return redirect()->route('member.consultations.index');

        }
    }

}

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


    public function answer($do_evaluation_again = null){
        
        // Evaluation 作答頁
        $questions = EvaluationQuestion::get();
        return Inertia::render('Member/Evaluation/Answer',[
            'questions' => $questions,
            'do_evaluation_again' => $do_evaluation_again,
        ]);
    }

}

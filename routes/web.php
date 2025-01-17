<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('test',[App\Http\Controllers\TestController::class,'index']); 

// Route::resource('blogs',App\Http\Controllers\BlogController::class)->names('blogs'); 
// Route::get('blogs/getBlog/{stage_id}',[App\Http\Controllers\BlogController::class,'getBlog'])->name('blogs.getBlog'); 

Route::get('/language/{language}', function ($language) {
    Session::put('applocale', $language);
    return Redirect::back();
})->name('language');


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');

    Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
    
    // Route::resource('missions',App\Http\Controllers\MissionController::class)->names('missions');
    
    // Route::post('mission/stage/{stage}/upload',[App\Http\Controllers\StageController::class,'upload'])->name('mission.stage.upload'); 
    // Route::get('mission/stage/{stage}/{media_id}/{mediaType}/delete',[App\Http\Controllers\StageController::class,'deleteUpload'])->name('mission.stage.deleteUpload'); 

    // Route::resource('meditation',App\Http\Controllers\MeditationController::class)->names('meditation');
 
});


Route::get('/session', function () {
    //檢查是否第一login, 跳 quiz
    $logged = session('logged'); 
    session()->forget('logged');
    return $logged && Auth()->user()->quizToday()->count() <= 0;
});

Route::group([
    'prefix' => '/member',
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ]
], function () {
    Route::get('/', function () {
        return redirect()->route('member.consultations.index');
    });

    Route::get('quizs/get_option', [App\Http\Controllers\Member\QuizController::class,'getOption'])->name('member.quizs.get_option');
    Route::get('quizs/answer', [App\Http\Controllers\Member\QuizController::class,'answer'])->name('member.quizs.answer');
    Route::resource('member/quiz_items', App\Http\Controllers\Member\QuizItemController::class)->names('member.quiz_items');

    Route::resource('evaluations', App\Http\Controllers\Member\EvaluationController::class)->names('member.evaluations');

    Route::get('evaluation/answer', [App\Http\Controllers\Member\EvaluationController::class,'answer'])->name('member.evaluations.answer');
    Route::resource('evaluation_items', App\Http\Controllers\Member\EvaluationItemController::class)->names('member.evaluation_items');

    Route::resource('consultations', App\Http\Controllers\Member\ConsultationController::class)->names('member.consultations');
    Route::get('consultation/answer/{category}', [App\Http\Controllers\Member\ConsultationController::class,'answer'])->name('member.consultations.answer');

    Route::get('mediates/answer/{category}', [App\Http\Controllers\Member\MediateController::class,'answer'])->name('member.mediates.answer');
    Route::resource('mediates', App\Http\Controllers\Member\MediateController::class)->names('member.mediates');

});

Route::group([
    'prefix' => '/admin',
    'middleware' => [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'role:admin'
    ]
], function () {

    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('breath', [App\Http\Controllers\Admin\BreathController::class,'index'])->name('admin.breath.index');

    Route::get('problem/view/{module}', [App\Http\Controllers\Admin\ProblemController::class,'view'])->name('admin.problems.view');
    Route::resource('problem', App\Http\Controllers\Admin\ProblemController::class)->names('admin.problems');
    Route::resource('answer', App\Http\Controllers\Admin\AnswerController::class)->names('admin.answers');
    
    Route::get('consultation/view_answer/{user_id?}', [App\Http\Controllers\Admin\ConsultationController::class,'viewAnswer'])->name('admin.consultations.view_answer');
    Route::get('consultation/answer/{category}', [App\Http\Controllers\Admin\ConsultationController::class,'answer'])->name('admin.consultations.answer');
    
    Route::get('evaluation/view_answer/{user_id?}', [App\Http\Controllers\Admin\EvaluationController::class,'viewAnswer'])->name('admin.evaluations.view_answer');
    Route::get('evaluation/answer/{category}', [App\Http\Controllers\Admin\EvaluationController::class,'answer'])->name('admin.evaluations.answer');
    
    Route::get('mediate/view_answer/{user_id?}', [App\Http\Controllers\Admin\MediateController::class,'viewAnswer'])->name('admin.mediates.view_answer');
    Route::get('mediates/answer/{category}', [App\Http\Controllers\Admin\MediateController::class,'answer'])->name('admin.mediates.answer');
    
    
    Route::resource('consultations', App\Http\Controllers\Admin\ConsultationController::class)->names('admin.consultations');
    Route::resource('evaluations', App\Http\Controllers\Admin\EvaluationController::class)->names('admin.evaluations');
    Route::post('evaluation/update_question', [App\Http\Controllers\Admin\EvaluationController::class,'updateQuestion'])->name('admin.evaluations.update_question');
    Route::resource('mediates', App\Http\Controllers\Admin\MediateController::class)->names('admin.mediates');
    Route::resource('consultation_items', App\Http\Controllers\Admin\ConsultationItemController::class)->names('admin.consultation_items');
    Route::resource('evaluation_items', App\Http\Controllers\Admin\EvaluationItemController::class)->names('admin.evaluation_items');

    // Quiz
    Route::get('quizs/get_option', [App\Http\Controllers\Admin\QuizController::class,'getOption'])->name('admin.quizs.get_option');
    Route::get('quizs/view_answer/{user_id?}', [App\Http\Controllers\Admin\QuizController::class,'viewAnswer'])->name('admin.quizs.view_answer');
    Route::get('quizs/answer', [App\Http\Controllers\Admin\QuizController::class,'answer'])->name('admin.quizs.answer');
    Route::resource('quizs', App\Http\Controllers\Admin\QuizController::class)->names('admin.quizs');
    Route::resource('quiz_items', App\Http\Controllers\Admin\QuizItemController::class)->names('admin.quiz_items');

    Route::get('/session', function () {
        
        //login 後跳 quiz
        $logged = session('logged'); 
        session()->forget('logged'); 
        return $logged;
    });

    Route::resource('configs',App\Http\Controllers\Admin\ConfigController::class)->names('admin.configs');
    Route::resource('files',App\Http\Controllers\Admin\FileController::class)->names('admin.files');
});


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizItem;
use App\Models\QuizOption;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return Inertia::render('Quiz/Index',[

        ]);
    }

    public function answer(){
        // Consultation 作答頁
        $options = QuizOption::get();
        return Inertia::render('Quiz/Answer',[
            'options' => $options,
        ]);
    }
    public function viewAnswer($userId = null){
        // Consultation 查看 result 頁
        $quizs = Quiz::where('user_id', $userId)->with(['items.option','user'])->orderBy('id','desc')->get();
        return Inertia::render('Quiz/ViewAnswer',[
            'quizs' => $quizs,
            'users' => User::all(),
            'user_id' => $userId,
        ]);
    }

    public function getOption(){
        
        return response()->json( QuizOption::get() );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Quiz/CreateOption',[
            'options' => QuizOption::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);
        QuizOption::insert($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Config $config)
    {
        $data = $request->all();
        ConsultationOption::where('id', $data['id'])->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

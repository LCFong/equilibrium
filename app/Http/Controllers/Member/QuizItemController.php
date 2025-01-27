<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Quiz;
use App\Models\QuizItem;
use App\Models\QuizOption;

class QuizItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=auth()->user();
        // $quiz=$user->quizzes()->create();
        // $datas=[
        //     ['code'=>'p1','value'=>'2'],
        //     ['code'=>'p2','value'=>'3'],
        // ];
        // $quiz->items()->createMany($datas);
        
        dd($user, $user->quizzes);

    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = Auth()->user()->id;
        
        $quiz = Quiz::create(['user_id' => $user_id]);
        foreach($data as $k => $v){
            $quiz->items()->create([
                'code' =>  $k,
                'value' => $v
            ]);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

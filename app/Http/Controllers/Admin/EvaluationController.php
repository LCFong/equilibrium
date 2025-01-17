<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\User;
use App\Models\Evaluation;
use App\Models\EvaluationQuestion;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Evaluation',[

        ]);
    }

    public function answer($category = null ){
        // Evaluation 作答頁
        $questions = EvaluationQuestion::where('category' , $category)->get();
        return Inertia::render('Evaluation/Answer',[
            'questions' => $questions,
            'seven_options' => config('evaluation.seven_options')
        ]);
    }
    public function viewAnswer($userId = null){
        $evaluations = Evaluation::where('user_id', $userId)->with(['items.question','user'])->get();
        return Inertia::render('Evaluation/ViewAnswer',[
            'evaluations' => $evaluations,
            'users' => User::all(),
            'user_id' => $userId,
            'seven_options' => config('evaluation.seven_options')
        ]);
    }

    public function create()
    {
        //
        return Inertia::render('Evaluation/CreateQuestion',[
            'options' => EvaluationQuestion::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        
        $question = EvaluationQuestion::create($data);

        if($request->file('thumbnails') ){

            foreach($request->file('thumbnails') as $file){
                $thumbnail = $question->addMedia($file['originFileObj'])->toMediaCollection('thumbnail');    
                $thumbnail->update(['model_type' => 'App\Models\Media' , 'model_id' => $question->id]);
            }
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
    
    public function updateQuestion(Request $request){
        $data = $request->all();
        unset($data['created_at']);
        unset($data['updated_at']);
        EvaluationQuestion::where('id', $data['id'])->update($data);
        return redirect()->back();
    }
     
    public function update(Request $request, Evaluation $evaluation)
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

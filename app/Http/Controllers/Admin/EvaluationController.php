<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
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
        $options = EvaluationQuestion::where('category' , $category)->get();
        return Inertia::render('Evaluation/Answer',[
            'options' => $options,
        ]);
    }
    public function view( $category = null ){
        $evaluations = Evaluation::where('category' , $category)->get();
        return Inertia::render('Evaluation/View',[
            'evaluations' => $evaluations,
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
    public function update(Request $request, Evaluation $evaluation)
    {
        $evaluation->update($request->all());
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

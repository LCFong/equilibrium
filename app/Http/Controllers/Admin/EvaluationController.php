<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\User;
use App\Models\Evaluation;
use App\Models\EvaluationQuestion;

use App\Exports\EvaluationExport;
use Maatwebsite\Excel\Facades\Excel;

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
            // 'seven_options' => config('evaluation.seven_options'),
            'pssOptions' => config('evaluation.pssOptions'),
            'wellbeingOptions' => config('evaluation.wellbeingOptions'),
            'learningOptions' => config('evaluation.learningOptions')
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

    
    public function export( ){
        
        $user = User::with('evaluations.items.question')->get();

        $quesitons = EvaluationQuestion::get();

        $pssOptions = config('evaluation.pssOptions');
        $wellbeingOptions = config('evaluation.wellbeingOptions');
        $learningOptions = config('evaluation.learningOptions');

        $data = array_map(function($item) {
            return $item['code'];
        }, $quesitons->toArray());

        $userCount = $user->count();
        $result = [];

        foreach ($data as $d) {
            $result[$d] = array_fill(0, $userCount, 0);
        }
        foreach( $user as $k => $u ){

            foreach($u->evaluations as $e){
                
                foreach($e->items->toArray() as $i){

                    echo json_encode( $i['question']['category'] );
                    // die();
                    if( $i['question']['code'] ){

                        // 從Option中找label
                        if( $i['question']['category'] == 'pss' ){
                            $options = $pssOptions;
                        }else if( $i['question']['category'] == 'wellbeing' ){
                            $options = $wellbeingOptions;
                        }else if( $i['question']['category'] == 'learning' ){
                            $options = $learningOptions;
                        }
                        $label = null; 
                        foreach ($options as $option) {
                            if ($option['value'] == $i['value']) {
                                $label = $option['label'];
                            }
                        }

                        $result[$i['question']['code'] ][$k] = $label; 
                    }

                }
            }   
        }

        $stringResult = [];
        foreach($result as $k => $r){

            // 根據code加問題的title
            foreach ($quesitons as $item) {
                if ($item->code === $k) {
                    
                    if( is_numeric($r[0] ) ){
                        // 加title
                        array_unshift($result[$k], $item->title );
                    }
                }
            }
        }

        foreach($result as $k => $r){
            // 數字轉string
            $stringResult[$k] = array_map('strval', $r);
        }
        
        // 加user name header
        array_unshift($stringResult, array_column($user->toArray(),'name') );
        array_unshift($stringResult[0], "");
        
        $instance=new EvaluationExport();
        $instance->set_export_data($stringResult);
        return Excel::download($instance, '问卷.xlsx');
    }
}

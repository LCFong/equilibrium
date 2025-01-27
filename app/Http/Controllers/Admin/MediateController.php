<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Mediate;
use App\Models\MediateItem;
use App\Models\MediateOption;

class MediateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Mediate/Index',[
        ]);
    }

    public function answer($category = null ){
        // Mediate 作答頁
        $options = MediateOption::where('category' , $category)->get();
        return Inertia::render('Mediate/Answer',[
            'options' => $options,
            'category' => $category,
        ]);
    }
    public function viewAnswer(){
        // Mediate 查看 result 頁
        $mediates = MediateOption::where('user_id', Auth()->user()->id)->with(['items.option','user'])->orderBy('id','desc')->get();
        return Inertia::render('Mediate/ViewAnswer',[
            'mediates' => $mediates,
            'classify' => config('consultation.classify'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Mediate/CreateOption',[
            'options' => MediateOption::all(),
            'classify' => config('consultation.classify'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        
        $question = MediateOption::create($data);

        if($request->file('media') ){

            foreach($request->file('media') as $file){
                $thumbnail = $question->addMedia($file['originFileObj'])->toMediaCollection('media');    
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
    public function update(Request $request, Config $config)
    {
        $data = $request->all();
        unset($data['media']);
        MediateOption::where('id', $data['id'])->update($data);
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

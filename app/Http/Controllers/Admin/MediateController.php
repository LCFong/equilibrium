<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Mediate;
use App\Models\MediateItem;
use App\Models\MediateQuesiton;

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
        $options = MediateQuesiton::where('category' , $category)->get();
        return Inertia::render('Mediate/Answer',[
            'options' => $options,
            'category' => $category,
        ]);
    }
    public function viewAnswer(){
        // Mediate 查看 result 頁
        $mediates = MediateQuesiton::where('user_id', Auth()->user()->id)->with(['items.option','user'])->orderBy('id','desc')->get();
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
        return Inertia::render('Consultation/CreateOption',[
            'options' => MediateQuesiton::all(),
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
        MediateQuesiton::insert($data);
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

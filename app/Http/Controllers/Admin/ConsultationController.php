<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\User;
use App\Models\Consultation;
use App\Models\ConsultationItem;
use App\Models\ConsultationOption;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Consultation/Index',[
            
        ]);
    }

    public function answer($category = null ){
        // Consultation 作答頁
        $options = ConsultationOption::where('category' , $category)->get();
        return Inertia::render('Consultation/Answer',[
            'options' => $options,
            'category' => $category,
        ]);
    }
    public function viewAnswer($userId = null){
        // Consultation 查看 result 頁
        $consultations = Consultation::where('user_id', $userId)->with(['items.option','user'])->orderBy('id','desc')->get();
        return Inertia::render('Consultation/ViewAnswer',[
            'consultations' => $consultations,
            'classify' => config('classify.consultation'),
            'users' => User::all(),
            'user_id' => $userId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Consultation/CreateOption',[
            'options' => ConsultationOption::all(),
            'classify' => config('classify.consultation'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        ConsultationOption::insert($data);
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

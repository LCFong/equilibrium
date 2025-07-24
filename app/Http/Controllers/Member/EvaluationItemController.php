<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\EvaluationOption;
use App\Models\User;

class EvaluationItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        if( isset($data['do_evaluation_again']) && $data['do_evaluation_again'] == 1 ){
            User::where('id', $user_id)->update(['do_evaluation_again'=>0]);
            unset($data['do_evaluation_again'] );
        }

        // 問卷已做, 下次登入就不用做
        Auth()->user()->do_evaluation_first = 1;
        Auth()->user()->save();

        $evaluation = Evaluation::create(['user_id' => $user_id]);
        
        foreach( $data  as $key => $value ){
            $evaluation->items()->create([ 
                'code' => $key,
                // 'question' => $value['title'],
                'value' => $value,
            ]);
        }
        return redirect()->route('member.consultations.index');
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

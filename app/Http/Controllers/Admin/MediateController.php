<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Config;
use App\Models\Mediate;
use App\Models\MediateItem;
use App\Models\MediateOption;
use App\Exports\MediateExport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function viewAnswer($userId = null){
        // Mediate 查看 result 頁
        $mediates = Mediate::where('user_id', $userId)->with(['items.option','user'])->orderBy('id','desc')->get();
        return Inertia::render('Mediate/ViewAnswer',[
            'mediates' => $mediates,
            'classify' => config('classify.mediate'),
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
        return Inertia::render('Mediate/CreateOption',[
            'options' => MediateOption::all(),
            'classify' => config('classify.mediate'),
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
    
    public function export( ){
        
        $user = User::with('mediates.items.option')->get();

        $options = MediateOption::get();

        $data = array_map(function($item) {
            return $item['code'];
        }, $options->toArray());

        $userCount = $user->count();
        $result = [];

        foreach ($data as $d) {
            $result[$d] = array_fill(0, $userCount, 0);
        }
        
        foreach( $user as $k => $u ){

            foreach($u->mediates as $c){
                
                foreach($c->items as $i){

                    if( $i->option?->code ){
                        // 計次數
                        $result[$i->option?->code][$k]++; 
                    }
                    if( $i->option?->type == 'input'){
                        // 加文字
                    echo $i->option?->code."  /// ".json_encode($result[$i->option?->code][$k]);
                        is_string( $result[$i->option?->code][$k] ) ?  
                        $result[$i->option?->code][$k] = $result[$i->option?->code][$k].",   ". $i->value : 
                        $result[$i->option?->code][$k] =  $i->value; 
                    }
                }
            }   
        }

        $stringResult = [];
        foreach($result as $k => $r){

            // 根據code加問題的title
            foreach ($options as $item) {
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
        
        $instance=new MediateExport();
        $instance->set_export_data($stringResult);
        return Excel::download($instance, 'Mediate.xlsx');
    }
}

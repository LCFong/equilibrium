<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediateItem extends Model
{
    use HasFactory;
    protected $fillable=['code', 'value'];

    
    // public function mediate(){
    //     return $this->belongsTo(Mediate::class);
    // }
    public function option(){
        return $this->belongsTo(MediateOption::class,'code','code');
    }
}

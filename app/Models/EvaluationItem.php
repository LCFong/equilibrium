<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationItem extends Model
{
    use HasFactory;
    protected $fillable=['evaluation_id','user_id','code','question','value'];

    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
    public function question(){
        return $this->belongsTo(EvaluationQuestion::class,'code','code');
    }
}

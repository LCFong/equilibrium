<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizItem extends Model
{
    use HasFactory;
    protected $fillable=['quiz_id','code','value'];
    
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
    public function option(){
        return $this->belongsTo(QuizOption::class,'code','code');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationItem extends Model
{
    use HasFactory;
    protected $fillable=['consultation_id','user_id','code','value','step','option_code','selection','content'];
    protected $casts=['selection'=>'array'];
    protected $with=['option'];


    public function consultation(){
        return $this->belongsTo(Consultation::class);
    }
    public function option(){
        return $this->belongsTo(ConsultationOption::class,'code','code');
    }
    // protected $appends=['option'];

    // public function getOptionAttribute(){
    //     return $this->option;
    // }
    // protected $with=['option'];

    // public function option(){
    //     return $this->hasOne(ConsultationOption::class,'code','option_code',);
    // }

    
}

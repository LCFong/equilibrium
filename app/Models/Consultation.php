<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable=['treatment_id','data_start', 'user_id'];
    protected $with=['items'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(ConsultationItem::class);
    }
    public function peers(){
        return $this->hasMany(ConsultationItem::class)->whereHas('option', function($query){
            $query->where('category','peer');
        });
    }

    public function studies(){
        return $this->hasMany(ConsultationItem::class)->whereHas('option', function($query){
            $query->where('category','study');
        });
    }
    // public function studies(){
    //     return $this->hasMany(ConsultationItem::class)->where('category','STUDY');
    // }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable=['fullname','gender','dob','email','school','study_year','date_start','date_finish'];

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }
}

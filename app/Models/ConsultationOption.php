<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationOption extends Model
{
    use HasFactory;
    protected $fillable=['category','code','title','type'];
}

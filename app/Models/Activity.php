<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $casts=['options'=>'json'];

    public function meditation(){
        return $this->belongsTo(Meditation::class);
    }
}

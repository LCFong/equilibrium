<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    use HasFactory;
    protected $casts=["category_groups"=>"json"];

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}

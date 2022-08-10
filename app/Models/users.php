<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cars;
use App\Models\travels;

class users extends Model
{
    use HasFactory;

    public function getCar(){
        return $this->hasOne(cars::class, 'id', 'car');
    }

    public function getTravels(){
        return $this->hasMany(travels::class, 'user_id', 'id')->with('getRegion');
    }
}

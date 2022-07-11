<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function menus(){
        return $this->belongsToMany(Plat::class);
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Type extends Model
{
    use HasFactory,softDeletes;

    public function menus(){
        return $this->belongsToMany(Plat::class);
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }
}

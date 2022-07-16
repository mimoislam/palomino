<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class Menu extends Model
{
    use HasFactory,softDeletes;


    public function plats(){
        return $this->belongsToMany(Plat::class, 'plats_menus');
    }
    
    public function types(){
        return $this->hasMany(Type::class);
    }
}

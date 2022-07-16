<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plat extends Model
{
    use HasFactory,softDeletes;
    

    public function menus(){
        return $this->belongsToMany(Menu::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    
}

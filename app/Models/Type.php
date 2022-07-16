<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Type extends Model
{
    use HasFactory,softDeletes;

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function plats(){
        return $this->hasMany(Plat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Marca extends Model
{
    use HasFactory;

    /*public function componente(){
        return $this->hasMany('App\Models\Componente');
    }*/
}

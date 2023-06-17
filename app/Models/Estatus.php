<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Estatus extends Model
{
    use HasFactory;

    protected $table = 'estatus';

    /*public function componente(){
        return $this->hasMany('App\Models\Componente');
    }*/
}

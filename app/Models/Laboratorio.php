<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';
    protected $primaryKey ='id_laboratorio';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function equipo(){
        return $this->belongsToMany('App\Models\Equipo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    protected $table = 'tipo_equipos';
    protected $primaryKey ='tipoEquipo_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function componente(){
        return $this->hasMany('App\Models\Equipo');
    }
}

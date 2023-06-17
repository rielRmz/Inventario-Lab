<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';
    protected $primaryKey ='No_Serie';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function tipoSoftware(){
        return $this->belongsTo('App\Models\TipoEquipo');
    }
    public function marcas(){
        return $this->belongsTo('App\Models\Marca');
    }
    public function status(){
        return $this->belongsTo('App\Models\Estatus');
    }

    public function software(){
        return $this->belongsToMany('App\Models\Software');
    }
    public function componente(){
        return $this->belongsToMany('App\Models\Componente');
    }
    public function laboratorio(){
        return $this->belongsToMany('App\Models\Laboratorio');
    }
}

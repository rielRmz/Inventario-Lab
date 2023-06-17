<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Componente extends Model
{
    use HasFactory;

    protected $table = 'componentes';
    protected $primaryKey ='No_Serie';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function tipoComponente(){
        return $this->belongsTo('App\Models\TipoComponente', 'foreign_key');
    }
    public function marcas(){
        return $this->belongsTo('App\Models\Marca', 'foreign_key');
    }
    public function status(){
        return $this->belongsTo('App\Models\Estatus', 'foreign_key');
    }

    public function equipo(){
        return $this->belongsToMany('App\Models\Equipo');
    }
}

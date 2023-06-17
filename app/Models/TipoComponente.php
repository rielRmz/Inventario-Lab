<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoComponente extends Model
{
    use HasFactory;
    protected $table = 'tipo_componentes';
    protected $primaryKey ='tipoComponente_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    /*public function componente(){
        return $this->hasMany('App\Models\Componente');
    }*/
}

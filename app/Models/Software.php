<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software';
    protected $primaryKey ='Software_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function tipoSoftware(){
        return $this->belongsTo('App\Models\TipoSoftware');
    }

    public function equipo(){
        return $this->belongsToMany('App\Models\Equipo');
    }
}

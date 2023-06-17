<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSoftware extends Model
{
    use HasFactory;

    protected $table = 'tipo_software';
    protected $primaryKey ='tipoSoftware_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function software(){
        return $this->hasMany('App\Models\Software');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $table = 'licencias';
    protected $primaryKey ='No_Serie';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
}

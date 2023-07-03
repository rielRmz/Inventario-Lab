<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index(){
        $Equipos = DB::table('equipos')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->select('m.descripcion AS Marcas', DB::raw('count(equipos.*) as cantidades'))
            ->groupBY('m.descripcion')
            ->get();

        $Labs = DB::table('laboratorios')
            ->join('equipo_has_laboratorios AS ehl', 'laboratorios.id_laboratorio', '=', 'ehl.id_laboratorio')
            ->select('laboratorio', DB::raw('count(laboratorios.*) as cantidades'))
            ->groupBY('laboratorio')
            ->get();

        $equipo = $Equipos->mapWithKeys(function ($item, $key){
           return [$item->Marcas => $item->cantidades];
        });
        $labs = $Labs->mapWithKeys(function ($item, $key){
            return [$item->laboratorio => $item->cantidades];
        });

        return view('admin.index',compact('Equipos','equipo','Labs','labs'));
    }
}

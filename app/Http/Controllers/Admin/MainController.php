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
        $getData = DB::table('equipos')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->select('m.descripcion AS Marcas', DB::raw('count(equipos.*) as cantidades'))
            ->groupBY('m.descripcion')
            ->get();

        $data = $getData->mapWithKeys(function ($item, $key){
           return [$item->Marcas => $item->cantidades];
        });

        return view('admin.index',compact('data'));
    }
}

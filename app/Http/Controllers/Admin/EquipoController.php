<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoRules;
use App\Models\Equipo;
use App\Models\EquipoSoftware;
use App\Models\Estatus;
use App\Models\Marca;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        return view('admin.Equipos.index');
    }

    /**
     * Generar los reportes PDF.
     */
    public function pdf(){
        //
        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->join('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->orderby('created_at','asc')
            ->get();

        $pdf = Pdf::loadView('admin.Equipos.pdf',['equipos'=>$equipos]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        //return view('admin.Equipos.pdf', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
        $tipoEquipos = TipoEquipo::all();
        $marcas = Marca::all();
        $status = Estatus::all();

        $select1 = [];
        $select2 = [];
        $select3 = [];

        foreach($tipoEquipos as $tipoEquipo){
            $select1[$tipoEquipo->tipoEquipo_id] = $tipoEquipo->tipoEquipo;
        }
        foreach ($marcas as $marca) {
            $select2[$marca->id] = $marca->descripcion;
        }
        foreach ($status as $estatus) {
            $select3[$estatus->id] = $estatus->descripcion;
        }

        return view('admin.Equipos.create', compact('select1','select2','select3'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoRules $request){
        //
        $equipo = new Equipo();

        $equipo->No_Serie = $request->No_Serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->contrasena = $request->contrasena;
        $equipo->estatus_id = $request->estatus_id;
        $equipo->marca_id = $request->marca_id;
        $equipo->tipoEquipo_id = $request->tipoEquipo_id;

        $equipo->save();

        return redirect()->route('admin.equipo.index')->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show($No_Serie){
        //
        return view('details.index', compact('No_Serie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo){
        //
        $equipo = Equipo::select('equipos.*','m.descripcion AS marca','s.descripcion AS estatus','te.tipoEquipo')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->join('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->where('No_Serie','=',$equipo->No_Serie)
            ->first();

        $tipoEquipos = TipoEquipo::all();
        $marcas = Marca::all();
        $status = Estatus::all();

        return view('admin.Equipos.edit', compact('equipo'), compact('tipoEquipos','marcas','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoRules $request, Equipo $equipo){
        //
        $equipo->No_Serie = $request->No_Serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->contrasena = $request->contrasena;
        $equipo->estatus_id = $request->estatus_id;
        $equipo->marca_id = $request->marca_id;
        $equipo->tipoEquipo_id = $request->tipoEquipo_id;

        $equipo->save();

        return redirect()->route('admin.equipo.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo){
        //
        $equipo->delete();

        return redirect()->route('admin.equipo.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

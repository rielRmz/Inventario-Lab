<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoLaboratorioStoreRules;
use App\Http\Requests\EquipoLaboratorioUpdateRules;
use App\Models\{Equipo, EquipoLaboratorio, Laboratorio};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratorioEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_lab){
        //
        $labEquipos = EquipoLaboratorio::select("*")
            ->where("id_laboratorio", "=", $id_lab)
            ->get();

        return view('details.labsEquipo.index', compact('labEquipos','id_lab'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_lab){
        //
        $Equipos = Equipo::all();

        return view('details.labsEquipo.create', compact('Equipos','id_lab'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoLaboratorioStoreRules $request){
        //
        $equipoLab = new EquipoLaboratorio();

        $equipoLab->No_Serie = $request->No_Serie;
        $equipoLab->id_laboratorio = $request->id_laboratorio;
        $equipoLab->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoLab->equipoLab_id = $request->equipoLab_id;
        $equipoLab->Usuario_id = Auth::user()->id;

        $equipoLab->save();

        return redirect()->route('details.labEquipo.index',$equipoLab->id_laboratorio)->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //Funcion para mostrar detalles
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipoLaboratorio $labEquipo){
        //
        $Labs = Laboratorio::all();
        $Equipos = Equipo::all();

        return view('details.labsEquipo.edit', compact('labEquipo', 'Equipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoLaboratorioUpdateRules $request, EquipoLaboratorio $labEquipo){
        //
        $labEquipo->No_Serie = $request->No_Serie;
        $labEquipo->id_laboratorio = $request->id_laboratorio;
        $labEquipo->fecha_Instalacion = $request->fecha_Instalacion;
        $labEquipo->fecha_Desnstalacion = $request->fecha_Desnstalacion;
        $labEquipo->equipoLab_id = null;

        $labEquipo->save();

        $equipoLab_nuevo = new EquipoLaboratorio();

        $equipoLab_nuevo->No_Serie = $request->No_Serie_A;
        $equipoLab_nuevo->id_laboratorio = $request->id_laboratorio;
        $equipoLab_nuevo->fecha_Instalacion = $request->fecha_Instalacion_A;
        $equipoLab_nuevo->equipoLab_id = $request->equipoLab_id_A;
        $equipoLab_nuevo->Usuario_id = Auth::user()->id;

        $equipoLab_nuevo->save();

        return redirect()->route('details.labEquipo.index',$labEquipo->id_laboratorio)->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoLaboratorio $labEquipo){
        //
        $labEquipo->delete();

        return redirect()->route('admin.labs.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}


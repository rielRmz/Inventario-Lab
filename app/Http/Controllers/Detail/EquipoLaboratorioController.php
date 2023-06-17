<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoLaboratorioStoreRules;
use App\Http\Requests\EquipoLaboratorioUpdateRules;
use App\Models\{Equipo, EquipoLaboratorio, Laboratorio};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoLaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($No_Serie){
        //
        /*$equipoLabs = EquipoLaboratorio::select("*")
            ->where("No_Serie", "=", $equipo)
            ->get();

        return view('details.equipoLabs.index', compact('equipoLabs','equipo'));*/
        return view('details.index', compact('No_Serie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($equipo){
        //
        $Labs = Laboratorio::all();

        return view('details.equipoLabs.create', compact('Labs','equipo'));
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

        return redirect()->route('admin.equipo.show',$equipoLab->No_Serie)->with('message','Registro guardado exitosamente')->with('type','store');
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
    public function edit(EquipoLaboratorio $equipoLab){
        //
        $Labs = Laboratorio::all();
        $Equipos = Equipo::all();

        return view('details.equipoLabs.edit', compact('equipoLab', 'Labs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoLaboratorioUpdateRules $request, EquipoLaboratorio $equipoLab){
        //
        $equipoLab->No_Serie = $request->No_Serie;
        $equipoLab->id_laboratorio = $request->id_laboratorio;
        $equipoLab->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoLab->fecha_Desnstalacion = $request->fecha_Desnstalacion;
        $equipoLab->equipoLab_id = null;
        $equipoLab->Usuario_id = Auth::user()->id;

        $equipoLab->save();

        $equipoLab_nuevo = new EquipoLaboratorio();

        $equipoLab_nuevo->No_Serie = $request->No_Serie;
        $equipoLab_nuevo->id_laboratorio = $request->id_laboratorio_A;
        $equipoLab_nuevo->fecha_Instalacion = $request->fecha_Instalacion_A;
        $equipoLab_nuevo->equipoLab_id = $request->equipoLab_id;
        $equipoLab_nuevo->Usuario_id = Auth::user()->id;

        $equipoLab_nuevo->save();

        return redirect()->route('admin.equipo.show',$equipoLab->No_Serie)->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoLaboratorio $equipoLab){
        //
        $equipoLab->delete();

        return redirect()->route('details.equipo.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

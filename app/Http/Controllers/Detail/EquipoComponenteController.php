<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoComponenteStoreRules;
use App\Http\Requests\EquipoComponenteUpdateRules;
use App\Models\{Componente, Equipo, EquipoComponente};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($No_Serie){
        //
        /*$equipoComps = EquipoComponente::select("*")
            ->where("No_Serie", "=", $equipo)
            ->get();

        return view('details.equipoComp.index', compact('equipoComps','equipo'));*/
        return view('details.index', compact('No_Serie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($equipo){
        //
        $Comps = Componente::all();

        return view('details.equipoComp.create', compact('Comps','equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoComponenteStoreRules $request){
        //
        $equipoComp = new EquipoComponente();

        $equipoComp->No_Serie = $request->No_Serie;
        $equipoComp->Componente_id = $request->Componente_id;
        $equipoComp->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoComp->Usuario_id = Auth::user()->id;

        $equipoComp->save();

        return redirect()->route('admin.equipo.show', $equipoComp->No_Serie)->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show(){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipoComponente $equipoComp){
        //
        $Comps = Componente::all();
        $Equipos = Equipo::all();

        return view('details.equipoComp.edit', compact('equipoComp', 'Comps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoComponenteUpdateRules $request, EquipoComponente $equipoComp){
        //
        $equipoComp->No_Serie = $request->No_Serie;
        $equipoComp->Componente_id = $request->Componente_id;
        $equipoComp->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoComp->fecha_Desnstalacion = $request->fecha_Desnstalacion;
        $equipoComp->motivo = $request->motivo;
        $equipoComp->Usuario_id = Auth::user()->id;

        $equipoComp->save();

        $equipoComp_nuevo = new EquipoComponente();

        $equipoComp_nuevo->No_Serie = $request->No_Serie;
        $equipoComp_nuevo->Componente_id = $request->Componente_id_A;
        $equipoComp_nuevo->fecha_Instalacion = $request->fecha_Instalacion_A;
        $equipoComp_nuevo->Usuario_id = Auth::user()->id;

        $equipoComp_nuevo->save();

        return redirect()->route('admin.equipo.show',$equipoComp->No_Serie)->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoComponente $equipoComp){
        //
        $equipoComp->delete();

        return redirect()->route('admin.equipo.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoSoftwareStoreRules;
use App\Http\Requests\EquipoSoftwareUpdateRules;
use App\Models\{Equipo, EquipoSoftware, Software};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoSoftwareController extends Controller
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
        $Softs = Software::all();

        return view('details.equipoSoft.create', compact('Softs','equipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipoSoftwareStoreRules $request){
        //
        $equipoSoft = new EquipoSoftware();

        $equipoSoft->No_Serie = $request->No_Serie;
        $equipoSoft->Software_id = $request->Software_id;
        $equipoSoft->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoSoft->Usuario_id = Auth::user()->id;

        $equipoSoft->save();

        return redirect()->route('admin.equipo.show',$equipoSoft->No_Serie)->with('message','Registro guardado exitosamente')->with('type','store');
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
    public function edit(EquipoSoftware $equipoSoft){
        //
        $Softs = Software::all();
        $Equipos = Equipo::all();

        return view('details.equipoSoft.edit', compact('Softs','equipoSoft'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipoSoftwareUpdateRules $request, EquipoSoftware $equipoSoft){
        //
        $equipoSoft->No_Serie = $request->No_Serie;
        $equipoSoft->Software_id = $request->Software_id;
        $equipoSoft->fecha_Instalacion = $request->fecha_Instalacion;
        $equipoSoft->fecha_Desnstalacion = $request->fecha_Desnstalacion;
        $equipoSoft->motivo = $request->motivo;
        $equipoSoft->Usuario_id = Auth::user()->id;

        $equipoSoft->save();

        $equipoSoft_nuevo = new EquipoSoftware();

        $equipoSoft_nuevo->No_Serie = $request->No_Serie;
        $equipoSoft_nuevo->Software_id = $request->Software_i_A;
        $equipoSoft_nuevo->fecha_Instalacion = $request->fecha_Instalacion_A;
        $equipoSoft_nuevo->Usuario_id = Auth::user()->id;

        $equipoSoft_nuevo->save();

        return redirect()->route('admin.equipo.show',$equipoSoft->No_Serie)->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquipoSoftware $equipoSoft){
        //
        $equipoSoft->delete();

        return redirect()->route('admin.equipo.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

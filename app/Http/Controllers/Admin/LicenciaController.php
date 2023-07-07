<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenciaStoreRule;
use App\Http\Requests\LicenciaUpdateRule;
use App\Models\Licencia;

class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $licencias = Licencia::all();

        return view('admin.Licencias.index', compact('licencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Licencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenciaStoreRule $request)
    {
        $lic = new Licencia();

        $lic->No_Serie = $request->No_Serie;
        $lic->descripcion = $request->descripcion;
        $lic->fecha_Activacion = $request->fecha_Activacion;
        $lic->fecha_Caducacion = $request->fecha_Caducacion;

        $lic->save();

        return redirect()->route('admin.licencias.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licencia $lic)
    {
        return view('admin.Licencias.edit', compact('lic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LicenciaUpdateRule $request, Licencia $lic)
    {
        $lic->No_Serie = $request->No_Serie;
        $lic->descripcion = $request->descripcion;
        $lic->fecha_Activacion = $request->fecha_Activacion;
        $lic->fecha_Caducacion = $request->fecha_Caducacion;

        $lic->save();

        return redirect()->route('admin.licencias.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licencia $lic)
    {
        $lic->delete();

        return redirect()->route('admin.licencias.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoEquipoRules;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos = TipoEquipo::orderBy('tipoEquipo_id','asc')->paginate();

        return view('admin.tipoEquipo.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipoEquipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoEquipoRules $request)
    {
        //
        $equipos = new TipoEquipo();

        $equipos->tipoEquipo_id = $request->tipoEquipo_id;
        $equipos->tipoEquipo = $request->tipoEquipo;
        $equipos->save();

        return redirect()->route('admin.tipoEquipo.index')->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoEquipo $equipo)
    {
        //
        return view('admin.tipoEquipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoEquipoRules $request, TipoEquipo $equipo)
    {
        //
        $equipo->tipoEquipo_id = $request->tipoEquipo_id;
        $equipo->tipoEquipo = $request->tipoEquipo;
        $equipo->save();

        return redirect()->route('admin.tipoEquipo.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoEquipo $equipo)
    {
        //
        $equipo->delete();

        return redirect()->route('admin.tipoEquipo.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

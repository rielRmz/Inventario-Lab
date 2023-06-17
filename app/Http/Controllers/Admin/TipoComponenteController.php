<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoComponenteRules;
use App\Models\TipoComponente;
use Illuminate\Http\Request;

class TipoComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comps = TipoComponente::orderBy('tipoComponente_id','asc')->paginate();

        return view('admin.tipoComponente.index', compact('comps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipoComponente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoComponenteRules $request)
    {
        //
        $comps = new TipoComponente();

        $comps->tipoComponente_id = $request->tipoComponente_id;
        $comps->tipoComponente = $request->tipoComponente;
        $comps->save();

        return redirect()->route('admin.tipoComp.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
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
    public function edit(TipoComponente $comp)
    {
        //
        return view('admin.tipoComponente.edit', compact('comp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoComponenteRules $request, TipoComponente $comp)
    {
        //
        $comp->tipoComponente_id = $request->tipoComponente_id;
        $comp->tipoComponente = $request->tipoComponente;
        $comp->save();

        return redirect()->route('admin.tipoComp.index')->with('message', 'Registro actualizado exitosamente')->with('type', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoComponente $comp)
    {
        //
        $comp->delete();

        return redirect()->route('admin.tipoComp.index')->with('message', 'Registro eliminado exitosamente')->with('type', 'destroy');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoSoftwareRules;
use App\Models\TipoSoftware;
use Illuminate\Http\Request;

class TipoSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $softs = TipoSoftware::orderBy('tipoSoftware_id','asc')->paginate();

        return view('admin.tipoSoftware.index', compact('softs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipoSoftware.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoSoftwareRules $request)
    {
        //
        $soft = new TipoSoftware();

        $soft->tipoSoftware_id = $request->tipoSoftware_id;
        $soft->tipoSoftware = $request->tipoSoftware;

        $soft->save();

        return redirect()->route('admin.tipoSoft.index')->with('message','Registro guardado exitosamente')->with('type','store');
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
    public function edit(TipoSoftware $soft)
    {
        //
        return view('admin.tipoSoftware.edit', compact('soft'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoSoftwareRules $request, TipoSoftware $soft)
    {
        //
        $soft->tipoSoftware_id = $request->tipoSoftware_id;
        $soft->tipoSoftware = $request->tipoSoftware;

        $soft->save();

        return redirect()->route('admin.tipoSoft.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoSoftware $soft)
    {
        //
        $soft->delete();

        return redirect()->route('admin.tipoSoft.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

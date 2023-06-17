<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estatus;
use Illuminate\Http\Request;

class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estatus = Estatus::all();

        return view('admin.Estatus.index', compact('estatus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Estatus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'descripcion' => 'required|min:3|max:50'
        ]);

        $status = new Estatus();

        $status->descripcion = $request->descripcion;
        $status->save();

        return redirect()->route('admin.status.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estatus $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estatus $status)
    {
        //
        return view('admin.Estatus.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estatus $status)
    {
        //
        $request->validate([
            'descripcion' => 'required|min:3|max:50'
        ]);

        $status->descripcion = $request->descripcion;
        $status->save();

        return redirect()->route('admin.status.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estatus $status)
    {
        //
        $status->delete();

        return redirect()->route('admin.status.index')->with('message', 'Registro eliminado exitosamente')->with('type', 'destroy');
    }
}

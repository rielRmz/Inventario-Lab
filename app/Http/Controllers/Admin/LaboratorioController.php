<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaboratorioRules;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $labs = Laboratorio::all();

        return view('admin.Laboratorios.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Laboratorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaboratorioRules $request){
        //
        $labs = new Laboratorio();

        $labs->id_laboratorio = $request->id_laboratorio;
        $labs->laboratorio = $request->laboratorio;
        $labs->save();

        return redirect()->route('admin.labs.index')->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_lab)
    {
        //
        return redirect()->route('details.labEquipo.index', $id_lab);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorio $lab){
        //
        return view('admin.Laboratorios.edit', compact('lab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaboratorioRules $request, Laboratorio $lab){
        //
        $lab->id_laboratorio = $request->id_laboratorio;
        $lab->laboratorio = $request->laboratorio;
        $lab->save();

        return redirect()->route('admin.labs.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratorio $lab){
        //
        $lab->delete();

        return redirect()->route('admin.labs.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $marcas = Marca::select('marcas.*')
            ->orderby('id','asc')
            ->get();

        return view('admin.Marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Marcas.create');
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

        $marcas = new Marca();

        $marcas->descripcion = $request->descripcion;
        $marcas->save();

        return redirect()->route('admin.marcas.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
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
    public function edit(Marca $marca)
    {
        //
        return view('admin.Marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
        $request->validate([
            'descripcion' => 'required|min:3|max:50'
        ]);

        $marca->descripcion = $request->descripcion;
        $marca->save();

        return redirect()->route('admin.marcas.index')->with('message', 'Registro actualizado exitosamente')->with('type', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
        $marca->delete();

        return redirect()->route('admin.marcas.index')->with('message', 'Registro eliminado exitosamente')->with('type', 'destroy');
    }
}

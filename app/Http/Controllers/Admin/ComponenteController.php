<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComponenteRules;
use App\Models\{Componente, Estatus, Marca, TipoComponente};

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comps = Componente::select('componentes.*','tipo_componentes.tipoComponente','marcas.descripcion as marca','estatus.descripcion as estatus')
            ->join('marcas', 'marcas.id', '=','componentes.marca_id' )
            ->join('estatus', 'estatus.id', '=','componentes.estatus_id' )
            ->join('tipo_componentes', 'tipo_componentes.tipoComponente_id', '=','componentes.tipoComponente_id' )
            ->paginate(10);

        return view('admin.Componentes.index', compact('comps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipoComps = TipoComponente::all();
        $marcas = Marca::all();
        $status = Estatus::all();

        $select1 = [];
        $select2 = [];
        $select3 = [];

        foreach ($tipoComps as $tipoComp) {
            $select1[$tipoComp->tipoComponente_id] = $tipoComp->tipoComponente_id;
        }
        foreach ($marcas as $marca) {
            $select2[$marca->id] = $marca->descripcion;
        }
        foreach ($status as $estatus) {
            $select3[$estatus->id] = $estatus->descripcion;
        }

        return view('admin.Componentes.create', compact('select1', 'select2', 'select3'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComponenteRules $request)
    {
        //
        $comp = new Componente();

        $comp->No_Serie = $request->No_Serie;
        $comp->descripcion = $request->descripcion;
        $comp->estatus_id = $request->estatus_id;
        $comp->marca_id = $request->marca_id;
        $comp->tipoComponente_id = $request->tipoComponente_id;

        $comp->save();

        return redirect()->route('admin.componente.index')->with('message', 'Registro guardado exitosamente')->with('type', 'store');
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
    public function edit(Componente $comp)
    {
        //
        $comps = Componente::select('componentes.*','tipo_componentes.tipoComponente','marcas.descripcion as marca','estatus.descripcion as estatus')
            ->join('marcas', 'marcas.id', '=','componentes.marca_id' )
            ->join('estatus', 'estatus.id', '=','componentes.estatus_id' )
            ->join('tipo_componentes', 'tipo_componentes.tipoComponente_id', '=','componentes.tipoComponente_id' )
            ->where('No_Serie','=',$comp->No_Serie)
            ->first();

        $tipoComps = TipoComponente::all();
        $marcas = Marca::all();
        $status = Estatus::all();

        return view('admin.Componentes.edit', compact('comps', 'tipoComps','marcas','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComponenteRules $request, Componente $comp)
    {
        //
        $comp->No_Serie = $request->No_Serie;
        $comp->descripcion = $request->descripcion;
        $comp->estatus_id = $request->estatus_id;
        $comp->marca_id = $request->marca_id;
        $comp->tipoComponente_id = $request->tipoComponente_id;

        $comp->save();

        return redirect()->route('admin.componente.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Componente $comp)
    {
        //
        $comp->delete();

        return redirect()->route('admin.componente.index')->with('message', 'Registro eliminado exitosamente')->with('type', 'destroy');
    }
}

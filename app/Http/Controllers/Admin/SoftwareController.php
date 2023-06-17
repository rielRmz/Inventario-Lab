<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoftwareRules;
use App\Models\Software;
use App\Models\TipoSoftware;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        $softs = Software::orderBy('tipoSoftware_id','asc')->paginate(10);

        return view('admin.Software.index', compact('softs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        $tipoSofts = TipoSoftware::all();

        $select = [];

        foreach($tipoSofts as $tipoSoft){
            $select[$tipoSoft->tipoSoftware_id] = $tipoSoft->tipoSoftware_id;
        }

        return view('admin.Software.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SoftwareRules $request): RedirectResponse
    {
        //
        $soft = new Software();

        $soft->Software_id = $request->Software_id;
        $soft->descripcion = $request->descripcion;
        $soft->tipoSoftware_id = $request->tipoSoftware_id;

        $soft->save();

        return redirect()->route('admin.software.index')->with('message','Registro guardado exitosamente')->with('type','store');
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
    public function edit(Software $soft){
        //
        $tipoSofts = TipoSoftware::all();

        return view('admin.Software.edit', compact('soft','tipoSofts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SoftwareRules $request, Software $soft){
        //
        $soft->Software_id = $request->Software_id;
        $soft->descripcion = $request->descripcion;
        $soft->tipoSoftware_id = $request->tipoSoftware_id;

        $soft->save();

        return redirect()->route('admin.software.index')->with('message','Registro actualizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Software $soft){
        //
        $soft->delete();

        return redirect()->route('admin.software.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

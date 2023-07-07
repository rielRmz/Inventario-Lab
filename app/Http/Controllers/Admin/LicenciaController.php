<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(ComponenteRules $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Componente $comp)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComponenteRules $request, Componente $comp)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Componente $comp)
    {

    }

}

<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Models\LicenciaSoftware;
use Illuminate\Http\Request;

class LicenciaSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($Software_id){
        //
        $licSoftwares = LicenciaSoftware::select("*")
            ->where("Software_id", "=", $Software_id)
            ->get();

        return view('details.SoftsLics.index', compact('licSoftwares','Software_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

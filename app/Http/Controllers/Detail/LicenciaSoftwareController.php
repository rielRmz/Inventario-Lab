<?php

namespace App\Http\Controllers\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenciaSoftwareRule;
use App\Models\Equipo;
use App\Models\Licencia;
use App\Models\LicenciaSoftware;
use Illuminate\Http\Request;

class LicenciaSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($Software_id){
        //
        /*$licSoftwares = LicenciaSoftware::select("*")
            ->where("Software_id", "=", $Software_id)
            ->get();*/

        $licSoftwares = LicenciaSoftware::select('software_has_licencias.*','s.descripcion AS Software', 'l.descripcion AS Licencia', 'l.fecha_Activacion', 'l.fecha_Caducacion')
            ->join('licencias AS l', 'l.No_Serie', '=','software_has_licencias.Licencia_id')
            ->join('software AS s', 's.Software_id', '=','software_has_licencias.Software_id' )
            ->where("s.Software_id", "=", $Software_id)
            ->get();

        return view('details.SoftsLics.index', compact('licSoftwares','Software_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($Software_id)
    {
        //
        $Licencias = Licencia::all();

        return view('details.SoftsLics.create', compact('Licencias','Software_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicenciaSoftwareRule $request)
    {
        $SoftsLic = new LicenciaSoftware();

        $SoftsLic->Licencia_id = $request->Licencia_id;
        $SoftsLic->Software_id = $request->Software_id;

        $SoftsLic->save();

        return redirect()->route('details.licSoftware.index',$SoftsLic->Software_id)->with('message','Registro guardado exitosamente')->with('type','store');
    }

    /**
     * Display the specified resource.
     */
    public function show(LicenciaSoftware $licSoftware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LicenciaSoftware $licSoftware)
    {
        //
        $Licencias = Licencia::all();

        return view('details.SoftsLics.edit', compact('Licencias','licSoftware'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LicenciaSoftwareRule $request, LicenciaSoftware $licSoftware)
    {
        //
        $licSoftware->Licencia_id = $request->Licencia_id;
        $licSoftware->Software_id = $request->Software_id;

        $licSoftware->save();

        return redirect()->route('details.licSoftware.index', $licSoftware->Software_id)->with('message','Registro actulizado exitosamente')->with('type','update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LicenciaSoftware $licSoftware)
    {
        //
        $licSoftware->delete();

        return redirect()->route('admin.soft.index')->with('message','Registro eliminado exitosamente')->with('type','destroy');
    }
}

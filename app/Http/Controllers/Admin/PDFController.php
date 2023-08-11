<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Laboratorio;
use App\Models\Marca;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.PDF.index');
    }

    /**
     * Funcion para generar el reporte de todos los Equipos disponibles.
     */
    public function EquiposFull()
    {
        //
        $date = Carbon::now();
        $date = $date->format('d-M-Y');

        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo', 'l.laboratorio')
            ->leftjoin('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->leftjoin('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->leftjoin('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->leftjoin('equipo_has_laboratorios AS ehl', 'equipos.No_Serie', '=', 'ehl.No_Serie')
            ->leftjoin('laboratorios AS l', 'ehl.id_laboratorio', '=', 'l.id_laboratorio')
            ->orderby('created_at', 'asc')
            ->get();

        $pdf = Pdf::loadView('admin.PDF.reporteEquipo', ['equipos' => $equipos, 'tipo' => 1, 'date' => $date]);
        $pdf->setPaper('A3','portrait');
        return $pdf->stream();
    }

    /**
     * Funcion para generar el reporte de todos los Equipos disponibles de una determinada marca.
     */
    public function Equipos($marca)
    {
        //
        $date = Carbon::now();
        $date = $date->format('d-M-Y');

        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo', 'l.laboratorio')
            ->leftjoin('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->leftjoin('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->leftjoin('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->leftjoin('equipo_has_laboratorios AS ehl', 'equipos.No_Serie', '=', 'ehl.No_Serie')
            ->leftjoin('laboratorios AS l', 'ehl.id_laboratorio', '=', 'l.id_laboratorio')
            ->where('marca_id', '=', $marca)
            ->orderby('created_at', 'asc')
            ->get();

        $descripcion = Marca::Select('marcas.*')
        ->where('id', '=', $marca)
        ->get();

        $pdf = Pdf::loadView('admin.PDF.reporteEquipo', ['equipos' => $equipos, 'tipo' => 2, 'marca' => $descripcion, 'date' => $date]);
        $pdf->setPaper('A3','portrait');
        return $pdf->stream();
    }

    /**
     * Funcion para generar el reporte de todos los Equipos instalados en un determinado laboratorio.
     */
    public function LaboratoriosFull()
    {
        //
        $date = Carbon::now();
        $date = $date->format('d-M-Y');

        $labs = Equipo::select('ehl.equipoLab_id','s.descripcion AS SO','equipos.*',
        'cP.descripcion AS proc','cR.descripcion AS Ram','cM.descripcion AS Monitor',
            'cA.descripcion AS Almacenamiento')
            /*laboratorio*/
            ->join('equipo_has_laboratorios AS ehl', 'equipos.No_Serie', '=', 'ehl.No_Serie')
            ->join('laboratorios AS l', 'ehl.id_laboratorio', '=', 'l.id_laboratorio')
            /*Sistema Operativo*/
            ->join('equipo_has_software AS ehs', 'equipos.No_Serie', '=', 'ehs.No_Serie')
            ->join('software AS s', 'ehs.Software_id', '=', 's.Software_id')
            ->join('tipo_software AS ts', 's.tipoSoftware_id', '=', 'ts.tipoSoftware_id')
            /*procesador*/
            ->join('equipo_has_componentes AS ehcP', 'equipos.No_Serie', '=', 'ehcP.No_Serie')
            ->join('componentes AS cP', 'ehcP.Componente_id', '=', 'cP.No_Serie')
            ->join('tipo_componentes AS tcP', 'cP.tipoComponente_id', '=', 'tcP.tipoComponente_id')
            /*mem-RAM*/
            ->join('equipo_has_componentes AS ehcR', 'equipos.No_Serie', '=', 'ehcR.No_Serie')
            ->join('componentes AS cR', 'ehcR.Componente_id', '=', 'cR.No_Serie')
            ->join('tipo_componentes AS tcR', 'cR.tipoComponente_id', '=', 'tcR.tipoComponente_id')
            /*Monitor*/
            ->join('equipo_has_componentes AS ehcM', 'equipos.No_Serie', '=', 'ehcM.No_Serie')
            ->join('componentes AS cM', 'ehcM.Componente_id', '=', 'cM.No_Serie')
            ->join('tipo_componentes AS tcM', 'cM.tipoComponente_id', '=', 'tcM.tipoComponente_id')
            /*Almacenamiento*/
            ->join('equipo_has_componentes AS ehcA', 'equipos.No_Serie', '=', 'ehcA.No_Serie')
            ->join('componentes AS cA', 'ehcA.Componente_id', '=', 'cA.No_Serie')
            ->join('tipo_componentes AS tcA', 'cA.tipoComponente_id', '=', 'tcA.tipoComponente_id')
            ->where('s.tipoSoftware_id', '=', 'Sis_Op')
            ->where('tcA.tipoComponente_id','LIKE','%D')
            ->where('tcP.tipoComponente_id', '=', 'Proc')
            ->where('tcR.tipoComponente_id', '=', 'Mem_RAM')
            ->where('tcM.tipoComponente_id', '=', 'Monitor')
            ->orderby('equipoLab_id', 'asc')
            ->get();

        $pdf = Pdf::loadView('admin.PDF.reporteLaboratorios', ['labs' => $labs, 'tipo' => 1, 'date' => $date]);
        $pdf->setPaper('A3','portrait');
        return $pdf->stream();
    }

    public function Laboratorios($lab)
    {
        //
        $date = Carbon::now();
        $date = $date->format('d-M-Y');

        $labs = Equipo::select('ehl.equipoLab_id','s.descripcion AS SO','equipos.*',
            'cP.descripcion AS proc','cR.descripcion AS Ram','cM.descripcion AS Monitor'
            ,'cA.descripcion AS Almacenamiento')
            /*laboratorio*/
            ->join('equipo_has_laboratorios AS ehl', 'equipos.No_Serie', '=', 'ehl.No_Serie')
            ->join('laboratorios AS l', 'ehl.id_laboratorio', '=', 'l.id_laboratorio')
            /*Sistema Operativo*/
            ->join('equipo_has_software AS ehs', 'equipos.No_Serie', '=', 'ehs.No_Serie')
            ->join('software AS s', 'ehs.Software_id', '=', 's.Software_id')
            ->join('tipo_software AS ts', 's.tipoSoftware_id', '=', 'ts.tipoSoftware_id')
            /*procesador*/
            ->join('equipo_has_componentes AS ehcP', 'equipos.No_Serie', '=', 'ehcP.No_Serie')
            ->join('componentes AS cP', 'ehcP.Componente_id', '=', 'cP.No_Serie')
            ->join('tipo_componentes AS tcP', 'cP.tipoComponente_id', '=', 'tcP.tipoComponente_id')
            /*mem-RAM*/
            ->join('equipo_has_componentes AS ehcR', 'equipos.No_Serie', '=', 'ehcR.No_Serie')
            ->join('componentes AS cR', 'ehcR.Componente_id', '=', 'cR.No_Serie')
            ->join('tipo_componentes AS tcR', 'cR.tipoComponente_id', '=', 'tcR.tipoComponente_id')
            /*Monitor*/
            ->join('equipo_has_componentes AS ehcM', 'equipos.No_Serie', '=', 'ehcM.No_Serie')
            ->join('componentes AS cM', 'ehcM.Componente_id', '=', 'cM.No_Serie')
            ->join('tipo_componentes AS tcM', 'cM.tipoComponente_id', '=', 'tcM.tipoComponente_id')
            /*Almacenamiento*/
            ->join('equipo_has_componentes AS ehcA', 'equipos.No_Serie', '=', 'ehcA.No_Serie')
            ->join('componentes AS cA', 'ehcA.Componente_id', '=', 'cA.No_Serie')
            ->join('tipo_componentes AS tcA', 'cA.tipoComponente_id', '=', 'tcA.tipoComponente_id')
            ->where('l.id_laboratorio', '=', $lab)
            ->where('s.tipoSoftware_id', '=', 'Sis_Op')
            ->where('tcA.tipoComponente_id','LIKE','%D')
            ->where('tcP.tipoComponente_id', '=', 'Proc')
            ->where('tcR.tipoComponente_id', '=', 'Mem_RAM')
            ->where('tcM.tipoComponente_id', '=', 'Monitor')
            ->orderby('equipoLab_id', 'asc')
            ->get();

            $laboratorio = Laboratorio::Select('laboratorios.*')
            ->where('id_laboratorio', '=', $lab)
            ->get();

        $pdf = Pdf::loadView('admin.PDF.reporteLaboratorios', ['labs' => $labs, 'tipo' => 2, 'marca' => $laboratorio, 'date' => $date]);
        $pdf->setPaper('A3','portrait');
        return $pdf->stream();
    }
}

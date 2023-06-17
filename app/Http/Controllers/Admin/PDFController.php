<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        return view('admin.PDF.index');
    }

    /**
     * Funcion para generar el reporte de todos los Equipos disponibles.
     */
    public function EquiposFull(){
        //
        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->join('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->orderby('created_at','asc')
            ->get();

        $pdf = Pdf::loadView('admin.PDF.pdf',['equipos'=>$equipos]);
        return $pdf->stream();
    }

    /**
     * Funcion para generar el reporte de todos los Equipos disponibles.
     */
    public function Equipos($marca){
        //
        $equipos = Equipo::select('equipos.*', 'm.descripcion AS marca', 's.descripcion AS estatus', 'te.tipoEquipo')
            ->join('tipo_equipos AS te', 'equipos.tipoEquipo_id', '=', 'te.tipoEquipo_id')
            ->join('marcas AS m', 'equipos.marca_id', '=', 'm.id')
            ->join('estatus AS s', 'equipos.estatus_id', '=', 's.id')
            ->where('marca_id','=',$marca)
            ->orderby('created_at','asc')
            ->get();

        $pdf = Pdf::loadView('admin.PDF.pdf',['equipos'=>$equipos]);
        return $pdf->stream();
    }
}

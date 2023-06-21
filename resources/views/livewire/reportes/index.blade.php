<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="card">
        <div class="card-header">
            <select wire:model="report" class="form-control">
                <option value="" selected>Elije</option>
                <optgroup label="-- Reportes de los Equipos --">
                    <option value="1">Reporte de todos los equipos disponibles</option>
                    <option value="2">Reporte de todos los equipos de la marca DELL</option>
                    <option value="3">Reporte de todos los equipos de la marca ACER</option>
                    <option value="4">Reporte de todos los equipos de la marca LANIX</option>
                    <option value="5">Reporte de todos los equipos de la marca MAC</option>
                    <option value="6">Reporte de todos los equipos de la marca THINKCENTRE</option>
                    <option value="7">Reporte de todos los equipos de la marca LENOVO</option>
                    <option value="8">Reporte de todos los equipos de la marca HP</option>
                </optgroup>
                <optgroup label="-- Reportes de los Laboratorios --">
                    <option value="9">Reporte de todos los equipos disponibles</option>
                </optgroup>

                <optgroup label="-- Otras Opciones --">

                </optgroup>
            </select>
        </div>
        <div class="card-body">
            @switch($report)
                @case(1)
                    <a href="{{ route('report.equipoFull.pdf') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(2)
                    <a href="{{ route('report.equipo.pdf','1') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(3)
                    <a href="{{ route('report.equipo.pdf','2') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(4)
                    <a href="{{ route('report.equipo.pdf','3') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(5)
                    <a href="{{ route('report.equipo.pdf','4') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(6)
                    <a href="{{ route('report.equipo.pdf','5') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(7)
                    <a href="{{ route('report.equipo.pdf','6') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(8)
                    <a href="{{ route('report.equipo.pdf','7') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(9)
                    <a href="{{ route('report.labFull.pdf') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @default
                    <strong>
                        No hay registros
                    </strong>
            @endswitch
        </div>
    </div>
</div>

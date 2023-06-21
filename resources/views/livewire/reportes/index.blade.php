<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="card">
        <div class="card-header">
            <select wire:model="report" class="form-control">
                <option value="" selected>Elije</option>
                <optgroup label="-- Reportes de los Equipos --">
                    <option value="1">Reporte de todos los equipos disponibles</option>
                    <option value="2">Reporte de todos los equipos de la marca DELL</option>
                </optgroup>
                <optgroup label="-- Reportes de los Laboratorios --">
                    <option value="3">Reporte de todos los equipos disponibles</option>
                    <option value="4">Reporte de todos los equipos disponibles</option>
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
                    <table class="content-table table table-striped">
                        <tbody>
                        @foreach ($marcas as $marca)
                            <tr>
                                <td>{{ $marca->descripcion }}</td>
                                <td><a href="{{ route('report.equipo.pdf',$marca->id) }}"
                                       class="btn btn-outline-success">Generar Reporte</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @break;
                @case(3)
                    <a href="{{ route('report.labFull.pdf') }}" class="btn btn-outline-success">Generar Reporte</a>
                    @break;
                @case(4)
                    <table class="content-table table table-striped">
                        <tbody>
                        @foreach ($labs as $lab)
                            <tr>
                                <td>{{ $lab->laboratorio }}</td>
                                <td><a href="{{ route('report.lab.pdf',$lab->id_laboratorio) }}"
                                       class="btn btn-outline-success">Generar Reporte</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @break;
                @default
                    <strong>
                        No hay registros
                    </strong>
            @endswitch
        </div>
    </div>
</div>

<!-- Modal -->
<form action="" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $equipoLab->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    <h5>Informacion del Laboratorio</h5>
                    <p>Id del Laboratorio: {{ $equipoLab->id_laboratorio }}</p>
                    <p>Laboratorio: {{ $equipoLab->laboratorio }}</p>
                    <hr>
                    <h5>Informacion del equipo</h5>
                    <p>Numero de Serie del equipo: {{ $equipoLab->No_Serie }}</p>
                    <p>Descripcion del equipo: {{ $equipoLab->descripcion }}</p>
                    <p>Tipo de Equipo: {{ $equipoLab->tipoEquipo }}</p>
                    <p>Marca del equipo: {{ $equipoLab->marca }}</p>
                    <p>Estado del equipo: {{ $equipoLab->estatus }}</p>
                    @if(is_null($equipoLab->fecha_Desnstalacion))
                        <p>Id del equipo en el laboratorio: {{ $equipoLab->equipoLab_id }}</p>
                        <p>fecha de Instalcion: {{ $equipoLab->fecha_Instalacion }}</p>
                        <p>Responsable: {{ $equipoLab->name }}</p>
                    @else
                        <p>Id del equipo en el laboratorio: N/A</p>
                        <p>fecha de Instalacion: {{ $equipoLab->fecha_Instalacion }}</p>
                        <p>fecha de Desinstalacion: {{ $equipoLab->fecha_Desnstalacion }}</p>
                        <p>Responsable: {{ $equipoLab->name }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Eliminar registro</button>
                </div>
            </div>
        </div>
    </div>
</form>

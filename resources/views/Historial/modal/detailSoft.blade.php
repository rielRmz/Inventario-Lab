<!-- Modal -->
<form action="" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $equipoSoft->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    <h5>Informacion del equipo</h5>
                    <p>Numero de Serie del equipo: {{ $equipoSoft->No_Serie }}</p>
                    <p>Descripcion del equipo: {{ $equipoSoft->descripcion }}</p>
                    <p>Tipo de Equipo: {{ $equipoSoft->tipoEquipo }}</p>
                    <p>Marca del equipo: {{ $equipoSoft->marca }}</p>
                    <p>Estado del equipo: {{ $equipoSoft->estatus }}</p>
                    <hr>
                    <h5>Informacion del Software</h5>
                    <p>Id del Software: {{ $equipoSoft->Software_id }}</p>
                    <p>Descripcion del Software: {{ $equipoSoft->desc }}</p>
                    <p>Tipo del Software: {{ $equipoSoft->tipoSoftware }}</p>
                    @if(is_null($equipoSoft->fecha_Desnstalacion))
                        <p>fecha de Instalcion: {{ $equipoSoft->fecha_Instalacion }}</p>
                        <p>Responsable: {{ $equipoSoft->name }}</p>
                    @else
                        <p>fecha de Instalacion: {{ $equipoSoft->fecha_Instalacion }}</p>
                        <p>fecha de Desinstalacion: {{ $equipoSoft->fecha_Desnstalacion }}</p>
                        <p>Responsable: {{ $equipoSoft->name }}</p>
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

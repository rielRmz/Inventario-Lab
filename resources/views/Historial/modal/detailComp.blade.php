<!-- Modal -->
<form action="" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $equipoComp->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    <h5>Informacion del equipo</h5>
                    <p>Numero de Serie del equipo: {{ $equipoComp->No_Serie }}</p>
                    <p>Descripcion del equipo: {{ $equipoComp->descripcion }}</p>
                    <p>Tipo de Equipo: {{ $equipoComp->tipoEquipo }}</p>
                    <p>Marca del equipo: {{ $equipoComp->marca }}</p>
                    <p>Estado del equipo: {{ $equipoComp->estatus }}</p>
                    <hr>
                    <h5>Informacion del componente</h5>
                    <p>Identificacion del Componente: {{ $equipoComp->Componente_id }}</p>
                    <p>Descripcion del componente: {{ $equipoComp->desc }}</p>
                    <p>Tipo del Componente: {{ $equipoComp->tipoComponente }}</p>
                    <p>Marca del Componente: {{ $equipoComp->brand }}</p>
                    <p>Estado del Componente: {{ $equipoComp->status }}</p>
                    @if(is_null($equipoComp->fecha_Desnstalacion))
                        <p>fecha de Instalcion: {{ $equipoComp->fecha_Instalacion }}</p>
                        <p>Responsable: {{ $equipoComp->name }}</p>
                    @else
                        <p>fecha de Instalacion: {{ $equipoComp->fecha_Instalacion }}</p>
                        <p>fecha de Desinstalacion: {{ $equipoComp->fecha_Desnstalacion }}</p>
                        <p>Responsable: {{ $equipoComp->name }}</p>
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

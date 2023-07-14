<!-- Modal -->
<form action="{{ route('admin.labs.destroy', $lab) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $lab->id_laboratorio }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    Esta apunto de eliminar el Laboratorio <b>{{ $lab->laboratorio }}</b>, por lo tanto, todos los elementos relacionado a dicho laboratorio tambien seran eliminados.
                    <br>¿Esta seguro de eliminar el Laboratorio <b>{{ $lab->laboratorio }}</b>?.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Eliminar registro</button>
                </div>
            </div>
        </div>
    </div>
</form>

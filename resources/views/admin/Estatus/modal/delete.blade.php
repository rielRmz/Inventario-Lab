<!-- Modal -->
<form action="{{ route('admin.status.destroy', $status) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $status->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar registro
                    </h4>
                </div>
                <div class="modal-body">
                    Esta seguro de eliminar el registro seleccionado.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Eliminar registro</button>
                </div>
            </div>
        </div>
    </div>
</form>

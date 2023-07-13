<!-- Modal -->
<form action="{{ route('profile.perfil.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    Esta apunto de eliminar al rol {{ $user->name }}, por lo tanto, todos los combios registrados por el usuario tambien seran eliminadas.
                    <br>¿Esta seguro de eliminar el rol {{ $user->name }}?.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Eliminar registro</button>
                </div>
            </div>
        </div>
    </div>
</form>

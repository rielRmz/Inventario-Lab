<!-- Modal -->
<form action="{{ route('admin.equipo.destroy', $equipo->No_Serie) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{ $equipo->No_Serie }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Eliminar Registro
                    </h4>
                </div>
                <div class="modal-body">
                    <p>
                        Esta apunto de eliminar el Equipo <b>{{ $equipo->No_Serie }}</b>, por lo tanto, todos los elementos relacionado a dicho equipo tambien seran eliminados.
                        <br>¿Esta seguro de eliminar el Equipo <b>{{ $equipo->No_Serie }}</b>?.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Eliminar registro</button>
                </div>
            </div>
        </div>
    </div>
</form>

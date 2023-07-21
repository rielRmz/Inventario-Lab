<!-- Modal -->
<div wire:ignore.self id="DeleteEquipo" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="DeleteEquipoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Eliminar Registro
                </h4>
            </div>
            <div class="modal-body">
                <label>Esta apunto de eliminar el Equipo: <input wire:model="No_Serie" readonly/>, por lo tanto, todos los elementos
                    relacionado a dicho equipo tambien seran eliminados.
                    <br>¿Esta seguro de eliminar el Equipo <input wire:model="No_Serie" readonly/>?.
                </label>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button wire:click.prevent="destroy()" class="btn btn-outline-danger">Eliminar registro</button>
            </div>
        </div>
    </div>
</div>


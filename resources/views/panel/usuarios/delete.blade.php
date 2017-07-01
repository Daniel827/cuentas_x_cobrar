<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar Ususario</h4>
            </div>
            <div class="modal-body">
                {{Form::open(['action'=>['UserController@destroy',""],'method'=>'delete'])}}
                    <h4 id="txtEliminar" class="text-center text-muted">¿Estás seguro?</h4>
                    <h4 class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el registro. ¿Deseas continuar?</h4>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                {{Form::Close()}}
            </div>
        </div>
    </div>
</div>


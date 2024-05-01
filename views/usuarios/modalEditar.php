<!-- Modal -->
<div class="modal fade" id="editarUsuario<?php echo $usuario->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/dashboard/usuarios/editar" method="POST">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $usuario->id?>">
                        <div class="form-group col-sm-12 col-md-12 text-left">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre y Apellido" value="<?php echo $usuario->nombre; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 text-left">
                            <label for="correo">Correo</label>
                            <input name="correo" id="correo" type="text" class="form-control" placeholder="Correo" value="<?php echo $usuario->correo; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-8 text-left">
                            <label for="celular">Celular</label>
                            <input name="celular" id="celular" type="text" class="form-control" placeholder="Celular" value="<?php echo $usuario->celular; ?>" >
                        </div>
                        <div class="form-group col-md-4 text-left">
                            <label for="nivel">Nivel</label>
                            <select name="nivel" class="seleccion" required>
                                <option value="1" <?php echo $usuario->nivel == '1' ? 'selected' : '' ?>>1</option>
                                <option value="2" <?php echo $usuario->nivel == '2' ? 'selected' : '' ?>>2</option>
                                <option value="3" <?php echo $usuario->nivel == '3' ? 'selected' : '' ?>>3</option>
                                <option value="4" <?php echo $usuario->nivel == '4' ? 'selected' : '' ?>>4</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>

        </div>
    </div>
</div>
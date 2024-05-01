<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
            </div>
            <div class="card-body col-md-12">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable text-center" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10px;">N°</th>
                                            <th style="width: 66.2px;">Nombre</th>
                                            <th style="width: 66.2px;">Celular</th>
                                            <th style="width: 66.2px;">N° Ventas</th>
                                            <th style="width: 66.2px;">Nivel</th>
                                            <th style="width: 66.2px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr role="row">
                                            <th style="width: 10px;">N°</th>
                                            <th style="width: 66.2px;">Nombre</th>
                                            <th style="width: 66.2px;">Celular</th>
                                            <th style="width: 66.2px;">N° Ventas</th>
                                            <th style="width: 66.2px;">Nivel</th>
                                            <th style="width: 66.2px;">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        $count = 0;
                                        foreach ($usuarios as $usuario) {
                                            $count += 1; ?>
                                            <tr>
                                                <td> <?php echo $count; ?> </td>
                                                <td> <?php echo $usuario->nombre; ?> </td>
                                                <td class="celular">
                                                    <?php
                                                    if ($usuario->celular) { ?>
                                                        <a href="http://wa.me/+57<?php echo $usuario->celular; ?>" target="_blank">
                                                            <i class="fa-brands fa-whatsapp"></i>
                                                            <?php echo $usuario->celular; ?>
                                                        </a>
                                                    <?php  }
                                                    ?>
                                                </td>
                                                <td> <?php echo $usuario->nro_ventas; ?> </td>
                                                <td> <?php echo $usuario->nivel; ?> </td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#editarUsuario<?php echo $usuario->id; ?>" href="#" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>

                                                    <?php include __DIR__ . '/modalEditar.php'; ?>

                                                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-md-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Registrar Nuevo Usuario</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body">
                    <form action="/dashboard/usuarios" method="POST" class="formulario-registro">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" placeholder="Nombre y Apellido" value="<?php echo $user->nombre ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <input name="correo" type="email" class="form-control" placeholder="Correo Electrónico" value="<?php echo $user->correo ?? '' ?>">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input name="celular" type="number" class="form-control" placeholder="Celular" value="<?php echo $user->celular ?? '' ?>">
                            </div>
                            <div class="form-group col-md-4">

                                <select name="nivel" class="seleccion">
                                    <option value="0" <?php echo $user->nivel == '0' ? 'selected' : '' ?>>Nivel</option>
                                    <option value="1" <?php echo $user->nivel == '1' ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?php echo $user->nivel == '2' ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?php echo $user->nivel == '3' ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?php echo $user->nivel == '4' ? 'selected' : '' ?>>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 registro">
                                <input type="submit" value="Registrar Usuario" class="btn btn-success">
                            </div>
                        </div>
                        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>









<?php
$script = '
          <script src="/build/js/app.js"></script>                  
    ';
?>
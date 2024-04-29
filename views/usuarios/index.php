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
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length"><label>Cantidad<select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> listados</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                            </div>
                        </div>
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
                                                    <a href="#" class="btn btn-info btn-circle btn-sm">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>

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
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_info text-center" id="dataTable_info" role="status" aria-live="polite">
                                    <?php echo $count . ' Registros en Total' ?>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
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
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre y Apellido">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Correo Electrónico">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <input type="number" class="form-control" placeholder="Celular">
                            </div>
                            <div class="form-group col-md-4">
                                <select name="nivel" class="seleccion">
                                    <option value="0"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 registro">
                                <input type="submit" value="Registrar Usuario" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
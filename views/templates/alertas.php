<?php

foreach ($alertas as $key => $alerta) :
    foreach ($alerta as $mensaje) :
?>
        <?php
        if ($key === 'error') { ?>
            <div class="card mb-1 border-left-danger">
                <div class="card-body">
                    <?php echo $mensaje ?>
                </div>
            </div>
        <?php }
        if ($key === 'exito') { ?>
            <div class="card mb-1 border-left-success">
                <div class="card-body">
                    <?php echo $mensaje ?>
                </div>
            </div>
        <?php
        }
        ?>
<?php
    endforeach;
endforeach;
?>
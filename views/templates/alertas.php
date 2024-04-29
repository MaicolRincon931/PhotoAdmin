<?php

foreach ($alertas as $key => $alerta) :
    foreach ($alerta as $mensaje) :
?>
        <div class="card mb-1 border-left-danger">
            <div class="card-body">
                <?php echo $mensaje?>
            </div>
        </div>
<?php
    endforeach;
endforeach;
?>
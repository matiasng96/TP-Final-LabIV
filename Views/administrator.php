<?php
    require_once("nav-select.php");
?>
<div class="container row justify-content-center">

<!-- Carga de datos -->
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?>Movies/Add" method="POST">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Cargar Películas Base de Datos </button>
            </div>
        </form>
    </div>
</div>
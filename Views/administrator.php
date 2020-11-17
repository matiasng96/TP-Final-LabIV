<?php
require_once('nav.php');
?>

<div class="container row justify-content-center">

<!-- Carga de datos -->
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?>Movies/Add" method="POST">
            <div class="col-auto">
            <!-- De la API a la BDD  -->
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Cargar Películas</button>  
            </div>
        </form>
    </div>

    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?>Showing/SaveAllGenres" method="POST">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Crear Función </button>
            </div>
        </form>
    </div>
</div>
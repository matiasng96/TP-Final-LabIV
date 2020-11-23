<?php
    require_once (VIEWS_PATH . "navSelector.php");
?>
<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?>Cinemas/Add" method="POST">
            <div class="col-auto">
                <h1> Agregar Cine </h1>
            </div>

            <div class="col-auto">
                <label for="name"> Nombre </label>
                <input class="form-control" type="text" name="name" required>
            </div>

            <div class="col-auto">
                <label for="capacity"> Capacidad maxima </label>
                <input class="form-control" type="number" name="capacity " required>
            </div>

            <div class="col-auto">
                <label for="address"> Direccion </label>
                <input class="form-control" type="text" name="address" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Confirmar </button>
            </div>
        </form>
    </div>
</div>
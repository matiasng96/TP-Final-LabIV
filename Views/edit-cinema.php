<?php
include_once("nav.php");
?>


<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Edit" method="POST">
    
        <div class="col-auto">
            <h1> Editar Cinema </h1>
        </div>

        <div class="col-auto">
            <input type="hidden" name="oldName" value="<?php $cinemaName ?>">
            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name" placeholder="<?php $cinemaName ?>" required>
        </div>

        <div class="col-auto">
            <label for="capacity"> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity" required>
        </div>

        <div class="col-auto">
            <label for="address"> Direccion </label>
            <input class="form-control" type="text" name="address" required>
        </div>

        <div class="col-auto">
            <label for="ticketPrice"> Precio de entrada </label>
            <input class="form-control" type="number" name="ticketPrice" required>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary"> Confirmar </button>
        </div>
    </form>
</div>
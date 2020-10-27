<?php
include_once("nav.php");
?>


<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Edit" method="POST">
        <div>
            <h1> Editar Cinema </h1>
        </div>

        <div>
            <input type="hidden" name="oldName" value="<?php $cinemaName ?>">
            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name" placeholder="<?php $cinemaName ?>" required>
        </div>

        <div>
            <label for="capacity"> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity" required>
        </div>

        <div>
            <label for="address"> Direccion </label>
            <input class="form-control" type="text" name="address" required>
        </div>

        <div>
            <label for="ticketPrice"> Precio de entrada </label>
            <input class="form-control" type="number" name="ticketPrice" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary"> Confirmar </button>
        </div>
    </form>
</div>
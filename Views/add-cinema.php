<?php
include_once("nav.php");
?>

<div class="row justify-content-center">
<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Add" method="POST">
        <div>
            <h1> Agregar Cine </h1>
        </div>

        <div>
            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name" required>
        </div>

        <div>
            <label for="capacity"> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity " required>
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

</div>


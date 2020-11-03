<?php
require_once("nav.php");
?>

<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Edit" method="POST">
    
        <div class="col-auto">
            <h1> Editar Cinema </h1>
        </div>

        <div class="col-auto">
            <input type="hidden" name="currentName" value="<?php echo $cinemaName ?>">
            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name" value="<?php echo $cinemaName ?>" required>
        </div>

        <div class="col-auto">
            <label for="capacity"> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity" value="<?php echo $cinemaCapacity ?>" required>
        </div>

        <div class="col-auto">
            <label for="address"> Direccion </label>
<<<<<<< HEAD
            <input class="form-control" type="text" name="address" value="<?php echo $cinemaAddress ?>" required>
=======
            <input class="form-control" type="text" name="address" placeholder="<?php echo $cinemaAddress ?>" required>
>>>>>>> 528344fbd9cc25287160ab11ce5542a0a5926250
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary"> Confirmar </button>
        </div>
    </form>
</div>
<?php
    require_once("nav-select.php");
?>
<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Rooms/Edit" method="POST">
    
        <div class="col-auto">
            <h1> Editar Sala </h1>
        </div>

        <div class="col-auto">
            <input type="hidden" name="currentName" value="<?php echo $name ?>">

            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name" value="<?php echo $name ?>" required>
        </div>

        <div class="col-auto">
            <label for="capacity"> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity" value="<?php echo $capacity ?>" required>
        </div>

        <div class="col-auto">
            <label for="address"> Precio de la sala </label>
            <input class="form-control" type="number" name="ticketPrice" value="<?php echo $ticketPrice ?>" required>
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary"> Confirmar </button>
        </div>
    </form>
</div>

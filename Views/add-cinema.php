<?php
include_once("nav.php");
?>


<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Add" method="POST">
        <div>
            <h1> Agregar Cinema </h1>
        </div>

        <div>
            <label for="name"> Nombre </label>
            <input class="form-control" type="text" name="name">
        </div>

        <div>
            <label for=""> Capacidad maxima </label>
            <input class="form-control" type="number" name="capacity">
        </div>

        <div>
            <label for=""> Direccion </label>
            <input class="form-control" type="text" name="address">
        </div>

        <div>
            <label for="ticketPrice"> Precio de entrada </label>
            <input class="form-control" type="number" name="ticketPrice">
        </div>

        <div>
            <button type="submit" class="btn btn-primary"> Agregar Cinema </button>
        </div>
    </form>
</div>

<!-- La idea en esta vista es crear un form que para agregar los cines
    Esta va a ser una tarea del Administrador, los datos se guardan en un JSON y se muestran en la vista cinemas-list.php -->
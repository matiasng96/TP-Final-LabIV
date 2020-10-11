<?php
    include_once("nav.php");
?>

<main>
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Add" method="POST">
        <div>
            <h1> Agregar Cinema </h1>
        </div>

        <div>
            <label for="name"> Nombre </label>
            <input type="text" name="name">
        </div>

        <div>
            <label for=""> Capacidad maxima </label>
            <input type="number" name="capacity">
        </div>

        <div>
            <label for=""> Direccion </label>
            <input type="text" name="address">
        </div>

        <div>
            <label for="ticketPrice"> Precio de entrada </label>
            <input type="number" name="ticketPrice">
        </div>

        <div>
            <button type="submit"> Agregar Cinema </button>
        </div>      
    </form>
</main>

<!-- La idea en esta vista es crear un form que para agregar los cines
    Esta va a ser una tarea del Administrador, los datos se guardan en un JSON y se muestran en la vista cinemas-list.php -->
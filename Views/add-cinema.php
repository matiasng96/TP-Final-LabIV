<?php
<<<<<<< HEAD

    include_once("nav.php");
    

?>

<main>
    <form action="" method="">
=======
include_once("nav.php");
?>


<div class="form-group">
    <form action="<?php echo FRONT_ROOT ?>Cinemas/Add" method="POST">
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95
        <div>
            <h1> Agregar Cinema </h1>
        </div>

        <div>
            <label for="name"> Nombre </label>
<<<<<<< HEAD
            <input type="text" name="name" id="name" >
=======
            <input class="form-control" type="text" name="name">
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95
        </div>

        <div>
            <label for=""> Capacidad maxima </label>
<<<<<<< HEAD
            <input type="number" name="">
=======
            <input class="form-control" type="number" name="capacity">
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95
        </div>

        <div>
            <label for=""> Direccion </label>
<<<<<<< HEAD
            <input type="text" name="address" id="address">
        </div>

        <div>
            <label for="rooms"> Cantidad de Salas </label>
            <input type="number" name="rooms" id="rooms">
        </div>

        <div>
            <button type="submit"> Agregar Cinema </button>
        </div>      
    </form>
</main>
<?php
    include_once ("footer.php");
?>
=======
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
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95

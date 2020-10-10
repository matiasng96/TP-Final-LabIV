<?php

    include_once("nav.php");
    

?>

<main>
    <form action="" method="">
        <div>
            <h1> Agregar Cinema </h1>
        </div>

        <div>
            <label for="name"> Nombre </label>
            <input type="text" name="name" id="name" >
        </div>

        <div>
            <label for=""> Capacidad maxima </label>
            <input type="number" name="">
        </div>

        <div>
            <label for=""> Direccion </label>
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
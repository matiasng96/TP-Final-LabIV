<?php
    require_once("nav.php");
?>

<div>
    <h1> Agregar una sala nueva</h1>

    <form action="<?php echo FRONT_ROOT?>Room/Add" method="POST">
        <div>
            <label>Nombre de la sala</label>
            <input >
        </div>

        <div>
            <label>Precio de la entrada</label>
            <input>
        </div>
        
        <div>
            <label>Capacidad</label>
            <input type="number">
        </div>

        <div>
            <button type="submit"> Agregar </button>
        </div>
    </form>
</div>
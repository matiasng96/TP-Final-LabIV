<?php
    require_once (VIEWS_PATH . "navSelector.php");
?>
<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
       <form action="<?php echo FRONT_ROOT ?>Showtime/Edit" method="POST">

            <div class="col-auto">
                <h1> Editar Funcion </h1>
            </div>
            
            <input type="hidden" name="idShowtime" value="<?php echo $idShowtime?>">
            <input type="hidden" name="idRoom" value="<?php echo $idRoom ?>">
            <input type="hidden" name="idMovie" value="<?php echo $idMovie ?>">
            <div class="col-auto my-1">
                <b><label> Seleccionar Nueva Fecha </label></b>
                <br><input name="date" type="date"></br>
            </div>

            <div class="col-auto my-1">
                <b><label> Seleccionar Nuevo Horario </label></b>
                <br><input name="time" type="time"></br>
                <required>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary"> Confirmar </button>
            </div>
       </form>
    </div>
</div>
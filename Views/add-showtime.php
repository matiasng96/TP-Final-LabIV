<?php
    require_once("nav-select.php");
?>
<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?> Showtime/Add" method="POST" form="formAddShowtime">
            <div class="col-auto">
                <h2><?php //echo $movie->getTitle() ?></h2>
            </div>

            <div class="col-auto my-1">
                <label> Seleccionar Cinema </label>

                <?php
                    foreach($cinemaList as $cinema){
                ?>

                <select name="cinema">
                    <option value="<?php $cinema->getName() ?>"> <?php $cinema->getName() ?> </option>
                </select>

                <?php
                    }
                ?>
            </div>

            <div class="col-auto my-1">
                <label> Seleccionar Sala </label>
                <?php
                    foreach($roomList as $room){
                ?>

                <select name="room">
                    <option value="<?php $room->getName() ?>"> <?php $room->getName() ?> </option>
                </select>

                <?php
                    }
                ?>
            </div>

            <div class="col-auto my-1">
                <label> Seleccionar Fecha </label>
                <input name="date" type="date">
            </div>

            <div class="col-auto my-1">
                <label> Seleccionar Horario </label>
                <input name="time" type="time">
            </div>

            <div class="col-auto my-1">
                <button class="btn btn-primary" type="submit"> Crear funcion</button>
            </div>
        </form>
    </div>
</div>
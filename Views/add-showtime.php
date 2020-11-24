<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?> Showtime/Add" method="POST" form="formAddShowtime">
            <div class="col-auto">
                <h2><?php echo $movie ?></h2>
            </div>

            <div class="col-auto my-1">
                <?php foreach ($roomsList as $room) { ?>
                    
                    <p>Seleccionar Cine</p>
                    
                    <select name="cinemaName">

                        <option value="<?php $room->getCinemaName() ?>"> <?php echo $room->getCinemaName() ?> </option>
                    
                    </select>
            </div>

            <div class="col-auto my-1">

                <p>Seleccionar Sala</p>
               
                <option value="<?php $room->getName() ?>"> <?php echo $room->getName() ?> </option>


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
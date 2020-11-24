<?php
    require_once("nav-select.php");
?>
<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?> Showtime/Add" method="POST" form="formAddShowtime">
            <div class="col-auto">
                <h2><?php echo $movie->getTitle()?></h2>
            </div>                 
                
                <div class="col-auto my-1">
                <b><label for="room">Selecionar Sala</label></b>
                    <select class="form-control" name="room" id="id_room">
                       <?php foreach ($roomsList as $value): ?> 
                           <option value="<?php echo $value->getId();?>">                              
                                <?php 
                                    echo $value->getName()." - Cine: ". $value->getCinemaName();
                                ?>
                            </option>
                        <?php endforeach;  ?>    
                    </select>                    
                </div>

            
            <div class="col-auto my-1">
            <b><label> Seleccionar Fecha </label></b>
            <br><input name="date" type="date"></br>
            </div>
            
            <div class="col-auto my-1">
            <b><label> Seleccionar Horario </label></b>
                <br><input name="time" type="time"></br>
            </div>

            <input type="hidden" name="id_movie" value="<?php echo $movie->getId() ?>">


            <div class="col-auto my-1">
                <button class="btn btn-primary" type="submit"> Crear funcion</button>
            </div>
        </form>
    </div>
</div>
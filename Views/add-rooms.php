<?php
    require_once (VIEWS_PATH . "navSelector.php");
?>
<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">   
        <form action="<?php echo FRONT_ROOT ?> Rooms/Add" method="POST">        
            <div class="col-auto">
                <h2> Agregar una sala nueva</h2>
            </div>

            <div class="col-auto">
                <label for="cinema">Sala para el Cine</label>
                <input class="form-control" type="" name="cinema" id="cinema" value="<?php echo $cinemaName; ?>">
            </div>

            <div class="col-auto">
                <label for="name">Nombre de la sala</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class="col-auto">
                <label for="price">Precio de la entrada</label>
                <input class="form-control" type="number" name="price" min=0 id="price" placeholder=" $ " required>
            </div>
            
            <div class="col-auto">
                <label for="capacity">Capacidad</label>
                <input class="form-control" type="number" name="capacity" min=0 id="capacity" required>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Agregar </button>
            </div>
        </form>
    </div>   
</div>
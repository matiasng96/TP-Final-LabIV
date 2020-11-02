<?php
require_once("nav.php");
?>

<div class="container row justify-content-center">
    <div class="form-group mt-4 border borderForm">
        <form action="<?php echo FRONT_ROOT ?>Genres/SaveAllGenres" method="POST">
            <div class="col-auto">
                <h1> Cargar Géneros en la BD</h1>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Confirmar </button>
            </div>
        </form>
    </div>
</div>
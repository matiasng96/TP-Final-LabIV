
<?php
    require_once("nav.php");
?>


<div class="form-group">       
    <form action="<?php echo FRONT_ROOT ?>User/Edit" method="POST">
    
        <div class="col-auto">
            <h2> Editar mi perfil </h2>
        </div>

        <div class="col-auto">
            <label for="nombre"> Nombre </label>
            <input class="form-control" type="text" name="name" id="nombre" value="<?php echo $name ?>" required>
        </div>

        <div class="col-auto">
            <label for="apellido"> Apellido </label>
            <input class="form-control" type="text" name="lastName" id="apellido" value="<?php echo $lastName ?>" required>
        </div>

        <div class="col-auto">
            <label for="genero"> Genero </label>
            <input class="form-control" type="" name="gender" id="genero" value="<?php echo $gender ?>" required>
        </div>

        <div class="col-auto">
            <label for="dni"> DNI </label>
            <input class="form-control" type="number" name="dni" id="dni" value="<?php echo $dni ?>" required>
        </div>

        <div class="col-auto">
            <label for="email"> Email </label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $email ?>" required>
        </div>

        <div class="col-auto">
            <label for="contraseña"> Contraseña </label>
            <input class="form-control" type="text" name="password" id="contraseña" value="<?php echo $password ?>" required>
        </div>

        <div class="col-auto">
            <button class="btn btn-danger btn-block mt-2" type="submit"> Guaradar Cambios </button>
        </div>
    </form>
</div>
<?php
    require_once("nav-select.php");
?>
<div class="form-group">       
    <form action="<?php echo FRONT_ROOT ?>Users/Edit" method="POST">
    
        <div class="col-auto">
            <h2> Editar mi perfil </h2>
        </div>
            <input type="hidden" name="currentEmail" value="<?php echo $_SESSION['userLogedIn']->getEmail();?>" required>
        
            <div class="col-auto">
            <label for="nombre"> Nombre </label>
            <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['userLogedIn']->getName();?>" required>
        </div>

        <div class="col-auto">
            <label for="apellido"> Apellido </label>
            <input class="form-control" type="text" name="lastName" value="<?php echo $_SESSION['userLogedIn']->getLastName();?>" required>
        </div>


        <div class="col-auto">
            <label for="gender">Género:</label>
            <select name="gender">
                <option name="selected" value="<?php ucfirst($_SESSION['userLogedIn']->getGender());?>" disabled selected hidden ><?php echo ucfirst($_SESSION['userLogedIn']->getGender()); ?></option>
                <option name="male" value="Male">Male</option>
                <option name="female" value="Female">Female</option>
            </select>
        </div>
        
        <div class="col-auto">
            <label for="dni"> DNI </label>
            <input class="form-control" type="number" name="dni" value="<?php echo $_SESSION['userLogedIn']->getDni();?>" required>
        </div>

        <div class="col-auto">
            <label for="email"> Email </label>
            <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['userLogedIn']->getEmail(); ?>" required>
        </div>

        <div class="col-auto">
            <label for="contraseña"> Contraseña </label>
            <input class="form-control" type="text" name="password" value="<?php echo $_SESSION['userLogedIn']->getPassword(); ?>" required>
        </div>

        <div class="col-auto">
            <button class="btn btn-danger btn-block mt-2" type="submit"> Guardar Cambios </button>
        </div>
    </form>
</div>
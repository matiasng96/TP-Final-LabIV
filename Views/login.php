<?php
    require_once("nav-select.php");
?>
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="border borderForm col-10 col-md-8 col-lg-6">

            <form action="<?php echo FRONT_ROOT ?>Users/logIn" method="POST">
                <h2>LOGIN:</h2>
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control username" placeholder="Email" name="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" placeholder="Password..." name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <p>No estás registrado?<a href="<?php echo FRONT_ROOT . "Users/ShowSignUpView" ?>"> Registrarse </a></p>
            </form>
        </div>
    </div>
</div>
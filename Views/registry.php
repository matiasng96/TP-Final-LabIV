<?php
    include_once("header.php");
?>
    <div class="form-group">
        <form action="<?php echo FRONT_ROOT ?>Users/SingUp" method="POST">      

            <div class="form-group">
                <label for="name"> Name </label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="lastname"> Last name </label>
                <input class="form-control" type="text" name="lastname" id="lastname" required>
            </div>

            <div class="form-group">
                <label for="gender"> Gender </label>
                <select id="gender" name="gender" aria-selected="select" required>
                    <optgroup label="Sex" required>
                        <option value="male" required> Male </option>
                        <option value="female" required> Female </option>
                        <option value="other" required> Other </option>
                    </optgroup>
                </select>
            </div>
            
            <div class="form-group">
                <label for="dni"> DNI </label>
                <input class="form-control" type="number" name="dni" id="dni" required>
            </div>
            
            <div class="form-group">
                <label for="user"> Email </label>
                <input class="form-control" type="email" name="user" id="user" required>
            </div>
            
            <div class="form-group">
                <label for="password"> Password </label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>    
            
            <div>
                <button type="submit" class="btn btn-primary"> Sign Up </button>
            </div>            
        </form>
    </div>


<div class="form-group">
    <form action="<?php echo FRONT_ROOT?> " method="POST">
        <div>
            <label for="email"> Email </label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password"> Password </label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <div>
            <button class="btn btn-primary" type="submit"> Log in </button>
        </div>
    </form>

    <div>
        <p> You do not have an account? <a href="<?php echo VIEWS_PATH."registry.php"?>"> Sign up! </a></p>        
    </div>    
</div>
<div class="container" >
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
     <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Home/Index">Movie Pass</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Cinemas/ShowAddView">Agregar Cine</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Cinemas/ShowListView">Listar Cines</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Movies/ShowListView">Listar Pelis</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Users/ShowLogInView"> Iniciar Sesion</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Users/LogOut"> Cerra Sesion</a>
               </li>

               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Users/ShowAdminView"> TEST</a>
               </li>
          </ul>
     </div>
</nav>
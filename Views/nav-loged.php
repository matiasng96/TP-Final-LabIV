<div class="container" >
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
     <a class="navbar-brand" href="<?php echo FRONT_ROOT ?>Home/Index">Movie Pass</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Cinemas/ShowListView">Ver Cines</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Rooms/ShowListView">Listar Salas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Movies/ShowListView">Catalogo de Peliculas</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Users/ShowEditView">Editar Usuario</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href="<?php echo FRONT_ROOT ?>Users/LogOut"> Cerra Sesion</a>
               </li>
          </ul>
     </div>
</nav>
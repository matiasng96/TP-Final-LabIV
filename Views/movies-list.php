<?php
     if(isset($_SESSION['userLogedIn'])){

          $rol = $_SESSION['userLogedIn']->getUserRoleId();

          switch($rol){
               case 1: require_once("nav.php"); break;
               case 2: require_once("nav-logged.php"); break;
          }  
     }      
     else{          
          require_once("nav-notLogged.php");
          echo "<script> alert('Estas navegando sin haber iniciado sesion.'); </script>";
     }          
?>
<div class="container">

     <h2 class="display-4">Listado de películas</h2>
     <table class="table">
          <thead>
               <th>Título</th>
               <th>Géneros</th>
               <th>Idioma</th>
               <th>Duración</th>
               <th>Portada</th>
               <th>
                    <form method="post" action="<?php echo FRONT_ROOT ?>Movies/ShowListByGenre">
                         <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                   <select name="genre" class="custom-select mr-sm-2">
                                        <option selected>Elegir Género</option>
                                        <option value="All">All</option>
                                        <option value="Action">Action</option>
                                        <option value="Adventure">Adventure</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Comedy">Comedy</option>
                                        <option value="Crime">Crime</option>
                                        <option value="Documentary">Documentary</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Family">Family</option>
                                        <option value="Fantasy">Fantasy</option>
                                        <option value="History">History</option>
                                        <option value="Horror">Horror</option>
                                        <option value="Music">Music</option>
                                        <option value="Mystery">Mystery</option>
                                        <option value="Romance">Romance</option>
                                        <option value="Science Fiction">Science Fiction</option>
                                        <option value="Thriller">Thriller</option>
                                        <option value="TV Movie">TV Movie</option>
                                        <option value="War">War</option>
                                        <option value="Western">Western</option>
                                   </select>
                              </div>
                              <div class="col-auto my-1">
                                   <button type="submit" class="btn btn-primary">Filtrar</button>
                              </div>
                         </div>
                    </form>
               </th>
          </thead>
          <tbody>
               <?php
               if (empty($moviesList)) {
               ?>
                    <div class="alert alert-info" role="alert">
                         <?php echo $ResultsNotFound; ?>
                    </div>
                    <?php
               } else {
                    foreach ($moviesList as $movie) {
                    ?>
                         <tr>
                              <td>
                                   <?php echo $movie->getTitle() ?>
                              </td>

                              <td>
                                   <?php foreach ($movie->getGenresArray() as $genre) {
                                        echo $genre->getName() . "<br>";
                                   } ?>
                              </td>

                              <td>
                                   <?php echo strtoupper($movie->getLanguage()) ?>
                              </td>

                              <td>
                                   <?php echo $movie->getRuntime() . " min." ?>
                              </td>

                              <td><img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPoster_path() ?>" width="200" height="200"></td>

                         </tr>
               <?php
                    }
               }
               ?>
               </tr>
          </tbody>
     </table>
</div>
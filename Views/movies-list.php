<?php
require_once('nav.php');
?>
<div class="container">
    
     <h2 class="display-4">Listado de películas</h2>
     <table class="table">
          <thead>
               <th>Título</th>
               <th>Idioma</th>
               <th>Duración</th>
               <th>Portada</th>
          </thead>
          <tbody>
               <?php
               foreach ($moviesList as $movie) {
               ?>
                    <tr>
                         <td>
                              <?php echo $movie->getTitle() ?>
                         </td>

                         <td>
                              <?php echo $movie->getLanguage() ?>
                         </td>
                    
                         <td>
                              <?php echo $movie->getRuntime() ?>
                         </td>

                         <td><img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPoster_path() ?>" width="200" height="200"></td>
                         
                    </tr>
               <?php
               }
               ?>
               </tr>
          </tbody>
     </table>
</div>
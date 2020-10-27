<?php
require_once('nav.php');
?>
<div class="container">
    
     <h2 class="display-4">Listado de películas</h2>
     <table class="table">
          <thead>
               <th>ID</th>
               <th>Titulo</th>
               <th>ID Géneros</th>
               <th>Portada</th>
          </thead>
          <tbody>
               <?php
               foreach ($moviesList as $movie) {
               ?>
                    <tr>
                         <td>
                              <?php echo $movie->getId() ?>
                         </td>

                         <td>
                              <?php echo $movie->getTitle() ?>
                         </td>

                         <td>
                              <?php 
                              foreach($movie->getGenre_ids() as $genre){
                                   echo $genre;
                                   
                              } 
                               ?>
                         </td>

                         <td><img src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPoster_path() ?>" width="200" height="200"></td>
                         
                    </tr>
               <?php
               }
               ?>
               </tr>
          </tbody>
     </table>
</div>
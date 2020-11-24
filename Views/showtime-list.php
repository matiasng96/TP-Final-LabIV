<?php
    require_once (VIEWS_PATH . "navSelector.php");
?>
<div class="container">
    <h2 class="display-4"> Listado de Funciones </h2>
    <table class="table table-bordered">
        <thead>
            <th scope="col"> Fecha </th>
            <th scope="col"> Hora </th>            
            <th scope="col"> Pelicula </th>
            <th scope="col"> Sala </th>
            <th scope="col"> Cine </th>
            <th scope="col"> Tickets </th>
          
        </thead>

        <tbody>
            <?php 
                foreach($result as $showtime){
            ?>
                <tr>
                    <td> <?php echo $showtime->getDate();  ?></td>
                    <td> <?php echo $showtime->getTime();        ?> </td>
                    <?php $movie = $showtime->getMovie(); ?>
                    <td> <?php echo $movie->getTitle();?> </td>
                    <?php $room = $showtime->getRoom(); ?>
                    <td> <?php echo $room->getName(); ?> </td>
                    <td> <?php echo $room->getCinemaName(); ?> </td>
                    <td> <?php echo $showtime->getTickets()?> </td>
                    <!-- <td><img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPoster_path() ?>" width="100" height="150"></td> -->

                    <td>
                        <form action="<?php echo FRONT_ROOT ?>Showtime/ShowEditView" method="POST">
                        <input type="hidden" name="IdShowtime" value="<?php echo $showtime->getId();?>">
                        <input type="hidden" name="IdRoom" value="<?php echo $room->getId();?>">
                        <input type="hidden" name="idMovie" value="<?php echo $movie->getId();?>">
                        <button class="btn btn-primary btn-block mt-2" type="submit">Editar sala</button>
                        </form>

                        <form method="post" action="<?php echo FRONT_ROOT ?>Showtime/Delete">
                        <input type="hidden" name="IdShowtime" value="<?php echo $showtime->getId();?>">
                        <button class="btn btn-danger btn-block mb-2" type="submit" >Eliminar Funcion</button>
                        </form>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
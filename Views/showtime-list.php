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
            <th scope="col"> Cantidad de Tickets </th>
          
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
                    <td><img class="img-fluid" src="https://image.tmdb.org/t/p/w500<?php echo $movie->getPoster_path() ?>" width="100" height="150"></td>

                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
<?php
    require_once("nav-select.php");
?>
<div class="container">
    <h2 class="display-4"> Listado de Salas </h2>
    <table class="table table-bordered">
        <thead>
            <th scope="col"> Cine </th>
            <th scope="col"> Nombre </th>            
            <th scope="col"> Capacidad </th>
            <th scope="col"> Precio de la Sala </th>

            <?php 
                if($rol == 1){
            ?>
                <th scope="col"> Opciones </th>
            <?php 
                }
            ?>
        </thead>

        <tbody>
            <?php 
                foreach($roomList as $room){
            ?>
                <tr>
                    <td> <?php echo $room->getCinemaName();  ?></td>
                    <td> <?php echo $room->getName();        ?> </td>
                    <td> <?php echo $room->getCapacity();    ?> </td>
                    <td> <?php echo $room->getTicketPrice(); ?> </td>
                    <td>
                        <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/Delete">
                            <input type="hidden" name="roomName" value="<?php echo $room->getId() ?>">
                            <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn" >Borrar</button>
                        </form>

                    <?php 
                        if($rol == 1){
                    ?>
                            <td>
                                <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/Delete">
                                    <input type="hidden" name="roomName" value="<?php echo $room->getName() ?>">
                                    <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn" >Borrar</button>
                                </form>

                                <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/ShowEditview">
                                    <input type="hidden" name="roomName" value="<?php echo $room->getName(); ?>">
                                    <input type="hidden" name="roomCapacity" value="<?php echo $room->getCapacity(); ?>">
                                    <input type="hidden" name="roomPrice" value="<?php echo $room->getTicketPrice(); ?>">
                                    <button class="btn btn-primary btn-block" type="submit" name="editBtn" >Editar</button>
                                </form>
                            </td>
                    <?php 
                        }
                    ?>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
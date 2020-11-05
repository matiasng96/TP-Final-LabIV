<?php
require_once('nav.php');
?>
<div class="container">
    <h2 class="display-4">Listado de Cines</h2>
    <table class="table table-bordered ">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Capacidad Total</th>
            <th scope="col">Dirección</th>
            <th scope="col">Salas</th>
            <th scope="col">Opciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($cinemasList as $cinema) {
            ?>
                <tr>
                    <td><?php echo $cinema->getName(); ?></td>
                    <td><?php echo $cinema->getTotalCapacity(); ?></td>
                    <td><?php echo $cinema->getAddress(); ?></td>

                    <td>
                        <?php 
                            if($cinema->getRooms()){ 
                        ?>                                
                               <table class="table table-bordered ">
                                    <thead>
                                        <th scope="col"> Nombre </th>            
                                        <th scope="col"> Capacidad </th>
                                        <th scope="col"> Precio de la Sala </th>
                                    </thead>

                                    <?php
                                        foreach($cinema->getRooms() as $room){
                                    ?>  
                                        <tr>
                                            <td> <?php echo $room->getName();        ?> </td>
                                            <td> <?php echo $room->getCapacity();    ?> </td>
                                            <td> <?php echo $room->getTicketPrice(); ?> </td>

                                            <td>
                                                <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/Delete">
                                                    <input type="hidden" name="roomName" value="<?php echo $room->getName() ?>">
                                                    <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn" >Borrar sala</button>
                                                </form>

                                                <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/ShowEditview">
                                                    <input type="hidden" name="roomName" value="<?php echo $room->getName(); ?>">
                                                    <input type="hidden" name="roomCapacity" value="<?php echo $room->getCapacity(); ?>">
                                                    <input type="hidden" name="roomPrice" value="<?php echo $room->getTicketPrice(); ?>">
                                                    <button class="btn btn-primary btn-block" type="submit" name="editBtn" >Editar sala</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                        <?php }else{echo "Este cine no contiene salas.";}?>
                    </td>

                    <td>
                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/Delete">
                            <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                            <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn"> Borrar cine</button>
                        </form>

                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/ShowEditview">
                            <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                            <input type="hidden" name="cinemaCapacity" value="<?php echo $cinema->getTotalCapacity() ?>">
                            <input type="hidden" name="cinemaAddress" value="<?php echo $cinema->getAddress() ?>">
                            <button class="btn btn-primary btn-block" type="submit" name="editBtn"> Editar cine </button>
                        </form>

                        <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/ShowAddView">
                            <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                            <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn"> Agregar Salas </button>
                        </form>
                    </td>

                </tr>
            <?php
            }
            ?>
            </tr>
        </tbody>
    </table>
</div>
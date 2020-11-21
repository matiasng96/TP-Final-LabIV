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
                                        <th scope="col"> Opciones </th>
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

                                                <form method="post" action="<?php echo FRONT_ROOT ?>Rooms/ShowEditView">
                                                    <!--<input type="hidden" name="Id_cinema" value="<?php// echo $room->getIdCinema(); ?>">
                                                    <input type="hidden" name="cinemaName" value="<?php //echo $room->getCinemaName(); ?>">--->
                                                    <input type="hidden" name="name" value="<?php echo $room->getName(); ?>">
                                                    <input type="hidden" name="capacity" value="<?php echo $room->getCapacity(); ?>">
                                                    <input type="hidden" name="ticketPrice" value="<?php echo $room->getTicketPrice(); ?>">
                                                    <button class="btn btn-primary btn-block" type="submit" name="editBtn" >Editar sala</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                       }
                                    ?>
                                </table>
                        <?php 
                            }
                            else{
                                echo "Este cine no contiene salas.";   
                            }
                        ?>
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

                        
                            <button class="btn btn-danger btn-block mt-2" type="submit" data-toggle="modal" data-target="#addRoom"> Agregar salas </button>
                       
                    </td>

                </tr>
            <?php
                }   
            ?>
            </tr>
        </tbody>
    </table>
</div>

<!-- ADD ROOM MODAL -->
<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Sala</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group mt-4 border borderForm">   
        <form action="<?php echo FRONT_ROOT ?> Rooms/Add" method="POST">        
            <div class="col-auto">
                <h2> Agregar una sala nueva</h2>
            </div>

            <div class="col-auto">
                <label for="name">Nombre de la sala</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>

            <div class="col-auto">
                <label for="price">Precio de la entrada</label>
                <input class="form-control" type="number" name="price" min=0 id="price" placeholder=" $ " required>
            </div>
            
            <div class="col-auto">
                <label for="capacity">Capacidad</label>
                <input class="form-control" type="number" name="capacity" min=0 id="capacity" required>
            </div>

            <div class="col-auto">
               
            </div>
        
    </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"  class="btn btn-primary mt-2 mb-2"> Agregar </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once('nav.php');
?>
<div class="container">
    <h2 class="display-4">Listado de Cines</h2>
    <table class="table table-bordered ">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Dirección</th>
            <th scope="col">Salas</th>
            <th scope="col">Acciones</th>
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

                                foreach($cinema->getRooms() as $room){
                                    
                                    require_once(VIEWS_PATH."rooms-list.php");
                                }                            
                            }
                        ?>
                    </td>

                    <td>
                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/Delete">
                            <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                            <button class="btn btn-danger btn-block mb-2" type="submit" name="deleteBtn"> Borrar </button>
                        </form>

                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/ShowEditview">
                            <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                            <input type="hidden" name="cinemaCapacity" value="<?php echo $cinema->getTotalCapacity() ?>">
                            <input type="hidden" name="cinemaAddress" value="<?php echo $cinema->getAddress() ?>">
                            <button class="btn btn-primary btn-block" type="submit" name="editBtn"> Editar </button>
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
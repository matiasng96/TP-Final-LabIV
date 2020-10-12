<?php
require_once('nav.php');
?>
<div class="container">

    <h2 class="display-4">Listado de Cines</h2>
    <table class="table table-striped table-dark">
        <thead>
            <th>Nombre</th>
            <th>Capacidad</th>
            <th>Dirección</th>
            <th>Precio de Entrada</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($cinemasList as $cinema) {
            ?>
                <tr>
                    <td>
                        <?php echo $cinema->getName() ?>
                    </td>

                    <td>
                        <?php echo $cinema->getCapacity() ?>
                    </td>

                    <td>
                        <?php echo $cinema->getAddress() ?>
                    </td>

                    <td> <?php echo $cinema->getTicketPrice() ?></td>

                    <td>
                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/Delete">
                        <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                        <button type="submit" name="deleteBtn" >Borrar</button>
                        </form>

                        <form method="post" action="<?php echo FRONT_ROOT ?>Cinemas/ShowEditview">
                        <input type="hidden" name="cinemaName" value="<?php echo $cinema->getName() ?>">
                        <button type="submit" name="editBtn" >Editar</button>
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
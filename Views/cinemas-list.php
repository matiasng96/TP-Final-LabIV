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

                </tr>
            <?php
            }
            ?>
            </tr>
        </tbody>
    </table>
</div>















<!-- En esta viste la idea es hacer lo mismo que en movies-list.php pero con los Cines-->
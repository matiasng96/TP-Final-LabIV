<?php
    include_once("header.php");
    include ("nav.php");

    use Config\Autoload as Autoload;
    use DAO\CinemasDAO as CinemasDao;
    use Models\Cinema as Cinema;

    Autoload:: Start();

    $cinemaDAO = new CinemasDao();
    $arrayCinemas = $cinemaDAO->getAll(); 

?>
<main>
    <section>
        <div>
            <h2> Listado de Cinemas </h2>

            <table>
                <thead>
                    <th> Nombre </th>
                    <th> Direccion </th>
                    <th> Capacidad </th>
                    <th> Salas </th>
                    <th> ID </th>
                </thead>

                <tbody>
                    <form action="" method="POST">
                        <?php
                            if(isset($arrayCinemas)){

                                foreach($arrayCinemas as $cinema){
                        ?>
                            <tr>
                                <td> <?php echo $cinema->getName(); ?> </td>
                                <td> <?php echo $cinema->getAddress(); ?> </td>
                                <td> <?php echo $cinema->getCapacity(); ?> </td>
                                <td> <?php echo $cinema->getRooms() ?> </td>
                                <td> <?php echo $cinema->getId(); ?> </td>

                                <td>
                                    <button type="submit" value="<?php echo $cinema->getId() ?>"> Eliminar </button>
                                </td>
                            </tr>
                        <?php
                                }
                            }
                        ?>           
                    </form>
                </tbody>
            </table>
        </div>        
    </section>
</main>
<?php
    include("footer.php");
?>


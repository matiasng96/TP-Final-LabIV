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
                    <form action="<?php echo FRONT_ROOT ?> Rooms/Add" method="POST" form="formAddRoom">
                        <div class="col-auto">
                            <h2> Agregar una sala nueva</h2>
                        </div>

                        <div class="col-auto">
                            <label for="cinema">Sala para el Cine</label>
                            <input class="form-control" type="text" name="cinema" id="cinema" value="<?php echo $cinema->getName() ?>">
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
                <button type="submit" class="btn btn-primary mt-2 mb-2"> Agregar </button>
            </div>
            </form>
        </div>
    </div>
</div>
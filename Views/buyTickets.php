<div>
    <form action="<?php echo FRONT_ROOT?> BuyTickets/checkSessionStart" method="POST">
        <div>
            <label for="cinema"> Elige tu Cine </label>
            <input name="cinema" id="cinema" type=" " required>
        </div>

        <div>
            <label for="cantidad"> Cantidad de Entradas </label>
            <input name="cantidad" id="cantidad" type="number" required>
        </div>

        <div>
            <button type="submit"> Confirmar </button>
        </div>
    </form>
</div>
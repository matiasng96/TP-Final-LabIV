<?php
    namespace DAO;
    use Models\Room;

    interface IRoomsPDO{
            
        function Add(Room $newRoom);
        function Delete();
        function Edit();
    }
?>
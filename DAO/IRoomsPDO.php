<?php
    namespace DAO;
    use Models\Room;

    interface IRoomsPDO{
            
        function Add(Room $newRoom);
        function Delete($room);
        function Edit($currentName, Room $newRoom);
    }
?>
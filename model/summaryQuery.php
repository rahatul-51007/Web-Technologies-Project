<?php
    include_once '../model/connection.php';
    function searchBookingByRoomName($roomName){
        $conn=dbConnection();
        $query="SELECT * FROM booking WHERE room_type LIKE '%$roomName%'";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        else{
            return $result;
        }
    }
?>

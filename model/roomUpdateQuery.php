<?php
    require_once '../model/connection.php';

    function updatePrice($updatePrice){
        $conn=dbConnection();
        $query="UPDATE room SET price='{$updatePrice['price']}' WHERE room_type='{$updatePrice['room_type']}'";
        $result=mysqli_query($conn,$query);
        if($result){
            return true;
        }
        else{
            return false;
        }


    }
?>
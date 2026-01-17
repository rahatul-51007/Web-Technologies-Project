<?php
require_once 'connection.php';

function getRoomList(){
    $conn = dbConnection();
    $sql = "SELECT * FROM room";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function getRoomByType($roomType){
    $conn = dbConnection();
    $sql = "SELECT * FROM room WHERE room_type = '$roomType'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
?>

<?php
require_once 'connection.php';

function getBookingsByUserId($userId){
    $conn = dbConnection();
    $sql = "SELECT * FROM booking WHERE user_id = '$userId' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function getBookingsByStatus($userId, $status){
    $conn = dbConnection();
    $sql = "SELECT * FROM booking WHERE user_id = '$userId' AND status = '$status' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function getBookingById($bookingId){
    $conn = dbConnection();
    $sql = "SELECT * FROM booking WHERE id = '$bookingId'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
?>

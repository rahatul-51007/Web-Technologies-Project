<?php
require_once '../model/connection.php';

function getAllBookings() {
    $conn = dbConnection();
    // Fetch bookings with their current status
    $query = "SELECT * FROM booking ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    return $result;
}

function updateBookingStatus($id, $status) {
    $conn = dbConnection();
    $id = mysqli_real_escape_string($conn, $id);
    $status = mysqli_real_escape_string($conn, $status);
    
    $query = "UPDATE booking SET status = '$status' WHERE id = '$id'";
    return mysqli_query($conn, $query);
}
?>

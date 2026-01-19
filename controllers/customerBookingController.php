<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../model/customerBookingListQuery.php';

if(!isset($_SESSION['id'])){
    header("Location: ../views/log_reg.php");
    exit();
}

$userId = $_SESSION['id'];
$bookings = getBookingsByUserId($userId);

// Return as JSON for AJAX requests
if(isset($_GET['ajax'])){
    $bookingArray = array();
    while($row = mysqli_fetch_assoc($bookings)){
        $bookingArray[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($bookingArray);
    exit();
}
?>

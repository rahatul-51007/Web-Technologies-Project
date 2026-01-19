<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../model/customerRoomListQuery.php';

$rooms = getRoomList();

// Return as JSON for AJAX requests
if(isset($_GET['ajax'])){
    $roomArray = array();
    while($row = mysqli_fetch_assoc($rooms)){
        $roomArray[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($roomArray);
    exit();
}
?>

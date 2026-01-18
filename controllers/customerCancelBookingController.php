<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../model/customerBookingCancelQuery.php';

// Check if user is logged in
if(isset($_POST['cancel_id'])){
    $bookingId = (int)$_POST['cancel_id'];
    $result = cancelBooking($bookingId);
    
    if($result){
        $_SESSION['cancel_success'] = "Booking cancelled successfully!";
    } else {
        $_SESSION['cancel_error'] = "Failed to cancel booking!";
    }
    
    header("Location: ../views/customerBookingView.php");
    exit();
}

// Handle AJAX request for cancel
if(isset($_GET['ajax']) && isset($_GET['cancel_id'])){
    $bookingId = (int)$_GET['cancel_id'];
    $result = cancelBooking($bookingId);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => $result]);
    exit();
}
?>

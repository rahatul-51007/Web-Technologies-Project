<?php
session_start();
require_once '../model/employee_booking_query.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['booking_id']) && isset($_POST['status'])) {
        $id = $_POST['booking_id'];
        $status = $_POST['status'];
        
        if (updateBookingStatus($id, $status)) {
            $_SESSION['success_msg'] = "Booking status updated to $status.";
        } else {
            $_SESSION['error_msg'] = "Failed to update booking status.";
        }
    }
    header("Location: ../views/employee_bookings.php");
    exit();
}
?>

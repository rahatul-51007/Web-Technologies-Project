<?php
session_start();
require_once '../model/customerBookingAddQuery.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Clear any previous messages
    unset($_SESSION['booking_error']);
    unset($_SESSION['booking_success']);
    
    $roomType = $_POST['room_type'];
    $checkInDate = $_POST['check_in_date'];
    $checkOutDate = $_POST['check_out_date'];
    $guest = $_POST['guest'];
    
    if(!empty($roomType) && !empty($checkInDate) && !empty($checkOutDate) && !empty($guest)){
        $result = addBooking($roomType, $checkInDate, $checkOutDate, $guest);
        
        if($result === "no_room"){
            $_SESSION['booking_error'] = "Sorry! No rooms available for selected room type.";
            header("Location: ../views/customerBookingAdd.php");
            exit();
        } elseif($result !== false && $result !== null){
            $_SESSION['booking_success'] = "Booking request submitted successfully! Your Booking ID is: " . $result;
            header("Location: ../views/customer_dashboard.php");
            exit();
        } else {
            $_SESSION['booking_error'] = "Failed to submit booking request! Please try again.";
            header("Location: ../views/customerBookingAdd.php");
            exit();
        }
    } else {
        $_SESSION['booking_error'] = "All fields are required!";
        header("Location: ../views/customerBookingAdd.php");
        exit();
    }
}
?>

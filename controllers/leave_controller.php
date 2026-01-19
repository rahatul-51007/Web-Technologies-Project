<?php
session_start();
require_once '../model/leave_query.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic validation
    if (isset($_POST['leave_type']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
        $type = $_POST['leave_type'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        
        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            if (applyLeave($userId, $type, $startDate, $endDate)) {
                $_SESSION['success_msg'] = "Leave application submitted successfully.";
            } else {
                $_SESSION['error_msg'] = "Failed to submit leave application.";
            }
        } else {
             $_SESSION['error_msg'] = "User ID not found in session.";
        }
    } else {
        $_SESSION['error_msg'] = "All fields are required.";
    }
    
    header("Location: ../views/leave.php");
    exit();
}
?>

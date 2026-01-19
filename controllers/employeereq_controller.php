<?php
session_start();
require_once '../model/employeereq_query.php';

// Security: Ensure only admin access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../views/log_reg.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['req_id']) && isset($_POST['action'])) {
        $id = $_POST['req_id'];
        $action = $_POST['action']; // 'Approved' or 'Rejected'
        
        if (updateLeaveStatus($id, $action)) {
            $_SESSION['success_msg'] = "Request $action successfully.";
        } else {
            $_SESSION['error_msg'] = "Failed to update request.";
        }
    }
    header("Location: ../views/employeereq.php");
    exit();
}
?>

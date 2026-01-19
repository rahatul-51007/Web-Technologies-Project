<?php
require_once '../model/connection.php';

// Fetch all pending leave requests with user details
function getPendingLeaves() {
    $conn = dbConnection();
    // Start of the change to support display of name/id
    // Joining `leave` table with `user` table on emp_id
    // Assuming `leave.emp_id` corresponds to `user.id`
    $query = "SELECT l.*, u.name as employee_name, u.uname as employee_username 
              FROM `leave` l 
              JOIN `user` u ON l.emp_id = u.id 
              WHERE l.status = 'Pending'";
    
    $result = mysqli_query($conn, $query);
    return $result;
}

function updateLeaveStatus($id, $status) {
    $conn = dbConnection();
    // Validate status
    if (!in_array($status, ['Approved', 'Rejected'])) {
        return false;
    }
    
    $query = "UPDATE `leave` SET status = '$status' WHERE id = '$id'";
    return mysqli_query($conn, $query);
}
?>

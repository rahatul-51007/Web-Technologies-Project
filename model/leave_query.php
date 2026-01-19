<?php
require_once '../model/connection.php';

function applyLeave($userId, $type, $startDate, $endDate) {
    $conn = dbConnection();
    // Using actual schema: emp_id, leave_type, start_date, end_date, status
    // userId matches emp_id
    $query = "INSERT INTO `leave` (emp_id, leave_type, start_date, end_date, status) VALUES ('$userId', '$type', '$startDate', '$endDate', 'Pending')";
    
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function getAllLeaves($userId = null) {
    $conn = dbConnection();
    if ($userId) {
        // Employee sees only their own leaves
        $query = "SELECT * FROM `leave` WHERE emp_id = '$userId'";
    } else {
        // Admin sees all (or if no ID passed)
        // Though Admin uses getPendingLeaves mostly, this might be used for history
        $query = "SELECT * FROM `leave`";
    }
    $result = mysqli_query($conn, $query);
    return $result;
}
?>

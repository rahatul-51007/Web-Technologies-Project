<?php
require_once '../model/connection.php';

$conn = dbConnection();
$query = "SELECT * FROM room";
$result = mysqli_query($conn, $query);

$query2= "SELECT COUNT(*) AS total_staff FROM user WHERE role='employee'";
$result2 =mysqli_query($conn, $query2);

$query3= "SELECT COUNT(*) AS total_booked FROM booking WHERE status='approved'";
$result3 =mysqli_query($conn, $query3);


?>

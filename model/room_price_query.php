<?php
require_once '../model/connection.php';

$conn = dbConnection();
$query = "SELECT * FROM room";
$result = mysqli_query($conn, $query);
?>

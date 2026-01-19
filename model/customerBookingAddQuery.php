<?php
require_once 'connection.php';

function addBooking($roomType, $checkInDate, $checkOutDate, $guest){
    $conn = dbConnection();
    
    // Get user_id from session (session already started in controller)
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    
    // Check if room is available
    $checkRoomSql = "SELECT count FROM room WHERE room_type = '$roomType'";
    $roomResult = mysqli_query($conn, $checkRoomSql);
    
    if($roomResult && mysqli_num_rows($roomResult) > 0){
        $roomData = mysqli_fetch_assoc($roomResult);
        $availableCount = $roomData['count'];
        
        // Check if rooms are available
        if($availableCount <= 0){
            mysqli_close($conn);
            return "no_room";
        }
        
        // Insert booking
        $sql = "INSERT INTO booking (room_type, check_in_date, check_out_date, guest, status, user_id) 
                VALUES ('$roomType', '$checkInDate', '$checkOutDate', '$guest', 'pending', '$userId')";
        
        $result = mysqli_query($conn, $sql);
        
        if($result){
            // Get booking ID immediately after insert
            $bookingId = mysqli_insert_id($conn);
            
            // Decrease room count by 1
            $updateRoomSql = "UPDATE room SET count = count - 1 WHERE room_type = '$roomType'";
            mysqli_query($conn, $updateRoomSql);
            
            mysqli_close($conn);
            return $bookingId;
        } else {
            mysqli_close($conn);
            return false;
        }
    } else {
        mysqli_close($conn);
        return false;
    }
}
?>

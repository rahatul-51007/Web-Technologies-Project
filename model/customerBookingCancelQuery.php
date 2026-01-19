<?php
require_once 'connection.php';

function cancelBooking($bookingId){
    $conn = dbConnection();
    
    // Get booking details before deleting to update room count
    $getBookingSql = "SELECT room_type FROM booking WHERE id = '$bookingId'";
    $bookingResult = mysqli_query($conn, $getBookingSql);
    
    if($bookingResult && mysqli_num_rows($bookingResult) > 0){
        $bookingData = mysqli_fetch_assoc($bookingResult);
        $roomType = $bookingData['room_type'];
        
        // Delete booking
        $sql = "DELETE FROM booking WHERE id = '$bookingId'";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            // Increase room count back by 1
            $updateRoomSql = "UPDATE room SET count = count + 1 WHERE room_type = '$roomType'";
            mysqli_query($conn, $updateRoomSql);
            
            mysqli_close($conn);
            return true;
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

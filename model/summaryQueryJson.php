<?php
    include_once '../model/connection.php';
        $conn=dbConnection();
        $roomName = isset($_GET['roomName']) ? $_GET['roomName'] : '';
        
        if($roomName === '' || trim($roomName) === ''){
            $data = array();
        } else {
            $query="SELECT * FROM booking WHERE room_type LIKE '%$roomName%'";
            $result=mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = array('room_type' => $row['room_type'], 'check_in_date' => $row['check_in_date'], 'check_out_date' => $row['check_out_date'], 'guest' => $row['guest'], 'status' => $row['status']);
            }
        }
        echo json_encode($data);        
?>

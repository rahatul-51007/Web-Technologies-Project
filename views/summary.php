<?php
include_once '../controllers/pageSecurity.php';
include_once 'nav.php';
include_once '../model/summaryQuery.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/report_style.css">
</head>
<body>  
    <div class="nav-dashboard">
        <!-- div nav -->
         <div class="nav">
            <ul class="nav-list">
                <li class="nav-item" ><a href="admin_dashboard.php">Home</a></li>
                <li class="nav-item" ><a href="roomupdate.php">Room Update</a></li>
                <li class="nav-item" ><a href="employeeadd.php">Add/Remove Employee</a></li>
                <li class="nav-item" ><a href="employeereq.php">Request</a></li>
                <li class="nav-item" ><a href="summary.php">Summary</a></li>
            </ul>
         </div>
        <!-- div dashboard -->
         <div class="dashboard">
            <div id="summary">
                <div class="search-container">
                    <form action="" id="search-by-room-name" method="POST">
                        <input type="text" class="search" placeholder="Enter room name" name="room_name" value="<?php echo isset($_SESSION['search_room_name']) ? $_SESSION['search_room_name'] : ""; ?>">
                        <input type="submit" class="search-rname" name="search_room" value="Search" >
                    </form>
                </div>

                <div class="outer-wrapper">
                    <div class="table-wrapper">
                        <table class="summary-table">
                            <thead>
                                <tr>
                                    <th>Room Type</th>
                                    <th>Check-In</th>
                                    <th>Check-Out</th>
                                    <th>Guest</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if(isset($_POST['search_room'])){
                                    $roomName=$_POST['room_name'];
                                    $result=searchBookingByRoomName($roomName);
                                
                                    if(mysqli_num_rows($result) > 0){
                                        while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['room_type']; ?></td>
                                            <td><?php echo $row['check_in_date']; ?></td>
                                            <td><?php echo $row['check_out_date']; ?></td>
                                            <td><?php echo $row['guest']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align: center;">No bookings found</td>
                                        </tr>
                                        <?php
                                    }                                 
                                 }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
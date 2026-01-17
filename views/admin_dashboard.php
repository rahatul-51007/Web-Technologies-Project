<?php
include_once '../controllers/pageSecurity.php';
require_once '../model/room_price_query.php';
include_once 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/admin_style.css">
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
            <div id="home" >
                <div class="count">
                   <div class="count-card">
                        <?php $row = mysqli_fetch_assoc($result3); ?>
                        <p class="count-title">Total Booked Room</p>
                        <h1><?php echo $row['total_booked']; ?></h1>
                    </div>
                    <div class="count-card"> 
                        <?php $row = mysqli_fetch_assoc($result2); ?>
                        <p class="count-title">Total Staff</p>
                        <h1><?php echo $row['total_staff']; ?></h1>
                    </div>

                </div>
                <div class="room-count">                   
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="room-card">
                                <p class="count-title"><?php echo $row['room_type']; ?></p>
                                <h1><?php echo $row['count']; ?></h1>
                            </div>
                    <?php } ?>
                </div>
            </div>
         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
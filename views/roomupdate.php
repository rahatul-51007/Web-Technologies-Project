<?php
include_once '../controllers/pageSecurity.php';
include_once 'nav.php';
include_once '../model/roomListQuery.php';
// include_once '../controllers/roomController.php';
    
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
            <div id="update" >
                <div class="form-room" >
                    <form action="" id="room-option" >
                        
                        <table>
                            <tr>
                                <td>Room Type</td>
                                <td><input type="text" value="<?php echo isset($_SESSION['room_type']) ? $_SESSION['room_type'] : ""; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td><input type="text"  value="<?php echo isset($_SESSION['count']) ? $_SESSION['count'] : ""; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text"  value="<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : ""; ?>"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Save" class="save">
                    </form>
                    <?php
                        unset($_SESSION['edit_id']);
                        unset($_SESSION['room_type']);
                        unset($_SESSION['count']);
                        unset($_SESSION['price']);
                    ?>
                </div>
            </div>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table class="roomtable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Room Type</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php
                        $result=roomTable();
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['count']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><a href="../controllers/roomController.php?edit_id=<?php echo $row['id']; ?>">Edit</a></td>
                        </tr>
                        <?php    
                        }
                        ?>
                     </tbody>
                    </table>
                </div>
            </div>
         </div>
         //
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
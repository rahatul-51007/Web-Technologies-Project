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
                        <p class="count-title">Total Booked Room</p>
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
            <!-- <div id="update" >
                <div class="form-room" >
                    <form action="" id="room-option" >
                        <table>
                            <tr>
                                <td>Room Type</td>
                                <td>
                                    <select id="">
                                        <option value="">--Select--</option>
                                        <option value="Delux">Delux</option>
                                        <option value="Super Delux King">Super Delux King</option>
                                        <option value="Super Delux Twin">Super Delux Twin</option>
                                        <option value="Junior Suit">Junior Suit</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td><input type="text"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Save" class="save">
                    </form>
                </div>
            </div> -->
            <!-- <div id="add-remove">
                <div class="form-add">
                    <form action="../controllers/addEmployeeController.php" id="add-option" method="post" >
                        <table>
                            <tr>
                                <td>Full name</td>
                                <td><input type="text"></td>                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text"></td>                                </td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td><input type="tel"></td>                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text"></td>
                            </tr>
                        </table>
                        <input type="submit" value="Add" class="add">
                    </form>
                </div>     
            </div> -->
            <!-- <div id="staff">
            </div> -->
            <!-- <div id="summary">
                <div class="search-container">
                    <form action="" id="search-by-room-name">
                        <input type="text">
                        <input type="submit" class="search-rname" value="Search" >
                    </form>
                    <form action="" id="search-by-date">
                        <table>
                            <tr>
                                <td>Start Date</td>
                                <td><input type="date" name="" id=""></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td><input type="Date"></td>
                                <td><input type="submit" class="search-date" value="Search"></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div> -->
         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
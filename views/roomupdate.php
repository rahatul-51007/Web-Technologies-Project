<?php
include_once '../controllers/pageSecurity.php';
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
            <div id="update" >
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
            </div>
         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
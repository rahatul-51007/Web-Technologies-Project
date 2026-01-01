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
            <div id="summary">
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

            </div>
         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
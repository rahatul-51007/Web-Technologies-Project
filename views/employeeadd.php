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
            <div id="add-remove">
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
                                <td>Email</td>
                                <td><input type="email"></td>                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text"></td>
                            </tr>
                            <!-- <tr>
                                <td>ID</td>
                                <td><input type="text"></td>
                            </tr> -->
                        </table>
                        <input type="submit" value="Add" class="add">
                    </form>
                </div>     
            </div>

         </div>
    </div>
    <script src="./js/script_admin.js"></script>
</body>
</html>
<?php
include_once '../controllers/pageSecurity.php';
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
    <!-- div title -->
    <div>
        <div class="admin-title">
            <p></p>
            <p>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Anonymous User'; ?></p>
            <a href="../controllers/logout.php" class="logout">Logout</a>
        </div>
    </div>
    <div class="nav-dashboard">
        <!-- div nav -->
         <div class="nav">
            <ul class="nav-list">
                <li class="nav-item" onclick="showHome()">Home</li>
                <li class="nav-item" onclick="showRoomUpdate()">Room Update</li>
                <li class="nav-item" onclick="showAdd()">Add/Remove Employee</li>
                <li class="nav-item" onclick="showRequest()">Request</li>
                <li class="nav-item" onclick="showSummary()">Summary</li>
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
                        <p class="count-title">Total Staff</p>
                    </div>
                </div>
                <div class="room-count">
                    <div class="room-card">
                        <p class="count-title">Delux</p>
                    </div>
                    <div class="room-card">
                        <p class="count-title">Super Delux King</p>
                    </div>
                    <div class="room-card">
                        <p class="count-title">Super Delux Twin</p>
                    </div>
                    <div class="room-card">
                        <p class="count-title">Junior Suit</p>
                    </div>
                </div>
            </div>
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
            <div id="add-remove">
                <div class="form-add">
                    <form action="" id="add-option" >
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
                            <!-- <tr>
                                <td>ID</td>
                                <td><input type="text"></td>
                            </tr> -->
                        </table>
                        <input type="submit" value="Add" class="add">
                    </form>
                </div>     
            </div>
            <div id="staff">
            </div>
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
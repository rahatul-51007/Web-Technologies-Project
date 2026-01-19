<?php
include_once '../controllers/pageSecurity.php';
include_once '../controllers/customerRoomController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    <link rel="stylesheet" href="./css/customer_style.css">
</head>
<body>  
    <div class="customer-title">
        <p></p>
        <p>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Customer'; ?></p>
        <a href="../controllers/logout.php"><button class="logout">Logout</button></a>
    </div>

    <div class="nav-dashboard">
        <div class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="customer_dashboard.php">Dashboard</a></li>
                <li class="nav-item active"><a href="customerBookingAdd.php">Apply for Booking</a></li>
                <li class="nav-item"><a href="customerBookingView.php">View Booking</a></li>
            </ul>
        </div>

        <div class="dashboard">
            <div id="booking-form">
                <h1>Apply for Room Booking</h1>

                <?php
                if(isset($_SESSION['booking_error'])){
                    echo "<p class='error-msg'>" . $_SESSION['booking_error'] . "</p>";
                    unset($_SESSION['booking_error']);
                }
                ?>

                <div class="form-apply">
                    <form action="../controllers/customerAddBookingController.php" method="POST">
                        <table>
                            <tr>
                                <td>Room Type</td>
                                <td>
                                    <select name="room_type" id="room_type" required>
                                        <option value="">--Select--</option>
                                        <?php
                                        if($rooms && mysqli_num_rows($rooms) > 0){
                                            while($room = mysqli_fetch_assoc($rooms)){
                                                echo "<option value='" . $room['room_type'] . "'>" . $room['room_type'] . " (Available: " . $room['count'] . ", Price: " . $room['price'] . ")</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Check-In Date</td>
                                <td><input type="date" name="check_in_date" id="check_in_date" required></td>
                            </tr>
                            <tr>
                                <td>Check-Out Date</td>
                                <td><input type="date" name="check_out_date" id="check_out_date" required></td>
                            </tr>
                            <tr>
                                <td>Number of Guests</td>
                                <td><input type="number" name="guest" id="guest" min="1" required></td>
                            </tr>
                        </table>
                        <input type="submit" value="Submit Booking" class="submit-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/customer_script.js"></script>
</body>
</html>

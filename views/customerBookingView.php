<?php
include_once '../controllers/pageSecurity.php';
include_once '../controllers/customerBookingController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
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
                <li class="nav-item"><a href="customerBookingAdd.php">Apply for Booking</a></li>
                <li class="nav-item active"><a href="customerBookingView.php">View Booking</a></li>
            </ul>
        </div>

        <div class="dashboard">
            <div id="view-bookings">
                <h1>My Bookings</h1>

                <?php
                if(isset($_SESSION['cancel_success'])){
                    echo "<p class='success-msg'>" . $_SESSION['cancel_success'] . "</p>";
                    unset($_SESSION['cancel_success']);
                }
                if(isset($_SESSION['cancel_error'])){
                    echo "<p class='error-msg'>" . $_SESSION['cancel_error'] . "</p>";
                    unset($_SESSION['cancel_error']);
                }
                ?>

                <div class="form-view">
                    <!-- Pending Bookings Table -->
                    <div class="booking-table">
                        <h4>Pending Bookings</h4>
                        <table id="pending-table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Room Type</th>
                                    <th>Check-In Date</th>
                                    <th>Check-Out Date</th>
                                    <th>Guests</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once '../model/customerBookingListQuery.php';
                                $userId = $_SESSION['id'];
                                $pendingBookings = getBookingsByStatus($userId, 'pending');
                                
                                if($pendingBookings && mysqli_num_rows($pendingBookings) > 0){
                                    while($booking = mysqli_fetch_assoc($pendingBookings)){
                                        echo "<tr>";
                                        echo "<td>" . $booking['id'] . "</td>";
                                        echo "<td>" . $booking['room_type'] . "</td>";
                                        echo "<td>" . $booking['check_in_date'] . "</td>";
                                        echo "<td>" . $booking['check_out_date'] . "</td>";
                                        echo "<td>" . $booking['guest'] . "</td>";
                                        echo "<td><span class='status-pending'>" . ucfirst($booking['status']) . "</span></td>";
                                        echo "<td>
                                                <form method='POST' action='../controllers/customerCancelBookingController.php' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to cancel this booking?\");'>
                                                    <input type='hidden' name='cancel_id' value='" . $booking['id'] . "'>
                                                    <button type='submit' class='cancel-btn'>Cancel</button>
                                                </form>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='no-data'>No pending bookings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Approved Bookings Table -->
                    <div class="booking-table">
                        <h4>Approved Bookings</h4>
                        <table id="approved-table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Room Type</th>
                                    <th>Check-In Date</th>
                                    <th>Check-Out Date</th>
                                    <th>Guests</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $approvedBookings = getBookingsByStatus($userId, 'approved');
                                
                                if($approvedBookings && mysqli_num_rows($approvedBookings) > 0){
                                    while($booking = mysqli_fetch_assoc($approvedBookings)){
                                        echo "<tr>";
                                        echo "<td>" . $booking['id'] . "</td>";
                                        echo "<td>" . $booking['room_type'] . "</td>";
                                        echo "<td>" . $booking['check_in_date'] . "</td>";
                                        echo "<td>" . $booking['check_out_date'] . "</td>";
                                        echo "<td>" . $booking['guest'] . "</td>";
                                        echo "<td><span class='status-approved'>" . ucfirst($booking['status']) . "</span></td>";
                                        echo "<td>
                                                <form method='POST' action='../controllers/customerCancelBookingController.php' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to cancel this booking?\");'>
                                                    <input type='hidden' name='cancel_id' value='" . $booking['id'] . "'>
                                                    <button type='submit' class='cancel-btn'>Cancel</button>
                                                </form>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='no-data'>No approved bookings found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/customer_script.js"></script>
</body>
</html>

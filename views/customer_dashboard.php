<?php
include_once '../controllers/pageSecurity.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
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
                <li class="nav-item active"><a href="customer_dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a href="customerBookingAdd.php">Apply for Booking</a></li>
                <li class="nav-item"><a href="customerBookingView.php">View Booking</a></li>
            </ul>
        </div>

        <div class="dashboard">
            <div id="home">
                <h1>Customer Dashboard</h1>

                <?php
                if(isset($_SESSION['booking_success'])){
                    echo "<p class='success-msg'>" . $_SESSION['booking_success'] . "</p>";
                    unset($_SESSION['booking_success']);
                }
                ?>

                <div class="dashboard-content">
                    <div class="welcome-section">
                        <h2>Welcome to Hotel Management System</h2>
                        <p>Manage your room bookings easily from here.</p>
                    </div>

                    <div class="count-section">
                        <?php
                        require_once '../model/customerBookingListQuery.php';
                        $userId = $_SESSION['user_id'];
                        
                        // Count total bookings
                        $allBookings = getBookingsByUserId($userId);
                        $totalBookings = mysqli_num_rows($allBookings);
                        
                        // Count pending bookings
                        $pendingBookings = getBookingsByStatus($userId, 'pending');
                        $totalPending = mysqli_num_rows($pendingBookings);
                        
                        // Count approved bookings
                        $approvedBookings = getBookingsByStatus($userId, 'approved');
                        $totalApproved = mysqli_num_rows($approvedBookings);
                        ?>

                        <div class="count-card">
                            <h3><?php echo $totalBookings; ?></h3>
                            <p>Total Bookings</p>
                        </div>

                        <div class="count-card">
                            <h3><?php echo $totalPending; ?></h3>
                            <p>Pending Bookings</p>
                        </div>

                        <div class="count-card">
                            <h3><?php echo $totalApproved; ?></h3>
                            <p>Approved Bookings</p>
                        </div>
                    </div>

                    <div class="quick-links">
                        <h3>Quick Links</h3>
                        <div class="link-buttons">
                            <a href="customerBookingAdd.php"><button class="quick-btn">Apply for New Booking</button></a>
                            <a href="customerBookingView.php"><button class="quick-btn">View My Bookings</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/customer_script.js"></script>
</body>
</html>

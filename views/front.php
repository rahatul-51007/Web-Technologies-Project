<?php
require_once '../model/room_price_query.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/front-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <!-- nav bar section -->
    <nav class="nav-bar">
            <div >
                <!-- <img class="nav-bar-logo" src="./images/hotel-logo.jpg" alt=""> -->
                <h4>Hotel Logo</h4>
            </div>
            <div>
                <ul class="nav-list">
                    <li class="nav-item"><a href="#home">Home</a></li>
                    <li class="nav-item"><a href="#room">Room</a></li>
                    <li class="nav-item"><a href="#about">About Us</a></li>
                    <li class="nav-item"><a href="#contact">Contact</a></li>
                    <li class="nav-item"><a href="log_reg.php">Login/Register</a></li>
                </ul>
            </div>       
    </nav>
    <!-- banner section -->
     <div class="banner-container" id="home">
        <div class="banner-info">
            <h1>Great Choice Of <span class="hotel">Hotel</span></h1>
            <div class="banner-buttons">
                <button class="banner-button"><a href="log_reg.php">Book Now</a></button>
                <button class="banner-button"><a href="#contact">Contact Us</a></button>
            </div>
        </div>
     </div>
    <!-- room section -->
    <div id="room">
        <div class="room-head">
            <h1 >Luxury Rooms & Suites</h1>
        </div>
        
            <!--  <div class="room-section"> -->
                <div class="room-section">
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    
                        <div class="room">
                            <img class="room-image" src="./images/<?php echo $row['room_type']; ?>.jpg" alt="">
                        
                            <p class="room-name"><?php echo $row['room_type']; ?></p>

                            <div class="room-info">
                                <p>$<?php echo $row['price']; ?></p>
                                <button><a href="log_reg.php">Book Now</a></button>
                            </div>
                        </div>

                    <?php } ?>
                </div>
    </div>
            
    <!-- about us -->
        <div class="about-section" id="about">
            <div class="about">
                <h1>About Us</h1>
                <h2>
                    Welcome to <strong>Grand Choice Hotel</strong>, where comfort meets elegance.
                    We are dedicated to providing our guests with a relaxing and memorable stay.
                    Located in a prime area, our hotel offers modern rooms, exceptional service,
                    and a peaceful atmosphere for both business and leisure travelers.
                </h2>
            </div>
        </div>
      <!--footer  -->
      <footer>
        <div class="footer-section" id="contact">
            <div >
                <p>Hotel Logo</p>
                <h3>Follow Us</h3>
                <ul class="footer-icon">
                        <li><i class="fa-brands fa-facebook icon"></i></li>
                        <li><i class="fa-brands fa-youtube icon"></i></li>
                        <li><i class="fa-brands fa-square-instagram icon"></i></li>
                </ul>
            </div>
            <div>
                <h2>Cox's Bazaar Office</h2>
                <p>Marine Drive Road, Kolatali, Cox's Bazaar.<br> Bangladesh.</p>
                <p>Tel: +88 01401 777 888  or  +88 01755 691 917</p>
                <p>Email: reservation@gmail.com</p>
            </div>
            <div>
                <h2>Dhaka Office</h2>
                <p> Chandrashila Suvastu Tower, 8A <br>
                    Chandroshila panthopath, 69/1 Panthapath, <br>
                    Dhaka 1215.
                </p>
            </div>
        </div>
        <hr class="divider">
        <p class="credit">© 2025. All rights reserved.</p>

      </footer>
</body>
</html>
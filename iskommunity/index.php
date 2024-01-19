<?php 
include('path.php');
include(ROOT_PATH . "/app/database/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Iskommunity</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/homepage.css'?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"/>
</head>
<body>
    <!-- NavBar-->
    <section class="hero">
        <div class="main-width">
            <header>
                <div class="logo">
                    <a href="index.php" class="logo"><img src="assets/images/Iskommunity_LogoName_2.png"></a>
                </div>
                
                <nav>
                    <ul>
                        <li class="active"><a href="">Home</a></li>
                        <li><a href="#">Organizations</a></li>
                        <li><a href="#">Support</a></li>
                        <?php if(isset($_SESSION['id']) && $_SESSION['type'] == 'admin'):?>
                            <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>"><?php echo $_SESSION['username'];?></a></li>
                            <li><a href="logout.php">Log-out</a></li>
                        <?php elseif(isset($_SESSION['id']) && $_SESSION['type'] !== 'admin'):?>
                            <li><a href="<?php echo BASE_URL . '/index.php?id='.$_SESSION['id']?>"><?php echo $_SESSION['username'];?></a></li>
                            <li><a href="logout.php">Log-out</a></li>
                        <?php else:?>
                            <li class="login-btn"><a href="login.php">Log-in</a></li>
                            <li class="signup-btn"><a href="signup.php">Sign up</a></li>
                        <?php endif;?>
                    </ul>
                </nav>
            </header>
        
        <!-- Welcome message -->
        <?php include(ROOT_PATH . '/app/helpers/message.php')?>
        <!-- Welcome message -->

        <!-- Hero Content -->
        <div class="content">
            <div class="main-text">
                <h1>Join the <span>PUP Iskommunity</span></h1>
                <h6>Connect with your fellow students and organizations.</h6>
            </div>
        </div>

        <div class="welcome-picture">
            <img src="assets/images/Org_Life.png" alt="">
        </div>
    </section>
   

    <!-- Find your Org -->
    <section class="fyg">
        <div class="main-width-2">
            <div class="fyg-text">
                <h2>Find your <span>Org</span></h2>
                <p>Find the organization that suits you best.</p>
                <a href=" " class="finder">Find Your Perfect Org</a>
            </div>
            
        <div class="logos">
            <div class="logos-slide">
                <img src="assets/images/Sample/Sample (1).png" alt="">
                <img src="assets/images/Sample/Sample (2).png" alt="">
                <img src="assets/images/Sample/Sample (3).png" alt="">
                <img src="assets/images/Sample/Sample (4).png" alt="">
                <img src="assets/images/Sample/Sample (5).png" alt="">
                <img src="assets/images/Sample/Sample (1).png" alt="">
                <img src="assets/images/Sample/Sample (2).png" alt="">
                <img src="assets/images/Sample/Sample (3).png" alt="">
            </div>
            <div class="logos-slide">
                <img src="assets/images/Sample/Sample (1).png" alt="">
                <img src="assets/images/Sample/Sample (2).png" alt="">
                <img src="assets/images/Sample/Sample (3).png" alt="">
                <img src="assets/images/Sample/Sample (4).png" alt="">
                <img src="assets/images/Sample/Sample (5).png" alt="">
                <img src="assets/images/Sample/Sample (1).png" alt="">
                <img src="assets/images/Sample/Sample (2).png" alt="">
                <img src="assets/images/Sample/Sample (3).png" alt="">
            </div>
        </div>
    </section>

    <!-- Section 3 -->
    <section class="section-3">
        <div class="main-width-3">
            <div class="section-3-text">
                <h2>Connect with <span>Students</span></h2>
                <p>Connect with your fellow students and organizations.</p>
            </div>
            
            <div class="container">
                <div class="card">
                    <div class="imgBx" data-text="Search">
                        <img src="assets/images/search.png" >
                    </div>

                    <div class="content">
                        <div>
                            <h3>Search your Org</h3>
                            <p>Lorem Ipsum sit amet, lorem ipsum sit amet. </p>
                            <a href=" ">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="imgBx" data-text="Represent">
                        <img src="assets/images/represent.png" >
                    </div>

                    <div class="content">
                        <div>
                            <h3>Represent your Org</h3>
                            <p>Lorem Ipsum sit amet, lorem ipsum sit amet. </p>
                            <a href=" ">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4 -->
    <section class="events">
        
    </section>

    <!-- Footer -->
    <hr>
    
    <footer>
        <div class="row">
            <div class="col">
                <img src="assets/images/Iskommunity_LogoName.png" class="logo">
                <p>in partial fulfillment for the course COMP 20163 - Web Development and COMP 20213 - Database Administration</p>
                <p>Group 7 | BSIT 3-3 | A.Y. 2023-2024</p>   
            </div>

            <div class="col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Organizations</a></li>
                    <li><a href="#">Support</a></li>
                    
                </ul>
            </div>

            <div class="col">
                
                <h3>Subscribe to our Newsletter</h3>
                <form action="">
                    <i class="ri-mail-fill"></i>
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit"><i class="ri-arrow-right-line"></i></button>
                </form>

                <div class="social-icons">    
                    <i class="ri-facebook-box-line"></i>
                    <i class="ri-twitter-x-line"></i>
                    <i class="ri-instagram-line"></i>
                </div>

        </div>

        <hr>
         
        <p class="copyright"> © 2024 PUP Iskommunity. All rights reserved.</p>
       
    </footer>
</body>
</html>

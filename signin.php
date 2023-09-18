<?php
	session_start();
	include 'config.php';
	$msg=$errors="";
	
        
        if(ISSET($_POST['login'])){
		$email = $_POST['mail'];
		$password = $_POST['password'];
                    $check=mysqli_query($conn,"select * from register  where Email_Id='$email'and Password ='$password'");
                    if(mysqli_num_rows($check)==1)
                    {
                          header("Location:main.php"); 
                    }
                    else  
                    {
                          $errors.="<h1>Details not matched</h1>";
                    }
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    
    <link rel="stylesheet" href="css/style_signin.css">
    
   
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
     <!--review link-->
   <link
   rel="stylesheet"
   href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
   />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
     
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> <span>H</span>UNTING <span>A</span>RTIST</a>

     <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="home.php">Home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="about.php">About</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="service.php">Services</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="contact.php">Contact</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="blog.php">Blog</a>
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="review.php">Review</a>
     
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="signin.php" class="btn" >Login</a>

</header>

<!-- header section ends -->

<br><br><br><br><br><br><br><br>
   <form action="signin.php" method="post"> 
    <div class="container">
        <div class="formWraper">
 
            <!-- Left section of responsive registration form -->
 
            <div class="formDiv">
                <h2>Login Form</h2>
                <br>
                 
                <p class="text"> Sign in with Social Media</p>
                <?php echo "<font color='red'>" . $errors;?>
             <!-- Font Awesome Icons -->
                <div class="socialBtn">
                    <div class="facebook icon"><i class="fab fa-facebook-f"></i></div>
                    <div class="twitter icon"><i class="fab fa-twitter"></i></div>
                    <div class="instagram icon"><i class="fab fa-instagram"></i></div>
                </div>
                 
                <!--Horizontal Line-->
                <hr>
                <div class="orDiv">Or</div>
 
                <p class="text">Sign in with Email Address</p>
                <br>
                <div class="formGroup">
                    
                    <input style="text-transform: lowercase; color:white;" type="email" name="mail" id="email" placeholder="Email" required>
                    
                </div>
               <br>
                <div class="formGroup">
                   
                    <input style="color: white"  type="password" name="password" id="password" placeholder="Password" required>
                </div>
                
               <a href="forgot_password.php"><p class="text">forget password</p> </a> 
             <button class="btn3" name="login" value="signin" >SIGN IN</button>
                
            </div>
 
            <!-- Right section of responsive registration form -->
            <div class="welcomeDiv">
              
             
                    <h2>Welcome Back!</h2>
                    <p class="text">Unlock your creative journey.</p>
                    <button class="btn2"><a href="register.php">SIGN UP</a></button>
                                
            </div>
 
        </div>
    </div>
</form>  
   

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="#" class="logo"> <span>H</span>UNTING <span>A</span>RTIST</a>
            <p>Get help through our social media links.</p>
            <div class="share">
                <a href="https://www.facebook.com/profile.php?id=100092454578173" class="fab fa-facebook-f"></a>
                <a href="https://twitter.com/ArtistHunt5412" class="fab fa-twitter"></a>
                <a href="https://www.linkedin.com/mynetwork/" class="fab fa-linkedin"></a>
                <a href="https://instagram.com/huntingartist?igshid=ZGUzMzM3NWJiOQ==" class="fab fa-instagram"></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <h3>quick links</h3>
            <a href="home.php" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="about.php" class="links"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="review.php" class="links"> <i class="fas fa-arrow-right"></i> reviews </a>
            <a href="service.php" class="links"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="contact.php" class="links"> <i class="fas fa-arrow-right"></i> contact</a>
            <a href="blog.php" class="links"> <i class="fas fa-arrow-right"></i> blogs </a>
        </div> 
        
        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <h3>contact info</h3>
            <p> <i class="fas fa-phone"></i> +91 8104738654 </p>
            <p> <i class="fas fa-phone"></i> +91 7400354807 </p>
            <p> <i class="fas fa-phone"></i> +91 9322368755 </p>
            <p> <i class="fas fa-envelope"></i> huntingartist5412@gmail.com </p>
            <p> <i class="fas fa-map"></i> Mumbai, India - 400097 </p>
           
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="600">
            <h3>Get Help</h3>
            <a href="faq.php" class="links"> <i class="fas fa-arrow-right"></i> FAQs </a>
            <a href="terms.php" class="links"> <i class="fas fa-arrow-right"></i> Terms and Conditions </a>
        </div>

    </div>

</section>

<div class="credit">created by <span><a href="team.php">Students</a></span> | all rights reserved! <br><br></div>

<!-- footer section ends -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!--review script-->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

 


</script>
</body>
 
</html>



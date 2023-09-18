<?php

$msgp=$msgc="";
        session_start();
	include 'config.php';
        if(isset($_POST['reset']))
        {
            $password= mysqli_real_escape_string($conn, $_POST['pass']);
            $conpasswd= mysqli_real_escape_string($conn, $_POST['conpass']);
            
             $email_reg=$_SESSION['emailid'];
            
            
           if (strlen($password) < 8) {
                $msgp= 'Password must be greater than 8 characters<br>';              
                }
                else
                    {
                if($password==$conpasswd)
                {
                  $sql= "UPDATE `register` SET Password='$password' ,Confirm_Password= '$conpasswd' WHERE Email_Id='$email_reg'";
                  
                           $result = mysqli_query($conn, $sql);
                   

                    if ($result) {
                          header("location:signin.php");
                         
                         
                         } else {
                             echo "Error updating password: " . mysqli_error($conn);
                               }  
                }
                else{                   
                    $msgc= 'Password and confirm password do not match<br>';      
                }
                
        }
        } 
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password Form</title>
    <link rel="stylesheet" href="css/style_reset_password.css">
  
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

<!--reset password form start-->   
<div class="con">
        <div class="ip">
            <h3>Reset Password Form</h3><br><br>
            <form method="post">
        
            <input type="password" placeholder="Re-enter password" name="pass"><br><br>
            
            <input type="password" placeholder="Confirm password" name="conpass"><br><br><br>
           <button name="reset">Submit</button>
            </form>
          </div>
       </div>
   <!--reset password form end-->   
   <br> <br> <br> <br> <br>    
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
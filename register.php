<?php
include 'config.php';
$msgn=$msgce=$msgp=$msge=$msgm=$msgmn=$msgor=$msgc="";

if(isset($_POST['reg']))
{   
    $name= mysqli_real_escape_string($conn,$_POST['nm']); 
    $password= mysqli_real_escape_string($conn, $_POST['pass']);
    $conpasswd= mysqli_real_escape_string($conn, $_POST['conpass']);
    $email= mysqli_real_escape_string($conn, $_POST['mail']);
    $mobileno= mysqli_real_escape_string($conn,$_POST['mnum']);
   
      if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                $msgn= "Only Alphabets are allowed";           
                }
                
    if (mysqli_num_rows(mysqli_query($conn, "select * from register where Email_Id='{$email}'"))>0)
            {                
                 $msgce= "This email address has been already exist";
            }  
                if (strlen($password) < 8) {
                $msgp= 'Password must be greater than 8 characters<br>';              
        }
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $msge= 'Enter valid email address';
        }
        if (strlen($mobileno) != 10) {
            $msgm= "Mobile number must be 10 digits only";
           
        }
         if (!preg_match("/^[0-9]*$/", $mobileno)) {
            $msgmn= "Only numbers are allowed";
        }
          
                 if ($password === $conpasswd) //password=conpass if-3 
                 {
                     $otp = rand(100000, 999999);
$timestamp = time();
$validity_period = 300;
$expiry_timestamp = $timestamp + $validity_period;
$_SESSION['otp'] = $otp;
$_SESSION['expiry_timestamp'] = $expiry_timestamp;   
     
    require './phpmailer/class.phpmailer.php';
    require './phpmailer/class.smtp.php';
    $message_body = "OTP is <b>" . $otp . "</b>. Use this to verify your login. Do not share OTP for security reasons.<br><b>Note:</b> This OTP is valid for the next 5 minutes only.";
    $mail = new PHPMailer();
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'huntingartist5412@gmail.com';                     //SMTP username
    $mail->Password   = 'ihnxonjvkwevzedl';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465; 
     $mail->setFrom("huntingartist5412@gmail.com", "Hunting Artist");
    $mail->addAddress("$email");
    $mail->Subject = "Hunting Artist - OTP Verification";
    $mail->msgHTML($message_body);
    $result = $mail->Send();    
    if ($result) {           
        $sql = "insert into register(Name,Password,Confirm_Password,Email_Id,Mobile_Number,OTP)" . "values('$name','$password','$conpasswd','$email','$mobileno','$otp')";
           $result = mysqli_query($conn, $sql); 

        header("location:OTP_register.php");
    }
    else {
    $msgor='Error sending OTP: ' . $mail->ErrorInfo;
}
                } //password=conpass if-3 close
        else
        {
            $msgc="<div class='alert alert-danger'>Password and confirm password do not match</div>"; 
        }
   
}//button if-1 close
 
 
            
mysqli_close($conn);
?>   
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <!-- CSS file -->
    <link rel="stylesheet" href="css/style_signup.css">
    <!-- Font Awesome 5 CDN link to add social icons in html5 registration form -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
       
   
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
<br><br><br><br>
    <form action="register.php" method="post"> 
    <div class="container">
        <div class="formWraper">
 
            <!-- Left section of responsive registration form -->
 
            <div class="formDiv">
                <h2>Create Account</h2>
                <br>
                
                <p class="text"> Sign Up with Social Media</p>
 
             <!-- Font Awesome Icons -->
                <div class="socialBtn">
                    <div class="facebook icon"><i class="fab fa-facebook-f"></i></div>
                    <div class="twitter icon"><i class="fab fa-twitter"></i></div>
                    <div class="instagram icon"><i class="fab fa-instagram"></i></div>
                </div>
                 
                <!--Horizontal Line-->
                <hr>
                <div class="orDiv">Or</div>
 
                <p class="text">Sign Up with Email Address</p>
                <br>
                <h4 style="color:red;"><?php  echo $msgor; ?></h4>
                                <div class="formGroup">
                   
                    <input style="color: white;"   type="text" name="nm" id="name" placeholder="Name" required><br>
                    <h4 style="color:red;"><?php  echo $msgn; ?></h4>
                </div>
                <br>
                <div class="formGroup">
                    
                    <input style="color: white;"   type="password" name="pass" id="password" placeholder="Password" required>
                    <h4 style="color:red;"><?php  echo $msgp; ?></h4>
                </div>
                <br>
                <div class="formGroup">
                    
                    <input style="color: white;"   type="password" name="conpass" id="confirm_password" placeholder="Confirm Password" required>
                   <h4 style="color:red;"><?php  echo $msgc; ?></h4>

                </div>
                <br>
                <div class="formGroup">
                   
                    <input style="color:white;" type="email" name="mail" id="email" placeholder="Email" required>
                    <h4 style="color:red;"><?php  echo $msge; ?></h4>
                    <h4 style="color:red;"><?php  echo $msgce; ?></h4>

                </div>
                <br>
                <div class="formGroup">
                 
                    <input style="color: white;"   type="text" name="mnum" id="phone" placeholder="Mobile Number" required>
                    <h4 style="color:red;"><?php  echo $msgm; ?></h4>
                    <h4 style="color:red;"><?php  echo $msgmn; ?></h4>
                </div>
                <br>
                <div class="checkBox">
                    <input type="checkbox" name="checkbox" id="checkbox" required>
                    <span class="text">I Agree with Terms & Conditions.</span>
                </div>
                <button class="btn3" name="reg" onsubmit="">SIGN UP</button>
            </div>
            
            <!-- Right section of responsive registration form -->
            <div class="welcomeDiv">
                <h2>Welcome Back!</h2>
                <p class="text">Unlock your creative journey.</p>
                <button class="btn2"><a href="signin.php">SIGN IN</a></button>
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
<?php
include 'config.php';
$msgn=$msgce=$msgp=$msge=$msgm=$msgmn=$msgor=$msgc="";

if(isset($_POST['submit']))
{   
    $name= mysqli_real_escape_string($conn,$_POST['nm']);
    $username= mysqli_real_escape_string($conn,$_POST['unm']);  
    $email= mysqli_real_escape_string($conn, $_POST['mail']);
    $mobileno= mysqli_real_escape_string($conn,$_POST['mnum']);
    $password= mysqli_real_escape_string($conn, $_POST['pass']);
    $conpasswd= mysqli_real_escape_string($conn, $_POST['conpass']);
    $place= mysqli_real_escape_string($conn,$_POST['place']);
    $company= mysqli_real_escape_string($conn,$_POST['company']);
    $gender= mysqli_real_escape_string($conn,$_POST['gender']);
   
      if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                $msgn= "Only Alphabets are allowed";           
                }
    if (mysqli_num_rows(mysqli_query($conn, "select * from recruiter_account where Email='{$email}'"))==0)
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
      //  function sendOtp() {
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
        $sql = "insert into recruiter_account(Name,Username,Email,Mobile_Number,Password,Confirm_Password,Place,Company_Name,Gender,OTP,Image)" . "values('$name','$username','$email','$mobileno','$password','$conpasswd','$place','$company','$gender','$otp','Uploads/user.png')";
                     $result = mysqli_query($conn, $sql); 

        header("location:otp_rec.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Account Form</title>
    <link rel="stylesheet" href="style_recruiter.css">
    <link rel="icon" href="images/logo.png" type="image/icon type">
   
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

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="signin.php" class="btn">Login</a>

</header>

<!-- header section ends -->

<br><br><br><br><br><br><br>
    <div class="container">
        <div class="title"><span>C</span>reate Your Account</div>
        <h2 class="error"><?php echo $msgor;?></h2>
        <div class="content">
            <form action="#" method="Post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Name</span>
                            <input type="text" placeholder="name" name="nm" required>
                             <p class="error"><?php  echo $msgn; ?></p>
                       </div>
                           <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your username"  name="unm" required>
                       </div>
                       <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" name="mail"required>
                         <p class="error"><?php  echo $msge; ?></p>
                          <p class="error"><?php  echo $msgce; ?></p>
                        </div>
                        <div class="input-box">
                            <span class="details">Mobile Number</span>
                            <input type="text" placeholder="Enter your number" name="mnum" required>
                             <p class="error"><?php  echo $msgm; ?></p>
                              <p class="error"><?php  echo $msgmn; ?></p>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your Password"  name="pass" required>
                             <p class="error"><?php  echo $msgp; ?></p>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" placeholder="Enter your Confirm Password" name="conpass" required>
                            <p class="error"><?php  echo $msgc; ?></p>
                        </div>
                        
                        
                        <div class="input-box"> 
                            <span class="details">Place</span>
                            <select  name="place" class="chip" id="bo">
                             <option value="search">Search City</option>
                              <option>Dahisar</option>   
                               <option>Borivali</option>                             
                               <option>Kandivali</option>
                               <option>Malad</option>
                           </select>
                           </div>
                   <div class="input-box">
                    <span class="details">Company Name</span>
                    <input type="text" placeholder="Enter your company name "  name="company" required>
               </div>
           </div>
                                   
                    <div class="gender-details">
                        <input type="radio" name="gender" value="Male" id="dot-1">
                         <input type="radio" name="gender" value="Female" id="dot-2">
                         <input type="radio" name="gender" value="Prefer not to say" id="dot-3">
                         <span class="gender-title">Gender</span>
                         <div class="category">
                               <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                               </label>
                               <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender" >Female</span>
                               </label>
                               <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="gender">Prefer not to say</span>
                               </label>

                         </div>
                    </div>
                 <br><input type="checkbox"><span id="check"> I Agree with all Terms and Condition</span>

                    <div class="button">
                        <input type="submit" name="submit" value="Register">
                    </div>
            </form>
        </div>
    </div>

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
<?php
$msge = $msg = "";
include 'config.php';
session_start();
if (isset($_POST['forgot'])) {
    $email = mysqli_real_escape_string($conn, $_POST['mail']);
    $_SESSION['emailid'] = $email;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msge = 'Enter valid email address';
    }

    $check = mysqli_query($conn, "SELECT * FROM register WHERE Email_Id = '$email'");
    if (($check) == 1) {
        $otp = rand(100000, 999999);
        $timestamp = time();
        $validity_period = 300;
        $expiry_timestamp = $timestamp + $validity_period;
        $_SESSION['otp'] = $otp;
        $_SESSION['expiry_timestamp'] = $expiry_timestamp;
        require './phpmailer/class.phpmailer.php';
        require './phpmailer/class.smtp.php';
        $message_body = "OTP is <b>" . $otp . "</b>. Use this to reset your password. Do not share OTP for security reasons.<br><b>Note:</b> This OTP is valid for the next 5 minutes only.";
        $mail = new PHPMailer();
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'huntingartist5412@gmail.com';                     //SMTP username
        $mail->Password = 'ihnxonjvkwevzedl';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port = 465;
        $mail->setFrom("huntingartist5412@gmail.com", "Hunting Artist");
        $mail->addAddress("$email");
        $mail->Subject = "Hunting Artist - OTP Verification";
        $mail->msgHTML($message_body);
        $result = $mail->Send();
        if ($result) {
            $sql = "insert into forgot_password(Email_Id,OTP)" . "values('$email','$otp')";
            $result = mysqli_query($conn, $sql);
            header("location:OTP_fp.php");
        } else {
            $msgor = 'Error sending OTP: ' . $mail->ErrorInfo;
        }
    } //password=conpass if-3 close
    else {
        $msgc = "<div class='alert alert-danger'>Data not insereted</div>";
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forget Password Form</title>
        <link rel="stylesheet" href="css/style_forgot_password.css">


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

        <!--forget password section start-->
        <div class="con">
            <div class="ip">

                <form method="post">
                    <label for="exampleFormControlInput1" >Enter your email address</label><br><br>
                    <input type="email"  name="mail" id="exampleFormControlInput1" placeholder="example@gmail.com"><br><br>            
                    <button name="forgot">Submit</button>
                </form>
            </div>
        </div> 

        <!--forget password section end--> 
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
                offset: 150,
            });




        </script>
    </body>
</html>
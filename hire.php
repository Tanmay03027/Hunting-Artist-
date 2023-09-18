<?php
include 'config.php';
require './phpmailer/class.phpmailer.php';
require './phpmailer/class.smtp.php';
session_start();

if (isset($_GET['submit'])) {
    $email_ar = $_SESSION['demail'];

    $recruiter_name = mysqli_real_escape_string($conn, $_GET['unm']);
    $recruiter_email = mysqli_real_escape_string($conn, $_GET['mail']);
    $recruiter_phone = mysqli_real_escape_string($conn, $_GET['mobileno']);
    $event_name = mysqli_real_escape_string($conn, $_GET['event']);
    $event_date = mysqli_real_escape_string($conn, $_GET['date']);
    $event_time = mysqli_real_escape_string($conn, $_GET['time']);
    $event_location = mysqli_real_escape_string($conn, $_GET['location']);

    $check = mysqli_query($conn, "SELECT * FROM recruiter_account WHERE Email='$recruiter_email'");
    if (mysqli_num_rows($check) == 1) {

        $sql = "insert into enquiries(Name,Recruiter_Email_Id,Mobile_Number,Event_name,Event_date,Event_time,location,Artist_Email_Id)" . "values('$recruiter_name','$recruiter_email','$recruiter_phone','$event_name','$event_date','$event_time','$event_location','$email_ar')";
        $result = mysqli_query($conn, $sql);
        $inserted_id = mysqli_insert_id($conn);
        if ($result) {
            $message_body = "Hello,<br>You have received an enquiry for the following event:<br><br>Event Name: $event_name<br>Event Date: $event_date<br>Event Location: $event_location<br>Event Time: $event_time<br><br>From: $recruiter_name<br>Email: $recruiter_email<br><br><a href='http://localhost/HA_Project/confirmation.php?enquiry_id=$inserted_id'>Take Action</a><br><br>Please take a look and let us know if you are interested.<br><br>Thank you.";
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'huntingartist5412@gmail.com';                     //SMTP username
            $mail->Password = 'ihnxonjvkwevzedl';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port = 465;
            $mail->setFrom("huntingartist5412@gmail.com", "Hunting Artist");
            $mail->addAddress($email_ar);
            $mail->Subject = "$recruiter_name has sent the enquiry";
            $mail->msgHTML($message_body);

            if (!$mail->Send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo '<br>Enquiry sent successfully';
            }
        } else {
            echo 'Data has not been inserted';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Hire Form</title>
        <link rel="stylesheet" href="css/style_hire.css">


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

            <a data-aos="zoom-in-left" data-aos-delay="1300" href="" class="btn" >Login</a>


        </header>

        <!-- header section ends -->
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!--form start-->
        <div class="wrap">
            <div class="title">
                Send Enquiry
            </div>
            <form action="hire.php" method="GET">
                <div class="field">
                    <input type="text" name="unm" required>
                    <label>Username</label>
                </div>
                <div class="field">
                    <input type="text" name="mail" required>
                    <label>Email</label>
                </div>
                <div class="field">
                    <input type="text" name="mobileno" required>
                    <label>Mobile Number</label>
                </div>
                <div class="field">
                    <input type="text"  name="event" required>
                    <label>Event Type</label>
                </div>
                <div class="field">
                    <input type="date" name="date" required>
                </div>
                <div class="field">
                    <input type="time" name="time" required>
                </div>
                <div class="field">
                    <input type="text" name="location" required>
                    <label>Location</label>
                </div>
                <input type="hidden" name="artist_email" value="<?php echo $email_ar; ?>"><br><br><br>
                <div class="field">
                    <input type="submit" name="submit" value="Send Enquiry">
                </div>           
            </form>
        </div>

        <!--form end-->

        <br><br><br><br><br><br><br><br>

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
        </div>                <div class="box" data-aos="fade-up" data-aos-delay="450">
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
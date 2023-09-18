<?php
session_start();
include 'config.php';

$msg = $msgname = $msgn = $msge = $msgm = $msgen = $msged = $msget = $msgel = "";

$enquiry_id = $_GET['enquiry_id'];
$artist_email = "";
if (isset($_SESSION['Email'])) {
    $artist_email = $_SESSION['Email'];
}
$query = "SELECT * FROM enquiries where Id=$enquiry_id;";
$all_details = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($all_details);

$sql = "SELECT * FROM artist_account where Email='$artist_email'";
$ar_details = mysqli_query($conn, $sql);
$artist_row = mysqli_fetch_assoc($ar_details);

if ($artist_row) {
    $msgname = $artist_row['Name'];
}
$email_from_data = $row['Artist_Email_Id'];

//If the artist email is not as the logged in email then the user can't access the details
if ($artist_email == $email_from_data) {
    $msgn = $row['Name'];
    $msge = $row['Recruiter_Email_Id'];
    $msgm = $row['Mobile_Number'];
    $msgen = $row['Event_name'];
    $msged = $row['Event_date'];
    $msget = $row['Event_time'];
    $msgel = $row['location'];

// We don't need the email 
// id of recruiter here we can just get this from the id 
    if (isset($_POST['accept'])) {

        $sql = "UPDATE `enquiries` SET `Status`='accept' WHERE id='$enquiry_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            require './phpmailer/class.phpmailer.php';
            require './phpmailer/class.smtp.php';
            $message_body = "Dear $msgn,\n\nThank you for your enquiry for $msgen. I am pleased to inform you that I am available to perform at your event. Please let me know if you have any further questions or would like to discuss the details of the event.You can reach me out at $artist_email\n\nBest regards,$msgname\n";
            ;
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'huntingartist5412@gmail.com';                     //SMTP username
            $mail->Password = 'ihnxonjvkwevzedl';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port = 465;
            $mail->setFrom("huntingartist5412@gmail.com", "Hunting Artist");
            $mail->addAddress("$msge");
            $mail->Subject = "Enquiry for $msgen Accepted";
            $mail->msgHTML($message_body);
            $result = $mail->Send();
            if ($result){
                $msg="Message has been sent!";
            }
        } else {
            $msg = "Error in updating the status";
        }
    } else if (isset($_POST['reject'])) {
        $sql = "UPDATE `enquiries` SET `Status`='reject' WHERE id='$enquiry_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            require './phpmailer/class.phpmailer.php';
            require './phpmailer/class.smtp.php';
            $message_body = "Dear $msgn,\n\nThank you for your enquiry for $msgen. I am pleased to inform you that I am unavailable to perform at your event. Please let me know if you have any further questions or would like to discuss the details of the event.\n\nBest regards,$msgname\n";
            ;
            $mail = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'huntingartist5412@gmail.com';                     //SMTP username
            $mail->Password = 'ihnxonjvkwevzedl';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port = 465;
            $mail->setFrom("huntingartist5412@gmail.com", "Hunting Artist");
            $mail->addAddress("$msge");
            $mail->Subject = "Enquiry for $msgen Rejected";
            $mail->msgHTML($message_body);
            $result = $mail->Send();
            return true;
            
        } else {
            $msg = "Error in updating the status";
        }
    }
}
?>-->

<html>
    <head>
        <title>Confirmation Page </title>
        <link rel="stylesheet" href="style_confirmation_page.css" >
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


  
    <a data-aos="zoom-in-left" data-aos-delay="1300" href="#book-form" class="btn">Login</a>
  
  </header>
  
  <!-- header section ends -->
  <br> <br> <br> <br> <br> <br> <br> <br>
        <div class="card2">
            <h2 style="color:red;"><?php echo $msg; ?></h2>
            <h3>Recruiter Details</h3>
            
<?php if ($artist_email == $email_from_data): ?>
<br><br>
<div class="text">
    <h2 class="msg">Name:<?php echo $msgn; ?></h2><br>
    <h2 class="msg">Mobile Number: <?php echo $msgm; ?></h2><br>
    <h2 class="msg">Event Name: <?php echo $msgen; ?></h2><br>
    <h2 class="msg">Event Date: <?php echo $msged; ?></h2><br>
    <h2 class="msg">Event Time: <?php echo $msget; ?></h2><br>
    <h2 class="msg">Event Location: <?php echo $msgel; ?></h2><br>
</div>
           <br>
                <form method="Post">
                    <button name='accept' >Accept</button>&nbsp;
                    <button name='reject' >Reject</button>
                </form><br>
<?php else: ?>
                <p>You are unauthorized to view this page.<br>Please <a href='login_artist.php'>login</a> to your artist account.</p>
<?php endif; ?>
        </div>
        <br> <br> <br> <br> <br> <br> <br> <br>
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
  <script src="script.js"></script>

    </body>
</html>
<?php
$msgn = $msge = $msg = $msgx = "";

require './phpmailer/class.phpmailer.php';
require './phpmailer/class.smtp.php';
if (isset($_POST['submit'])) {

    $name = $_POST['nm'];
    $email = $_POST['mail'];
    $message = $_POST['msg'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'huntingartist5412@gmail.com';
    $mail->Password = 'ihnxonjvkwevzedl';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($email, $name);
    $mail->addAddress('huntingartist5412@gmail.com');
    $mail->addReplyTo($email, $name);
    $mail->Subject = ('Query');
    $mail->Body = $message;

    try {
        $mail->send();
        $msg = "<div class='error'>Message has been sent.</div>";
    } catch (Exception $e) {
        $msgx = "<div class='alert alert-danger'>Message could not be sent. Mailer Error:', $mail->ErrorInfo</div>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style_contact.css">


        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style_contact.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

        <!-- custom js file link  -->
        <script src="js/script.js" defer></script>
        <!-- Fontawesome icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#contact">Contact</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="blog.php">Blog</a>
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="review.php">Review</a>
     
    </nav>


            <a data-aos="zoom-in-left" data-aos-delay="1300" href="signin.php" class="btn" >Login</a>

        </header>

        <!-- header section ends -->
        <section class = "contact-section">
            <div class = "contact-bg">
                <h3>Get in Touch with Us</h3>
                <h2>contact us</h2>
                <div class = "line">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </div>


            <div class = "contact-body">
                <div class = "contact-info">
                    <div>
                        <span><i class = "fas fa-mobile-alt"></i></span>
                        <span>Phone No.</span>
                        <span class = "text">+91 7400354807</span>
                        <span class = "text">+91 8104738654</span>
                        <span class = "text">+91 9322368755</span>
                    </div>
                    <div>
                        <span><i class = "fas fa-envelope-open"></i></span>
                        <span>E-mail</span>
                        <span class = "text">huntingartist5412@gmail.com</span>
                    </div>
                    <div>
                        <span><i class = "fas fa-map-marker-alt"></i></span>
                        <span>Address</span>
                        <span class = "text">Atharva Institue of Management and Studies </span>
                    </div>
                    <div>
                        <span><i class = "fas fa-clock"></i></span>
                        <span>Opening Hours</span>
                        <span class = "text">24/7 Hours</span>
                    </div>
                </div>

                <div class = "contact-form">
                    <form method="Post">
                        <h1 class="errors"><?php echo $msg; ?></h1>
                        <h1 class="errors"><?php echo $msgx; ?></h1>
                        <div>
                            <input type = "text" class = "form-control" placeholder="Name" name="nm" required>             
                        </div>
                        <h1 class="errors"><?php echo $msgn; ?> </h1>
                        <div>
                            <input type = "email" class = "form-control" placeholder="E-mail Id" name="mail" required>     
                        </div>
                        <h1 class="errors"><?php echo $msge; ?></h1>
                        <textarea rows = "5" placeholder="Message" name="msg" class = "form-control" required></textarea>
                        <input type = "submit" name="submit" class = "send-btn" value = "send message">
                    </form>

                    <div>
                        <img src = "images/conimg.png" alt = "">

                    </div>
                </div>

                <div class = "map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d30141.21139678269!2d72.82974097678803!3d19.21042131868584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d19.2331844!2d72.8633633!4m5!1s0x3be7b79efaded34b%3A0x66e86913ea2199d!2sAtharva%20Institute%20of%20Management%20Studies%2C%20Malad%20-%20Marve%20Rd%2C%20Charkop%20Naka%2C%20Malad%20West%2C%20Mumbai%2C%20Maharashtra%20400095!3m2!1d19.1981031!2d72.8259107!5e0!3m2!1sen!2sin!4v1683392850816!5m2!1sen!2sin" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class = "contact-footer">
                    <h3>Follow Us</h3>
                    <div class = "social-links">
                        <a href = "https://www.facebook.com/profile.php?id=100092454578173" class = "fab fa-facebook-f"></a>
                        <a href = "https://twitter.com/ArtistHunt5412" class = "fab fa-twitter"></a>
                        <a href = "https://instagram.com/huntingartist?igshid=ZGUzMzM3NWJiOQ==" class = "fab fa-instagram"></a>
                        <a href = "https://www.linkedin.com/mynetwork/" class = "fab fa-linkedin"></a>

                    </div>
                </div>
        </section>

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
                    <a href="#contact" class="links"> <i class="fas fa-arrow-right"></i> contact</a>
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

        <script>

            AOS.init({
                duration: 800,
                offset: 150,
            });




        </script>

    </body>
</html>
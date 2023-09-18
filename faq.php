<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FAQ Page  </title>
  
    <!-- fontawasome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- css -->
   <link rel="stylesheet" href="css/style_faq.css">
  
   
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

<section id="faq">
    <h1 class="title">FAQ's</h1>

    <div class="questions-container">
        <div class="question">
            <button>
                <span>What to upload video in artist page ?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Using User account, Go to your account page and click on upload button and upload the video</p>
        </div>

        <div class="question">
            <button>
                <span>How to hire artist ?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>You can hire by clicking on hire button in artist page </p>
        </div>

        <div class="question">
            <button>
                <span>How to give review ?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>Fill the form which will display </p>
        </div>

        <div class="question">
            <button>
                <span>How to access the explore button ?</span>
                <i class="fas fa-chevron-down d-arrow"></i>
            </button>
            <p>You can acccess it by login into our website fill the details which is required and you can access the explore the button</p>
        </div>
    </div>
</section>

<!-- external js-->
<script src="main.js"></script>

<br><br><br>
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
            <a href="#faq" class="links"> <i class="fas fa-arrow-right"></i> FAQs </a>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page </title>
    
   
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
        <a data-aos="zoom-in-left" data-aos-delay="1150" href="#review">Review</a>
     
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="signin.php" class="btn" >Login</a>

</header>

<!-- header section ends -->

<br><br><br><br><br><br>

<!-- review section starts  -->

<section class="review" id="reviews">
    <div class="content" data-aos="fade-right" data-aos-delay="300">
        <span>testimonials</span>
        <h3>good news from our clients</h3>
        
    </div>
</section> 
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
            <div class="flex">
                <div class="comments">
                    I would totally recommend this site to show your talent. I uploaded my videos and got hired by cafe  
                </div>
                <div class="profile">
                    <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                    <a href="#">Shruti Pawar</a>
                    <span>Artist</span>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="flex">
                <div class="comments">
                    Best site ever! I found a really good singer for our anniversary party. Excellent service and easy to use. Thanks a lot.
                 </div>
                <div class="profile">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                    <a href="#">Megha Bose</a>
                    <span>Recruiter</span>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="flex">
                <div class="comments">
                    Professional, reliable and quick to respond to inquiries, they oversee a smooth workflow.
                </div>
                <div class="profile">
                    <img src="https://images.unsplash.com/photo-1503185912284-5271ff81b9a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                    <a href="#">Priti Bhuvad</a>
                    <span>Artist</span>
                </div>
            </div>
        </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>



<!-- review section ends -->

<br><br><br><br><br><br>
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
            <a href="#review" class="links"> <i class="fas fa-arrow-right"></i> reviews </a>
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

    // initialize swiper js

const swiper = new Swiper('.swiper', {
    loop: true,

     // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


})


</script>

</body>
</html>
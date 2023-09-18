<?php
session_start();
// Connect to database
include 'config.php';

$email = $_GET['data'];
$_SESSION['demail']=$email;
// use the email address to retrieve the user's details from the database

// Query database to get all users
$query = "SELECT * FROM `artist_account` WHERE Email='$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artist User Account</title>
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
        <link rel="stylesheet" href="style_artist_dashboard.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
<br><br><br><br><br><br><br><br><br><br>
        <div class="container6">
            <ul>
                <li><a href="#"><i class="fa fa-user" style="font-size:30px;"></i></a></li>
                <li><a href="#"><?php echo $row['Username']; ?></a></li>           
            </ul>
        </div>
        <div class="tab">

            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Dashboard</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Video</button>
             <a href="hire.php"><button class="tablinks" style="background-color: #e3362c;" onclick="openCity(event, 'Paris')">Hire</button></a>


        </div>
        <div id="London" class="tabcontent">
            <div class="cross">
                <h2> About Me </h2>
                <p><b class="txt">Name:&nbsp;</b><?php echo $row['Name']; ?></p><br><br>
                <p><b class="txt">Gender:&nbsp;</b><?php echo $row['Gender']; ?></p><br><br>            
                <p><b class="txt">Category:&nbsp;</b><?php echo $row['Category']; ?></p><br><br>   
                <p><b class="txt">Job Type:&nbsp;</b><?php echo $row['job']; ?></p><br><br>
                <p><b class="txt">Price:&nbsp;</b><?php echo $row['Charges']; ?></p><br><br>
                <p><b class="txt">Place:&nbsp;</b><?php echo $row['Place']; ?></p>

            </div>
            <div class="card">
                <h1><?php echo $row['Username']; ?></h1>

                <img src="<?php echo $row['Image']; ?>" title="Profile pic">           
                
            </div>
            
            
        </div>
            
       
        <div id="Paris" class="tabcontent">
            <h3>Video</h3>
         <video height="300px"  controls>
            <source src="<?php echo $row['Video']; ?>">
         </video>
            
            </div>

        </div>


        <!-- footer section starts  -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
//navigation script 
    AOS.init({
        duration: 800,
        offset:150,
    });




       //user account script
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    
                    console.log(tabcontent[i]);
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();


        </script>
    </body>
</html>
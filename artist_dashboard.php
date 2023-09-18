<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: login_artist.php");
    exit;
}

// Connect to database
include 'config.php';

// Query database to get all users

$email = $_SESSION['Email'];
$query = "SELECT * FROM `artist_account` WHERE Email='$email';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit']))
{
    $image=$_FILES['photo'];
    
    $img_filename=$image['name'];    
    $img_error=$image['error'];
    $img_temp=$image['tmp_name'];
    $img_size=$image['size'];
    $filename_separate= explode('.',$img_filename);     
    $file_extension=strtolower($filename_separate[1]);
   
    $extension=array('jpg','jpeg','png');
    if(in_array($file_extension, $extension) && $img_size < 500000) // Maximum allowed size is 500KB
    {
        $upload_img='Uploads/'. $img_filename;
        move_uploaded_file($img_temp,$upload_img);
        $sql="UPDATE `artist_account` SET `Image`='$upload_img' WHERE Email='$email'";
        $result= mysqli_query($conn,$sql);
        if($result)
        {
            header('location:artist_dashboard.php');   
        }
    }
    else
    {
        echo "Invalid file format or file size exceeded 500KB";
    }
}


if (isset($_POST['upload'])) {
	
	$file_name = $_FILES['file']['name'];//all data of files being collected
	$file_type = $_FILES['file']['type'];	
	$temp_name = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
		
	$file_destination = "upload/".$file_name;

	if (move_uploaded_file($temp_name,$file_destination)) { 
	
	$q="UPDATE `artist_account` SET `Video`='$file_destination' WHERE Email='$email'";

	if(mysqli_query($conn,$q)) {

		$success = "Video uploaded successfully.";
	}
	else {
		
		$failed = "Something went wrong??";
	}
}
else {

	$msz = "Please select a video to upload..!";
}
}

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
            <button class="tablinks" onclick="openCity(event, 'Paris')">Videos</button>


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
                <!--<input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file">-->

               
                
            </div>
            
            <div class ="input">  
                   <form action="" method="post" enctype="multipart/form-data">
            
                <label for="photo">Photo:</label>
                <input type="file" name="photo">

                <br>
                <input type="submit" name="submit" value="Upload">
            </form>
            </div>
        </div>
            
       
        <div id="Paris" class="tabcontent">
            <h3>Videos </h3>
         <video height="300px"  controls>
            <source src="<?php echo $row['Video']; ?>">
         </video>
            
         <div class ="input">  
            <form action="" method="post" enctype="multipart/form-data">
        <?php if(isset($success)) { ?>
					<div class="alert alert-success">

						

							<?php echo $success;?>

					</div>
					<?php } ?>
					<?php if(isset($failed)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $failed;?>

					</div>
					<?php } ?>

					<?php if(isset($msz)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $msz;?>

					</div>
					<?php } ?>

         <br>
         <input type="file" name="file">
         <br>
        <input type="submit" name="upload" value="Upload">     
     </form>
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
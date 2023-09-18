<?php
session_start();

// Connect to database
include 'config.php';

// Check if user is logged in
/*if (!isset($_SESSION['Email'])) {
    header("Location: signin.php");
    exit();
}*/

// Query database to get all users
$email = $_SESSION['Email'];
$query = "SELECT * FROM `artist_account`;";
$all_artist = mysqli_query($conn, $query);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link rel="stylesheet" href="css\style_header.css">
    <link rel="stylesheet" href="css\style_main.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/user?f=classic&s=solid">
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Artist Page </title>
  
</head>
<body>
    
<?php
      include 'header.php';

   ?>
    <br><br><br><br><br><br><br>
   <main>
      <?php
          while($row = mysqli_fetch_assoc($all_artist)){
       ?>

       <div class="card">
           <div class="image">
                <img src="<?php echo $row["Image"]; ?>">

           </div>
          
           <div class="caption">
            <p class="pt1"><?php echo $row["Category"];?></p>
           
        
     
            <hr>
           
               <p class="product_name"><i class="fa fa-user" style="color: gray;"></i> &nbsp;<?php echo $row["Name"];  ?></p>
            
               <p class="price">&#8377;&nbsp;<?php echo $row["Charges"];?></p>
  
               
               
             
           </div>
           <a href="visiting_dashboard.php?data=<?php echo $row['Email']; ?>"><<button class="add">Visit Profile</button></a>
       </div>
     <?php

          }
     ?>
   </main>
   <script>
       var product_id = document.getElementsByClassName("add");
       for(var i = 0; i<product_id.length; i++){
           product_id[i].addEventListener("click",function(event){
               var target = event.target;
               var id = target.getAttribute("data-id");
               var xml = new XMLHttpRequest();
               xml.onreadystatechange = function(){
                   if(this.readyState == 4 && this.status == 200){
                       var data = JSON.parse(this.responseText);
                       target.innerHTML = data.in_cart;
                       document.getElementById("badge").innerHTML = data.num_cart + 1;
                   }
               }

               xml.open("GET","connection.php?id="+id,true);
               xml.send();
            
           })
       }

   </script>
</body>
</html>
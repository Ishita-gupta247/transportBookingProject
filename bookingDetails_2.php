<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>admin</title>
  
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <style>
    
    #container-2{border-style:"solid";
    }
    h1{
        color:green;
    }
    .topnav {
    /* background-color: #333; */
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  /* background-color: #ddd; */
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: blue;
}

/* Right-aligned section inside the top navigation */
.topnav-right {
  float: right;
}
    </style>
    </head>
  <body>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="container" >
    <div class="topnav">
    <a class="active" href="booking.php">Home</a>
  <div class="topnav-right">
    <a href="admin_2.php" class="nav-link ">newSchedule</a>
    <a href="bookingDetails.php" class="nav-link active">bookingDetails</a>
    <a href="oldschedule.php" class="nav-link">oldSchedule</a>
  </div>
</div>
    <br><br><br>
    <div class="contaier-2">
    
 
   
<?php
$mysqli = new mysqli("localhost","root","","bookingproject");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
session_start();
$id = $_POST['id'];
$s="UPDATE booking SET status = 'cancel' WHERE id='$id'";
$mysqli->query($s ) ;

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// echo "success"
else{
?>
<h1> Booking is cancelled successfully!!!  </h1> 
<?php
}
?>
</form>
    <form action="booking.php" method="post"><br><br>
    <input type="submit" value="go Back to Home page!" class=" btn btn-secondary btn-lg col-12">
</form> 
</div>   
  </body>
</html>

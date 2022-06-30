<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Admin</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
    /* h1 {
        background-color:grey;
    } */
    body {background-color: hsla(240,100%,85%);
    }
    /* Add a black background color to the top navigation */
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
<?php

// database connection
$mysqli = new mysqli("localhost","root","","bookingproject");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// echo "success"
if(isset($_POST['submit'])){
$adminName = $_POST['adminName'];
$adminId = $_POST['adminId'];
$password = $_POST['psw'];
// $endDate= $_POST['endDate'];

$sql = "select * from admin where adminName='$adminName' and adminId='$adminId' and password='$password' ";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$result = $mysqli->query($sql);

// print_r($result);



 if ($result->num_rows > 0){?>
 <div class="topnav">
  <a class="active" href="booking.php">Home</a>
  <div class="topnav-right">
    <a href="admin_2.php" class="nav-link active">newSchedule</a>
    <a href="bookingDetails.php" class="nav-link">bookingDetails</a>
    <a href="oldschedule.php" class="nav-link">oldSchedule</a>
  </div>
</div>
<form action="admin_3.php" method="post">
             <center><h1> Welcome to admin portal!!</h1>
            <br><br>
            <?php 
              $mysqli = new mysqli("localhost","root","ZIPzap@123","bookingproject");

              // Check connection
              if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
              }
              $s1="select distinct name from category";?>
             <center> <label for="name" >Choose a mode :</label>
              <select name="name" id="name"  required>
                  
                <option value="" selected disabled>--</option>
              <?php
              $result = $mysqli->query($s1);
              
                 if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
                // $status = mysqli_fetch_array($row);
                ?>
                
                <option value=<?php $v1=$row["name"];
                 echo htmlspecialchars($v1) ?>><?php echo $row["name"] ?></option>
              
               
                 <?php
             }
            }
             ?>
            </select><br><br>
type:<input type="text" name="type"> <br>
<br>

From:<input type="text" name="station1"> <br>
<br>
To:<input type="text" name="destination"> <br>
<br>

 
price:<input type="number" name="price"><br>
<br>
StartDate:<input type="date" name="startDate"><br>
<br>
StartTime:<input type="time" name="startTime"><br>
<br>
EndDate:<input type="date" name="endDate"><br>
<br>
EndTime:<input type="time" name="endTime"><br>
<br>
</center>
<!-- price: <input type="number" name="name"><br>
<br>
discount: <input type="number" name="name"><br>
<br>
finalPrice: <input type="text" name="name"><br>
<br> -->

        <!-- <div action="sales_1.php" class=" btn btn-primary btn-lg"></div> -->
    
        <dyv class="row">
        <input type="submit" value="submit" class=" btn btn-warning btn-lg col-6">
        <input type="reset" value="reset" class=" btn btn-danger btn-lg col-6">
</div>
  
</form>
  	<?php
 }
 
//  $sq2="SELECT * FROM user ";

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
else{?><center><h1>
<?php
echo "Invalid credentials :(";
}}
else{?>
    <div class="topnav">
  <a class="active" href="booking.php">Home</a>
  <div class="topnav-right">
    <a href="admin_2.php" class="nav-link active">newSchedule</a>
    <a href="bookingDetails.php" class="nav-link">bookingDetails</a>
    <a href="oldschedule.php" class="nav-link">oldSchedule</a>
  </div>
</div>
<form action="admin_3.php" method="post">
             <center><h1> Welcome to admin portal!!</h1>
            <br><br>
            <?php 
              $mysqli = new mysqli("localhost","root","","bookingproject");

              // Check connection
              if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
              }
              $s1="select distinct name from category";?>
             <center> <label for="name" >Choose a mode :</label>
              <select name="name" id="name"  required>
                  
                <option value="" selected disabled>--</option>
              <?php
              $result = $mysqli->query($s1);
              
                 if ($result->num_rows > 0){
              while($row = $result->fetch_assoc()) {
                // $status = mysqli_fetch_array($row);
                ?>
                
                <option value=<?php $v1=$row["name"];
                 echo htmlspecialchars($v1) ?>><?php echo $row["name"] ?></option>
              
               
                 <?php
             }
            }
             ?>
            </select><br><br>
type:<input type="text" name="type"> <br>
<br>

From:<input type="text" name="station1"> <br>
<br>
To:<input type="text" name="destination"> <br>
<br>

 
price:<input type="number" name="price"><br>
<br>
StartDate:<input type="date" name="startDate"><br>
<br>
StartTime:<input type="time" name="startTime"><br>
<br>
EndDate:<input type="date" name="endDate"><br>
<br>
EndTime:<input type="time" name="endTime"><br>
<br>
</center>
<!-- price: <input type="number" name="name"><br>
<br>
discount: <input type="number" name="name"><br>
<br>
finalPrice: <input type="text" name="name"><br>
<br> -->

        <!-- <div action="sales_1.php" class=" btn btn-primary btn-lg"></div> -->
    
        <dyv class="row">
        <input type="submit" value="submit" class=" btn btn-warning btn-lg col-6">
        <input type="reset" value="reset" class=" btn btn-danger btn-lg col-6">
</div>
  
</form><?php
}
?></h1></center>
<form action="booking.php" method="post" class="text-center">
    <br><br>
<input type="submit" value="Go back to Home!" class=" btn btn-primary btn-lg col-6">
</form>
</body>
</html> 

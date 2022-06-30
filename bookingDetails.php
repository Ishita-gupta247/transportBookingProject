<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
    body {background-color: hsla(240,100%,85%);
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
   
   <h1> Customer Booking Details!!!  </h1> 
  
<?php

// database connection
$mysqli = new mysqli("localhost","root","","bookingproject");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
session_start();
$sql = "SELECT *,b.id as bookid FROM category c join booking b on c.id=b.categoryId;";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$result = $mysqli->query($sql);

// print_r($result);



 if ($result->num_rows > 0){?>
 <table class="table table-dark table-striped table-md" align="left">
 			<tr>
                 <th>customerId</th>
 				<th>customerName</th>
 				<th>mode</th>
 				<th>from</th>
                 <th>to</th>
                 <th>type</th>
                 <th>Final price</th>
                 <th>starttime</th>
                 <th>endtime</th>
                 <th>startDate</th>
                 <th>endDate</th>
                 <th>address</th>
                 <th>paymentMode</th>
                 <th>status</th>
                 <th>bookingTime</th>
                 <th></th>
 			</tr>
            <?php
     	while($row = $result->fetch_assoc()) {
           

 	?>
     
 	
 		<tr>
 			<td><?php echo  $row["customerId"]  ?></td>
 			<td><?php echo $row["customerName"]  ?></td>
 			<td><?php echo $row["name"]  ?></td>
 			<td><?php echo $row["station1"]  ?></td>
             <td><?php echo $row["destination"]  ?></td>
             <td><?php echo $row["type"]  ?></td>
             <td><?php echo $row["finalPrice"]  ?></td>
             <td><?php echo $row["startTime"]  ?></td>
             <td><?php echo $row["endTime"]  ?></td>
             <td><?php echo $row["startDate"]  ?></td>
             <td><?php echo $row["endDate"]  ?></td>
             <td><?php echo $row["address"]  ?></td>
             <td><?php echo $row["paymentMode"]  ?></td>
             <td><?php echo $row["status"]  ?></td>
             <td><?php echo $row["bookingTime"]  ?></td>
             
 <td><form action="bookingDetails_2.php" method="post" class="text">
 
<input type="submit" value="cancelBooking">
<input type="hidden" value=<?php $v1=$row["id"]; echo htmlspecialchars($v1) ?> name="id">

</form></td>
 		</tr>
	    
  		<?php
  	}
  	?>
  	</table>
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

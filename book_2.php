<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> booking</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
    h1 {
        background-color:grey;
    }
    body {background-color: hsla(240,100%,85%);
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

$station1 = $_POST['from'];
$destination = $_POST['to'];
$startDate = $_POST['startDate'];
// $endDate= $_POST['endDate'];
session_start();
$name= $_SESSION['name'];
$sql = "select id, station1,destination,type,price,startTime,endTime,startDate,endDate from category where station1='$station1' and destination='$destination' and startDate='$startDate' and name='$name'";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$result = $mysqli->query($sql);

// print_r($result);



 if ($result->num_rows > 0){?><br><br><center>
    <h1> Records found..proceed to book!!</h1><br><br><?php	while($row = $result->fetch_assoc()) {

 	?>
     
 	<table class="table table-dark table-striped table-md">
 			<tr>
                 <th>id</th>
 				<th>From</th>
 				<th>To</th>
 				<th>type</th>
                 <th>price</th>
                 <th>startTime</th>
                 <th>endTime</th>
                 <th>startDate</th>
                 <th>endDate</th>
                 <th></th>
 			</tr>
 		<tr>
 			<td><?php echo  $row["id"]  ?></td>
 			<td><?php echo $row["station1"]  ?></td>
 			<td><?php echo $row["destination"]  ?></td>
 			<td><?php echo $row["type"]  ?></td>
             <td><?php echo $row["price"]  ?></td>
             <td><?php echo $row["startTime"]  ?></td>
             <td><?php echo $row["endTime"]  ?></td>
             <td><?php echo $row["startDate"]  ?></td>
             <td><?php echo $row["endDate"]  ?></td>
             <td><form action="book_3.php" method="post" class="text-center">
<input type="submit" value="Book Now" class=" btn btn-primary btn-lg col-6">
</form><?php
$_SESSION['categoryId']=$row["id"] ;
$_SESSION['finalPrice']=$row["price"] ;?></td>
 		</tr>
	    
  		<?php
  	}
  	?>
  	</table>
  	<?php
 }
 else{?><br><br><center><h1><?php
     echo "No ".$name." scheduled on ".$startDate." from ".$station1." to ".$destination.":(";?></h1><?php
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







?>
<form action="booking.php" method="post" class="text-center">
    <br><br>
<input type="submit" value="Go back to Home!" class=" btn btn-primary btn-lg col-6">
</form>
</body>
</html> 

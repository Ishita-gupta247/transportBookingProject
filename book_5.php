<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>booking</title>
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
    </style>
    <div class="container" >
    <br><br><br>
    <div class="contaier-2">
   
<?php

// database connection
$mysqli = new mysqli("localhost","root","","bookingproject");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if(isset($_POST["save"])){
$securityCode=$_POST["securityCode"];
session_start();
$categoryId =$_SESSION['categoryId'] ;
$finalPrice=$_SESSION['finalPrice'] ;
$customerName = $_SESSION['customerName'];
$address = $_SESSION['address'];
$customerId = $_SESSION['customerId'];
$paymentMode = $_SESSION['paymentMode'];
$s="select * from card where customerId='$customerId' and securityCode='$securityCode'";
if ($mysqli->query($s) === FALSE) {
  echo "Error: " . $s . "<br>" . $mysqli->error;
}
$r = $mysqli->query($s);

// print_r($result);



 if ($r->num_rows > 0){
     	while($r1 = $r->fetch_assoc()) {
    $sql = "INSERT INTO booking (categoryId,finalPrice,customerName,address,customerId,paymentMode,status) VALUES ('$categoryId','$finalPrice','$customerName','$address','$customerId','$paymentMode','success')";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$sql = "select b.customerId,b.customerName,c.name,c.station1,c.destination,c.type,c.price,c.startTime,c.endTime,c.startDate,c.endDate,b.status,b.bookingTime from category c join booking b on b.categoryId=c.id where b.categoryId=c.id and b.customerId='$customerId'";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$result = $mysqli->query($sql);

// print_r($result);



 if ($result->num_rows > 0){
  ?><h2>
  <h1> Booking is confirmed!!!  </h1> 
  <center>Booking History</center></h2><?php
     	while($row = $result->fetch_assoc()) {

 	?>
     
 	<table class="table table-dark table-striped table-md">
 			<tr>
                 <th>customerId</th>
 				<th>customerName</th>
 				<th>mode</th>
 				<th>from</th>
                 <th>to</th>
                 <th>type</th>
                 <th>price</th>
                 <th>starttime</th>
                 <th>endtime</th>
                 <th>startDate</th>
                 <th>endDate</th>
                 <th>status</th>
                 <th>bookingTime</th>
                 <th></th>
 			</tr>
 		<tr>
 			<td><?php echo  $row["customerId"]  ?></td>
 			<td><?php echo $row["customerName"]  ?></td>
 			<td><?php echo $row["name"]  ?></td>
 			<td><?php echo $row["station1"]  ?></td>
             <td><?php echo $row["destination"]  ?></td>
             <td><?php echo $row["type"]  ?></td>
             <td><?php echo $row["price"]  ?></td>
             <td><?php echo $row["startTime"]  ?></td>
             <td><?php echo $row["endTime"]  ?></td>
             <td><?php echo $row["startDate"]  ?></td>
             <td><?php echo $row["endDate"]  ?></td>
             <td><?php echo $row["status"]  ?></td>
             <td><?php echo $row["bookingTime"]  ?></td>
             <!-- <td><form action="book_3.php" method="post" class="text-center">
<input type="submit" value="Book Now" class=" btn btn-primary btn-lg col-6">
</form></td> -->
 		</tr>
      </table>
 	
  <?php
  }}}}
else{
  echo "invalid security code..kindly retry:(";
}}
  else{
// echo "success"
session_start();
$categoryId =$_SESSION['categoryId'] ;
$finalPrice=$_SESSION['finalPrice'] ;
$customerName = $_SESSION['customerName'];
$address = $_SESSION['address'];
$customerId = $_SESSION['customerId'];
$paymentMode = $_SESSION['paymentMode'];

$sql = "INSERT INTO booking (categoryId,finalPrice,customerName,address,customerId,paymentMode,status) VALUES ('$categoryId','$finalPrice','$customerName','$address','$customerId','$paymentMode','success')";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$sql = "select b.customerId,b.customerName,c.name,c.station1,c.destination,c.type,c.price,c.startTime,c.endTime,c.startDate,c.endDate,b.status,b.bookingTime from category c join booking b on b.categoryId=c.id where b.categoryId=c.id and b.customerId='$customerId'";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$result = $mysqli->query($sql);

// print_r($result);



 if ($result->num_rows > 0){?><h2>
  <h1> Booking is confirmed!!!  </h1> 
  <center>Booking History</center></h2><?php
     	while($row = $result->fetch_assoc()) {

 	?>
     
 	<table class="table table-dark table-striped table-md">
 			<tr>
                 <th>customerId</th>
 				<th>customerName</th>
 				<th>mode</th>
 				<th>from</th>
                 <th>to</th>
                 <th>type</th>
                 <th>price</th>
                 <th>starttime</th>
                 <th>endtime</th>
                 <th>startDate</th>
                 <th>endDate</th>
                 <th>status</th>
                 <th>bookingTime</th>
                 <th></th>
 			</tr>
 		<tr>
 			<td><?php echo  $row["customerId"]  ?></td>
 			<td><?php echo $row["customerName"]  ?></td>
 			<td><?php echo $row["name"]  ?></td>
 			<td><?php echo $row["station1"]  ?></td>
             <td><?php echo $row["destination"]  ?></td>
             <td><?php echo $row["type"]  ?></td>
             <td><?php echo $row["price"]  ?></td>
             <td><?php echo $row["startTime"]  ?></td>
             <td><?php echo $row["endTime"]  ?></td>
             <td><?php echo $row["startDate"]  ?></td>
             <td><?php echo $row["endDate"]  ?></td>
             <td><?php echo $row["status"]  ?></td>
             <td><?php echo $row["bookingTime"]  ?></td>
             <!-- <td><form action="book_3.php" method="post" class="text-center">
<input type="submit" value="Book Now" class=" btn btn-primary btn-lg col-6">
</form></td> -->
 		</tr>
	    
  		<?php
  	}
  	?>
  	</table>
  	<?php
 }}
 if(isset($_POST["cardsave"])){
  $cardNumber=$_POST['cardNumber'];
  $nameOnCard=$_POST['nameOnCard'];
  $expiryDate=$_POST['expiryDate'];
  $securityCode=$_POST['securityCode'];
  $sql = "INSERT INTO carddetails (customerId,cardNumber,nameOnCard,expiryDate,securityCode) VALUES ('$customerId','$cardNumber','$nameOnCard','$expiryDate','$securityCode')";

if ($mysqli->query($sql) === FALSE) {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
 }
?>


    <form action="booking.php" method="post"><br><br>
    <input type="submit" value="go Back to Home page!" class=" btn btn-secondary btn-lg col-12">
</form> 
</div>   
  </body>
</html>

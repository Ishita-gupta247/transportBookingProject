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
session_start();
 $categoryId =$_SESSION['categoryId'] ;
 $finalPrice=$_SESSION['finalPrice'] ;
 $_SESSION['categoryId']=$categoryId ;
 $_SESSION['finalPrice']=$finalPrice ;
$customerName = $_POST['customerName'];
$address = $_POST['address'];
$customerId = $_POST['customerId'];
$paymentMode = $_POST['paymentMode'];
$_SESSION['customerName']=$customerName  ;
$_SESSION['address']=$address ;
$_SESSION['customerId']=$customerId ;
$_SESSION['paymentMode']=$paymentMode ;

 if ($paymentMode=="credit"||$paymentMode=="debit"){
    if(isset($_POST["usecard"])){
    $customerId=$_POST["customerId"];
    $sql = "select * from carddetails where customerId='$customerId'";
    
    if ($mysqli->query($sql) === FALSE) {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    
    $result = $mysqli->query($sql);
    
    // print_r($result);
    
    
    
     if ($result->num_rows > 0){
             while($row = $result->fetch_assoc()) {
    
         ?>
    <center>
    <h1> Payment Details!!</h1><br><br>
     <div class="container" >
    <br><br><br>
    <div class="contaier-2">
          <form action="book_5.php" method="post">
            Card Number:<br><input type="number" name="cardNumber"value=<?php echo  htmlspecialchars($row["cardNumber"]);?>> <br><br>
            Nameoncard:<br><input type="text" name="nameOnCard" value=<?php echo  htmlspecialchars($row["nameOnCard"]);?>> <br><br>
            Expiry Date:&nbsp&nbsp&nbsp&nbsp&nbsp Security code:
            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="date" name="expiryDate" value=<?php echo  htmlspecialchars($row["expiryDate"]);?>>&nbsp
           <input type="password" name="securityCode"> <br><br>
           
              </center>
              <div class="row"><center>
        <input type="submit" name="save" value="pay" class=" btn btn-success btn-lg col-6">
        </center>      </div>
  
</form>
<!-- price: <input type="number" name="name"><br>
<br>
discount: <input type="number" name="name"><br>
<br>
finalPrice: <input type="text" name="name"><br>
<br> -->

        <!-- <div action="sales_1.php" class=" btn btn-primary btn-lg"></div> -->
        <?php
   }}
else{
    echo "No card with ".$customerId." customer id was stored before:(";
}}else{
   ?>
   <center>
    <h1> Payment Details!!</h1><br><br>
     <div class="container" >
    <br><br><br>
    <div class="contaier-2">
          <form action="book_5.php" method="post">
            Card Number:<br><input type="number" name="cardNumber"> <br><br>
            Nameoncard:<br><input type="text" name="nameOnCard"> <br><br>
            Expiry Date:&nbsp&nbsp&nbsp&nbsp&nbsp Security code:
            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="date" name="expiryDate">&nbsp
           <input type="password" name="securityCode"> <br><br>
           <input type="checkbox" id="cardsave" name="cardsave" value="cardsave" >
<label for="cardsave"> save the card</label><br>
<div class="row"><center>
        <input type="submit" value="pay" class=" btn btn-success btn-lg col-6">
        </center>      </div>
  
</form>
              </center>

   <?php } ?>
        
<form action="booking.php" method="post" class="text-center">
    <br><br>
<input type="submit" value="cancel" class=" btn btn-primary btn-lg col-6">
</form>
    
  	<?php
 }
 else if($paymentMode=="upi"){?>
 <h1> Payment Details!!</h1><br><br>
     <div class="container" >
    <br><br><br>
    <div class="contaier-2">
          <form action="book_5.php" method="post">
          <label for="upi" >Select upi:</label>
              <select name="upi" id="upi"  required>
                  
                <option value="" selected disabled>select mode</option>
             
                <option value="payTM">payTM</option>
                <option value="googlePay">googlePay</option>
                <option value="phonePe">phonePe</option>
                <option value="bhim">BHIM</option>
            </select><br><br>
            Enter your upi id:<br><input type="text" name="upiId" placeholder="upi id">
              <select name="upi" id="upi"  required>
                  
                <option value="" selected disabled>@upi</option>
             
                <option value="ybl">@ybl</option>
                <option value="hdfc">@okhdfcbank</option>
                <option value="icic">@okicic</option>
                <option value="paytm">@paytm</option>
            </select> <br><br>
<!-- price: <input type="number" name="name"><br>
<br>
discount: <input type="number" name="name"><br>
<br>
finalPrice: <input type="text" name="name"><br>
<br> -->

        <!-- <div action="sales_1.php" class=" btn btn-primary btn-lg"></div> -->
    
        <dyv class="row"><center>
        <input type="submit" value="verify and pay" class=" btn btn-success btn-lg col-6">
        </center>      </div>
  
</form>
<form action="booking.php" method="post" class="text-center">
    <br><br>
<input type="submit" value="cancel" class=" btn btn-primary btn-lg col-6">
</form>
    
 
 
 
 <?php}
 else{?><br><br><center><h1><?php
     echo "Invalid payment mode!!";?></h1><?php
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

</body>
</html> 

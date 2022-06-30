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
    body {background-color: hsla(240,100%,85%);
    }
    #container-2{border-style:"solid";
    }
    </style>
    <div class="container" >
    <br><br><br>
    <div class="contaier-2">
          <form action="book_4.php" method="post">
              <?php 
              $mysqli = new mysqli("localhost","root","","bookingproject");

              // Check connection
              if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();

              }
             session_start();
             $id =$_SESSION['categoryId'] ;
             $price=$_SESSION['finalPrice'] ;
            
             $_SESSION['categoryId']=$id ;
             $_SESSION['finalPrice']=$price ;
            // session_start();
            // $name= $_SESSION['name'] ;
            // $_SESSION['categoryId']=$id ;
            // $_SESSION['finalPrice']=$price ;
             ?><center><h1> Booking Details..proceed to payment!!</h1>
            <br><br>
customer Name:<input type="text" name="customerName"> <br>
<br>
address:<input type="text" name="address"> <br>
<br>


<?php
    $s2="select * from booking order by id desc limit 1 ";
    $result = $mysqli->query($s2);
   $row = $result->fetch_assoc();?>
 
CustomerId:<input type="number" name="customerId" value=<?php echo  htmlspecialchars($row["customerId"]+1);?>  id="cno" ><br>
<br>
<label for="paymentMode" >paymentMode:</label>
              <select name="paymentMode" id="paymentMode"  required>
                  
                <option value="" selected disabled>select mode</option>
             
                <option value="credit">credit card</option>
                <option value="debit">debit card</option>
                <option value="upi">upi</option>
               
            </select><br><br>
 <input type="checkbox" id="usecard" name="usecard" value="usecard" >
<label for="usecard"> use the previous card</label><br>
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
    <form action="booking.php" method="post"><br><br>
    <input type="submit" value="goBack" class=" btn btn-primary btn-lg col-12">
</form> 
</div>   
  </body>
</html>

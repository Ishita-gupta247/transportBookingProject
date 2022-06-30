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
    <h1> <center> Find Your Ideal conveyance!</h1>
    <br><br><br>
    <div class="contaier-2">
          <form action="book_1.php" method="post">
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
            
<!-- price: <input type="number" name="name"><br>
<br>
discount: <input type="number" name="name"><br>
<br>
finalPrice: <input type="text" name="name"><br>
<br> -->

        <!-- <div action="sales_1.php" class=" btn btn-primary btn-lg"></div> -->
        <div class="row">
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

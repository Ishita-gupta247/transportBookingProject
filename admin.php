<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> Admin</title>
<style>   

    
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color:hsla(240,100%,85%);
}  
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] ,input[type=number]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,input[type=number]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.reset {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.reset, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .reset, .signupbtn {
    width: 100%;
  }
} 
</style>   
</head>    
<body>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     
    <form action="admin_2.php"  method="post" style="border:1px solid #ccc">
  <div class="container">
  <center> <h1> Admin Login Form </h1> </center>  

    <label for="adminName"><b>AdminName</b></label>
    <input type="text" placeholder="Enter name" name="adminName" required>
    <label for="adminId"><b>AdminId</b></label>
    <input type="number" placeholder="Enter Id" name="adminId" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
<!-- 
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->

    <!-- <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->

    
    <div class="clearfix">
      <button type="reset" class="reset">Reset</button>
      <button type="submit" class="signupbtn" value="submit">Sign In</button>
    </div>
  </div>
</form>
<form action="booking.php" method="post" class="text-center">
    <br><br>
<input type="submit" value="Go back to Home!" class=" btn btn-primary btn-lg col-6">
</form>  
</body>     
</html>  
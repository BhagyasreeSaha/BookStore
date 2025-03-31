<?php
include('method.php');
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="rname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username"  name="r_uname"required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email"  name="r_email"required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="r_phno" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password"  name="r_password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password"  name="r_cpassword" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="male" id="dot-1">
          <input type="radio" name="gender" value="female" id="dot-2">
          <input type="radio" name="gender" value="others" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register"name="register">
        </div>
        <div class="signup-link">
            Have you login? <a href="login.php">Login now</a>
               </div>
      </form>
    </div>
  </div>
<?php
 if(isset($_POST['register']))
 {
  $password=$_POST['r_password'];
  $cpassword=$_POST['r_cpassword'];
      if($cpassword == $password)
      {
          //  echo"this is working".$_POST['r_uname'];
            $res=registerUser($_POST);
              if($res == 1)
              {
                header('location:login.php');
              }
              else{
                    echo"Details are incorrect";
                  }
      }
      else{
            echo"Password invalid";
          }

 }
?>
</body>
</html>
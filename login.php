<?php
include('method.php');
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Popup Login Form Design | CodingNepal</title>
      <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">View Form</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Login Form
            </div>
            <form action="" method="post">
               <div class="data">
                  <label>Email or Phone</label>
                  <input type="text" required name="email">
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" name="password" required>
               </div>
               <div class="forgot-pass">
                  <a href="#">Forgot Password?</a>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" name="submit">login</button>
               </div>
               <div class="signup-link">
                  Not a member? <a href="register.php">Signup now</a>
               </div>
            </form>
         </div>
      </div>
      
<?php
         if(isset($_POST['submit']))
         {
            
            $res=loginUser($_POST);
            
            $records= mysqli_num_rows($res);
            echo $records;
            if($records==1)
            {
               session_start();
               $_SESSION['email'] = $_POST['email'];
               header('location:dashboard.php');
            }
            else{
                 echo"Incorrect email and password";
            }

         }
      ?>

   </body>
</html>
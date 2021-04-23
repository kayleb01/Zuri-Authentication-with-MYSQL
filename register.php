<?php
 require_once('func/inc.php');
 
 if (isset($_SESSION['email'])) {
   header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Zuri's Register</title>
</head>
<body>
<div class="card-register">
   <form action="func/user_register.php" method="POST">
      <h2 class="title">Register new account</h2>
      
      <p class="or"><span></span></p>
        <?php
       
        if ($_SESSION['errors']) {
           foreach($_SESSION['errors'] as $error){
            echo '<div class="errors">'. $error .'</div>';
           }
           unset($_SESSION['errors']);
        }
        ?>
      <div class="email-login">
         <label for="email"> <b>Fullname</b></label>
         <input type="text" placeholder="Enter Fullname" name="fullname" >

         <label for="email"> <b>Email</b></label>
         <input type="email" placeholder="Enter Email" name="email" >

         <label for="address"> <b>Address</b></label>
        <textarea name="address" id="address" placeholder="Enter your address" cols="20" rows="5"></textarea>

         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" >

         <label for="psw"><b>Confirm password</b></label>
         <input type="password" placeholder="Enter Password" name="password_confirm" >
      </div>
      <button class="cta-btn" type="submit">Register</button>
      <p class="subtitle">Do you have an account? <a href="login.php"> Login</a></p>
   </form>
</div>
</body>
</html>
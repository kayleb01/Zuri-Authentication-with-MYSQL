<?php
require_once('func/inc.php');

if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Zuri's|Recover password</title>
</head>
<body>
<div class="card">
<?php
    if (isset($_SESSION['errors'])) {
        foreach($_SESSION['errors'] as $error){
        echo '<div class="errors">'. $error .'</div>';
        }
        unset($_SESSION['errors']);
    }
?>
   <form  action="func/reset_password.php" method="POST">
      <div class="email-login">
      <label for="confirm-password"> <b>Current password</b></label>
        <input type="password" placeholder="Current password" name="current-password" required autofocus>
        <label for="confirm-password"> <b>Confirm password</b></label>
        <input type="password" placeholder="New password" name="new-password" required>
        <label for="confirm-password"> <b>Confirm password</b></label>
        <input type="password" placeholder="Confirm password" name="confirm-password" required >
      </div>
      <button class="cta-btn">Reset password</button>
     <span class="go-back forget-pass" onclick="window.history.back()">Go back</span>
   </form>
</div>
</body>
</html>
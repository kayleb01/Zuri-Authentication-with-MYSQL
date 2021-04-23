<?php
session_start();
require('func/editCourse.php');


if (!isset($_SESSION['email'])) {
    $_SESSION['error'] ="You must be logged in to proceed";
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
    <title>Zuri's Login with mysql</title>
</head>
<body>
<header class="header">
        <nav class="nav-bar">
        <span> <a href="index.php" style="color:#fff">ZURI LOGIN APP</a> </span>
            <ul class="nav-bar__list">
                <li class=nav-bar__list__item> <a class="button" href="reset-password.php"> Reset password </a></li>
            </ul>
            <span>
               
                <a class="button" href="logout.php"> Logout </a>
            </span>
        </nav>
    </header>
    <main class="main">
        <div class="list-description">
            <form action="func/updateCourse.php" method="POST">
                <div class="email-login" style="width: 500px;">
                <?php
                    if (isset($_SESSION['errors'])) {
                        foreach($_SESSION['errors'] as $error){
                         echo '<div class="errors">'. $error .'</div>';
                        }
                        unset($_SESSION['errors']);
                     }
                ?>
                <label for="email"> <b>Course Title</b></label>
                <input type="text" name="title"  value="<?php echo $course['title'] ?>" autofocus>
                <label for="psw"><b>description</b></label>
                <textarea name="description" id="20" cols="20" rows="10"><?php echo$course['description']?></textarea>
            </div>
            <input type="hidden" name="course_id" value="<?php echo $course_id?>">
            <button class="cta-btn" type="submit">Add course</button>
        </form>
       
        </div>
    </main>
</body>
</html>
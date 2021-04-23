<?php
session_start();

require('func/get_courses.php');

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
                <li class=nav-bar__list__item> <a class="button" href="add_course.php">Add course</a></li>
            </ul>
            <span>
               
                <a class="button" href="logout.php"> Logout </a>
            </span>
        </nav>
    </header>
    <main class="main">
        <div class="list-description">
            
                <?php
                    if (isset($_SESSION['errors'])) {
                        foreach($_SESSION['errors'] as $error){
                         echo '<div class="errors">'. $error .'</div>';
                        }
                        unset($_SESSION['errors']);
                     }
                     if (isset($_SESSION['message'])) {
                        echo "<div class='success'>". $_SESSION['message']. "</div>";
                     }
                     unset($_SESSION['message']);
                ?>
               <table class="market">
                <thead>
                    <tr>
                        <th> #</th>
                        <th>title </th>
                        <th> description </th>
                        <th> edit </th>
                        <th> Delete</th>
                    </tr>
                   
                    
                </thead>
                <tbody>
                
                
                    <?php while( $res = $query->fetch_assoc()){?>
                     <tr>
                        <td><?php echo $res['id']?></td>
                        <td><?php echo $res['title']?></td> 
                        <td><?php echo $res['description']?></td>
                        <td><a href="edit_course.php?id=<?php echo $res['id']?>">edit</a></td>
                        <td><a href="func/deleteCourse.php?id=<?php echo $res['id']?>">delete</a></td>

                     </tr>
                    <?php }?>
               
                </tbody>
            </table> 
       
        </div>
    </main>
</body>
</html>
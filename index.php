<?php
session_start();

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
            <span class="bars"></span>
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
       <?php
        if (isset($_SESSION['message'])) {
           echo "<div class='success'>". $_SESSION['message']. "</div>";
        }
        unset($_SESSION['message']);
        ?>
            <h1> Courses </h1>
            <p> <a href="add_course.php"> Add Course</a> </p>
            <hr>
            <p> <a href="view_course.php"> View Courses</a> </p>
            <hr>

            <section class="list-description--item">
                
            </section>

            <section class="list-description--item">
                
            </section>

            <section class="list-description--item">
              
            <!-- </section>
            <table class="market">
                <thead>
                    <tr>
                        <th> Market</th>
                        <th> Price </th>
                        <th> Avg. </th>
                        <th> Change </th>
                        <th> Date </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Primary
                            <span class="arrow-up"></span>
                        </td>
                        <td> £912.16</td>
                        <td> £559.94</td>
                        <td> 0.41 </td>
                        <td> 28 Oct 2018 </td>

                    </tr>

                    <tr>
                        <td> Secondary
                            <span class="arrow-down"></span>
                        </td>
                        <td> £438.47</td>
                        <td> £302.73</td>
                        <td> 0.75</td>
                        <td> 21 Dec 2018 </td>

                    </tr>

                    <tr>
                        <td> Tertiary
                            <span class="arrow-down"></span>
                        </td>
                        <td> £932.62</td>
                        <td> £614.01</td>
                        <td> 0.08</td>
                        <td> 03 Aug 2018 </td>

                    </tr>
                    <tr>
                        <td> Quartenary
                            <span class="arrow-up"></span>
                        </td>
                        <td> £332.37</td>
                        <td> £204.74</td>
                        <td> 0.79 </td>
                        <td> 19 Sep 2018 </td>

                    </tr>
                    <tr>
                        <td> Quinary
                            <span class="arrow-down"></span>
                        </td>
                        <td> £466.8 </td>
                        <td> £154.24</td>
                        <td> 0.96 </td>
                        <td> 21 Mar 2018 </td>

                    </tr>
                </tbody>
            </table> -->
        </div>
        <aside class="side-bar">
       
        </aside>
    </main>




</body>
</html>
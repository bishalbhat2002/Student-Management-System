<?php
       session_start();

       if(!isset($_SESSION['username'])){
              header('location:../../login.php');
              exit();
       }
       require_once "../../config/absolutePath.php";              // Include absolute File to header.php file, so we can use absolute path (through BASE_URL constant variable defined in absolutePath.php file)

       # This block of code is executed only when user clicks on Logout button. This destroys the session.
       if(isset($_GET['logout'])){
              session_unset();
              session_destroy();
              header("location: ".BASE_URL."/login.php?success= Logout Successfull...");
              exit();
       }

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Student Management System</title>
       
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/CSS/utilityClasses.css">                  <!-- Utility Classes linked first because we might overwrite some classes in Style.css file, It contains classes with most used properties. --> 
       <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/CSS/style.css">                           <!-- Style.css added for general Styling -->
       <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/CSS/mediaqueries.css">                    <!-- Mediaqueries.css file contains code required for making the website responsive -->
</head>
<body>
       <div class="logo"><a href="<?php echo BASE_URL; ?>">SMS</a></div>
       <div id="hambuger-icon"><img src="<?php echo BASE_URL;?>/public/assets/images/hambuger.png" alt="Hamburger icon"></div>
       <nav class="navbar">

              <?php if($_SESSION['role']==='admin'){ ?>
                     <ul>
                            <li><a href="<?php echo BASE_URL.'/src/admin/dashboard.php'; ?>">Dashboard</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/semesters.php'; ?>">Semesters</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/students.php'; ?>">Students</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/teachers.php'; ?>">Teachers</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/courses.php'; ?>">Courses</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/notices.php'; ?>">Notices</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/admin/result.php'; ?>">Result</a></li>
                     </ul>
              <?php } ?>

              <?php if($_SESSION['role']==='teacher'){ ?>
                     <ul>
                            <li><a href="<?php echo BASE_URL.'/src/teacher/dashboard.php'; ?>">Dashboard</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/teacher/courses.php'; ?>">Courses</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/teacher/attendance.php'; ?>">Attendance</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/teacher/study-materials.php'; ?>">Study Materials</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/teacher/notices.php'; ?>">Notices</a></li>
                     </ul>
              <?php } ?>

              <?php if($_SESSION['role']==='student'){ ?>
                     <ul>
                            <li><a href="<?php echo BASE_URL.'/src/student/dashboard.php'; ?>">Dashboard</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/student/view-fees.php'; ?>">View Fees</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/student/courses.php'; ?>">Courses</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/student/study-materials.php'; ?>">Study Materials</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/student/notices.php'; ?>">Notices</a></li>
                            <li><a href="<?php echo BASE_URL.'/src/student/result.php'; ?>">Result</a></li>
                     </ul>
              <?php } ?>

              <div class="logout">
                     <a href="?logout=true" name="logout">Log out</a>
              </div>
       </nav>



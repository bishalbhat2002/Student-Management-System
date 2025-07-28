<?php

       session_start();
       $username;
       
       if($_SESSION['role'] === "admin")
              $username = 'aid';
       else if($_SESSION['role'] === "teacher")
              $username = 'tid';
       else if($_SESSION['role'] === "student")
              $username = 'regdNo';
              
       if(!isset($_SESSION[$username])){
              header('location:login.php?');
              exit();
       }
       $success_msg = "Login Successfull...";
       if($_SESSION['role'] === 'admin'){
              header("location: src/admin/dashboard.php?success= {$success_msg}"); 
              exit();
       }
  
       if($_SESSION['role'] === 'teacher'){
              header("location: src/teacher/dashboard.php?success= {$success_msg}"); 
              exit();
       }
       if($_SESSION['role'] === 'student'){
              header("location: src/student/dashboard.php?success= {$success_msg}"); 
              exit();
       }
       
                     
              
?>

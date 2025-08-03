<?php
session_start();
if ($_SERVER['REQUEST_METHOD']==="POST") {
       if (!empty($_POST['role']) && !empty($_POST['username']) && !empty($_POST['password'])) {
              $role = $_POST['role'];
              $username = $_POST['username'];
              $password = $_POST['password'];
       
              // Admin, Teacher, and Student Table - all have different primary Keys (aid, tid, and regdNo.). So, to search on all 3 table based on role at once, we use if else condition.. 
              $table;
              $usernameColumn;
              if($role === "admin"){
                     $table = "admin";
                     $usernameColumn = "aid";
              }
              else if($role === "teacher"){
                     $table = "teacher";
                     $usernameColumn = "tid";
              }
              else{
                     $table = "student";
                     $usernameColumn = "regdNo";
              }

              require_once "config/db_connect.php";
              try {
                     $sql = "SELECT * from {$table} 
                             where {$usernameColumn} = '{$_POST['username']}' AND password = '{$_POST['password']}'";
                     $result = $conn->query($sql);
              } catch (Exception $e) {
                     die("<b>Error: </b>" . $e->getMessage());
              }

              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     
                     $_SESSION[$usernameColumn] = $row[$usernameColumn];
                     $_SESSION['role'] = $role;
                     $_SESSION['name'] = $row['name'];
                     if($role === "student"){
                            $_SESSION['semId'] = $row['semId']; 
                     }
                     header("Location: index.php");
                     exit();
              } else {
                     header("location:login.php?error= Wrong Username or Password...");
                     exit();
              }
       } else {
              header("location:login.php?error= User must fill all fields");
              exit();
       }
}else{
       header("location:login.php");
       exit();
}

?>
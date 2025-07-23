<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Login page</title>
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<<<<<<< HEAD
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

=======
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
       <link rel="stylesheet" href="CSS/loginStyle.css">
</head>

<body>
       <nav><a href="">SMS</a></nav>

       <form action="" method="POST" name="loginForm" enctype="multipart/form-data">
              <div class="login">
                     <h1>Login</h1>
              </div>
              <div>
                     <label for="role">As:</label> <br>
                     <select name="role" id="role">
                            <option value="" selected disabled>select role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                     </select> <br>
              </div>

              <div>
                     <label for="username">Username</label> <br>
                     <input type="text" name="username" id="username"> <br>
              </div>

              <div>
                     <label for="password"> Password</label> <br>
                     <input type="password" name="password" id="password"> <br>
              </div>

              <button id="login-btn" name="login">login</button>
       </form>

       <?php
<<<<<<< HEAD
              require_once "includes/show_message.php";
=======
       if (isset($_GET['error'])) {
              echo "<div id='error'>Error: {$_GET['error']}</div>";
       }
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
       ?>
</body>
<script>
       window.onload = function hide() {
<<<<<<< HEAD
              const error = document.getElementById('error-message'); // Fetches Error Element
              const success = document.getElementById('success-message'); // Fetches Success Element
              if (error) {
                     setTimeout(() => { // Hides Error Element after 3 Seconds
                            error.style.display = "none";
                     }, 3000);
              }
              if (success) {
                     setTimeout(() => { // Hides Success Element after 3 Seconds
                            success.style.display = "none";
                     }, 3000);
              }

=======
              let element = document.getElementById('error');
              if (element) {
                     setTimeout(() => {
                            element.classList.add('hide');
                     }, 1000);
              }
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
       }
</script>

</html>

<?php
if (isset($_POST['login'])) {
       if (isset($_POST['role']) && isset($_POST['username']) && isset($_POST['password'])) {
<<<<<<< HEAD

=======
              print_r($_POST);
              //       exit();
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
              $role = $_POST['role'];
              $username = $_POST['username'];
              $password = $_POST['password'];

              require_once "config/db_config.php";
              try {
                     $sql = "SELECT username, password, role from users 
                                   --  where username = '$username' AND password = '$password' AND role = '$role'
                                     where username = '{$_POST['username']}' AND password = '{$_POST['password']}' AND role = '{$_POST['role']}'";
                     $result = $conn->query($sql);
              } catch (Exception $e) {
                     die("<b>Error: </b>" . $e->getMessage());
              }

              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     session_start();
                     $_SESSION['username'] = $row['username'];
                     $_SESSION['password'] = $row['password'];
                     $_SESSION['role'] = $row['role'];

<<<<<<< HEAD
                     header("location: index.php?success= Login Successfull...");
                     exit();
              } else {
                     header("location:login.php?error= Wrong Username or Password...");
=======

                     header("location: index.php");
                     exit();
              } else {
                     header("location:login.php?error=  Wrong Username or Password...");
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
                     exit();
              }
       } else {
              header("location:login.php?error= User must fill all fields");
              exit();
       }
}

<<<<<<< HEAD
=======

>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Login page</title>
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <link rel="stylesheet" href="public/CSS/loginStyle.css">
</head>

<body>
       <nav><a href="">SMS</a></nav>

       <form action="loginProcess.php" method="POST" name="loginForm">
              <div class="login">
                     <h1>Login</h1>
              </div>
              <div>
                     <label for="role">As:</label> <br>
                     <select name="role" id="role" required>
                            <option value="" selected disabled>select role</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                     </select> <br>
              </div>

              <div>
                     <label for="username">Username</label> <br>
                     <input type="text" name="username" id="username" value=""> <br>
              </div>

              <div>
                     <label for="password"> Password</label> <br>
                     <input type="password" name="password" id="password" value=""> <br>
              </div>

              <button id="login-btn" name="login" value="login">login</button>
       </form>

       <?php
              require_once "src/includes/show_message.php";
       ?>
</body>
<script>
       window.onload = function hide() {
              const error = document.getElementById('error-message');  // Fetches Error Element
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

       }
</script>
</html>

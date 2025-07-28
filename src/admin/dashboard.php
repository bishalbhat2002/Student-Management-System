<?php require_once "../includes/header.php"; ?>


<!-- Code for Reset Password Options -->
<?php
if (isset($_GET['password-reset'])) {
?>
       <div class="center-fdc main">
              <a href="?password-reset-student" class="reset-btn large">Reset Student Password</a> <br><br>
              <a href="?password-reset-teacher" class="reset-btn large">Reset Teacher Password</a>
       </div>


       <!-- Code for entering Student Registration Number for Password Reset -->
<?php
} else if (isset($_GET['password-reset-student'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">Student Password Reset</h1>
              <form action="?password-reset-regd-no" name="resetStudentPassword" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="regdNo">Registration No.:</label> <br>
                            <input type="text" name="regdNo" id="regdNo">
                     </div>
                     <div class="center">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>

       <!-- Code for Student Password Reset -->
<?php
} else if (isset($_GET['password-reset-regd-no'])) {
?>
       <?php
       if (empty($_POST['regdNo'])) {
              header('location: ?password-reset-student&error=Registration No. field is required');
              exit();
       }
       try {
              // Check if the student exists
              $regdNo = $_POST['regdNo'];
              $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
              $result = $conn->query($sql);
              if (!$result->num_rows > 0) {
                     header('location: ?password-reset-student&error=No Student Found for provided RegdNo');
                     exit();
              }
              $row = $result->fetch_assoc();
       } catch (Exception $e) {
              header("location: ?password-reset-student&error=" . $e->getMessage());
              exit();
       }
       ?>
       <div class="center-fdct main">
              <h1 class="heading">Student Password Reset</h1>
              <form action="processes/resetPassword.php?message=student" name="resetStudentPassword" method="post" enctype="multipart/form-data" class="form-expan">

                     <div class="col-span-2 center mb-2">
                            <img src="<?= BASE_URL . $row['photo'] ?>" alt="Photo" class="image">
                     </div>
                     <div>
                            <label for="regdNo">Registration No.:</label> <br>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $row['regdNo'] ?>" readonly>
                     </div>
                     <div>
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" value="<?= $row['name'] ?>" readonly>
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label> <br>
                            <input type="text" name="gender" value="<?= $row['gender'] ?>" readonly>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label> <br>
                            <input type="text" name="faculty" value="<?= $row['faculty'] ?>" readonly>
                     </div>
                     <div>
                            <label for="mobile">Mobile:</label> <br>
                            <input type="number" name="mobile" value="<?= $row['phone'] ?>" readonly>
                     </div>
                     <div>
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" value="<?= $row['email'] ?>" readonly>
                     </div>
                     <div class="col-span-2">
                            <label for="address">Adress:</label> <br>
                            <input type="text" name="address" value="<?= $row['address'] ?>" readonly>
                     </div> <br>

                     <div class="center btn-container">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>


       <!-- Code for entering Teacher ID for password REset -->
<?php
} else if (isset($_GET['password-reset-teacher'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">Teacher Password Reset</h1>
              <form action="?password-reset-tid" name="resetStudentPassword" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="tid">Teacher ID:</label> <br>
                            <input type="text" name="tid" for="tid" value="">
                     </div>
                     <div class="center">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>


       <!-- Code for Resetting Teacher Password-->
<?php
} else if (isset($_GET['password-reset-tid'])) {
?>
       <?php
       if (empty($_POST['tid'])) {
              header('location: ?password-reset-teacher&error= Teacher ID field is required');
              exit();
       }
       try {
              // Check if the Teacher exists
              $tid = $_POST['tid'];
              $sql = "SELECT * FROM teacher WHERE tid = '$tid'";
              $result = $conn->query($sql);
              if (!$result->num_rows > 0) {
                     header('location: ?password-reset-teacher&error=No Teacher Found for provided Teacher ID.');
                     exit();
              }
              $row = $result->fetch_assoc();
       } catch (Exception $e) {
              header("location: ?password-reset-teacher&error=" . $e->getMessage());
              exit();
       }
       ?>
       <div class="center-fdct main">
              <h1 class="heading">Teacher Password Reset</h1>
              <form action="processes/resetPassword.php?message=teacher" name="resetTeacherPassword" method="post" enctype="multipart/form-data" class="form-expan">

                     <div class="col-span-2 center mb-2">
                            <img src="<?= BASE_URL . $row['photo'] ?>" alt="Photo" class="image">
                     </div>
                     <div>
                            <label for="tid">Teacher ID:</label> <br>
                            <input type="text" name="tid" for="tid" value="<?= $row['tid'] ?>">
                     </div>
                     <div>
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" value="<?= $row['name'] ?>">
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label> <br>
                            <input type="text" name="gender" value="<?= $row['gender'] ?>">
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label> <br>
                            <input type="text" name="faculty" readonly value="<?= $row['faculty'] ?>">
                     </div>
                     <div>
                            <label for="phone">Phone:</label> <br>
                            <input type="number" name="phone" value="<?= $row['phone'] ?>" max="">
                     </div>
                     <div>
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" value="<?= $row['email'] ?>">
                     </div>
                     <div class="col-span-2">
                            <label for="address">Adress:</label> <br>
                            <input type="text" name="address" value="<?= $row['address'] ?>">
                     </div>
                     <div class="center btn-container">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>



       <!-- Code for Updating Admin Info-->
<?php
} else if (isset($_GET['update-admin-info'])) {
?>
       <?php

       try {
              // Retrieve data from admin table
              $sql = "SELECT * FROM admin WHERE aid = '{$_SESSION['aid']}'";
              $result = $conn->query($sql);
              if ($result->num_rows === 0) {
                     throw new Exception("Admin not found");
              }
              $row = $result->fetch_assoc();
       } catch (Exception $e) {
              die("<br><b>Error:</b> " . $e->getMessage());
       }

       ?>
       <div class="center-fdct main">
              <h1 class="heading">Update Admin Info</h1>
              <?php
                     $errors = $_SESSION['formErrors'] ?? [];
                     $oldData = $_SESSION['oldData'] ?? [];
                     unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>

              <form action="processes/updateAdminInfo.php" name="updateAdminInfo" method="post" enctype="multipart/form-data" id="updateAdminForm" class="form-expan small-input-field">

                     <div class="col-span-2 center mb-2">
                            <img src="<?=$row['photo']?>" alt="Photo" class="image">
                     </div>

                     <div>
                            <label for="aid">Admin ID:</label> <br>
                            <input type="text" name="aid" id="aid" value="<?= $oldData['aid'] ?? $row['aid']?>" readonly>
                            <p id="aidError" class="error"><?= $errors['aid'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" id="name" value="<?= $oldData['name'] ?? $row['name']?>">
                            <p id="nameError" class="error"><?= $errors['name'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="dob">DOB:</label> <br>
                            <input type="date" name="dob" id="dob" value="<?= $oldData['dob'] ?? $row['dob']?>">
                            <p id="dobError" class="error"><?= $errors['dob'] ?? "" ?></p>
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label> <br>
                            <input type="radio" name="gender" value="male" <?= ($row['gender']==='male') ? "checked": ""?>>Male
                            <input type="radio" name="gender" value="female" <?= ($row['gender']==='female') ? "checked": ""?>>Female
                            <p id="genderError" class="error"></p>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label> <br>
                            <input type="text" name="faculty" id="faculty" value="<?= $oldData['faculty'] ?? $row['faculty']?>">
                            <p id="facultyError" class="error"><?= $errors['faculty'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="phone">Mobile:</label> <br>
                            <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? $row['phone']?>">
                            <p id="phoneError" class="error"><?= $errors['phone'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" id="email" value="<?= $oldData['email'] ?? $row['email']?>">
                            <p id="emailError" class="error"><?= $errors['email'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="address">Adress:</label> <br>
                            <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? $row['address']?>">
                            <p id="addressError" class="error"><?= $errors['address'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="photo">Update Photo:</label> <br>
                            <input type="file" name="photo" id="photo">
                            <p id="photoError" class="error"><?= $oldData['photo'] ?? $errors['photo'] ?? "" ?></p>
                     </div>

                     <div class="center btn-container">
                            <input type="submit" value="Save Changes" class="update-btn">
                     </div>
              </form>
       </div>


       <!-- Code for Updating Admin Password-->
<?php
} else if (isset($_GET['update-admin-password'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Update Admin Password</h1>
              <form action="processes/updatePassword.php" name="updateAdminPassword" method="post" enctype="multipart/form-data" class="form" id="updatePasswordForm">
                     <input type="hidden" name="aid" value="<?= $_SESSION['aid'] ?>">
                     <div>
                            <label for="currentPassword">current Password:</label> <br>
                            <input type="text" name="currentPassword" id="currentPassword" value="">
                            <p id="currentPasswordError" class="error"></p>
                     </div>
                     <div>
                            <label for="newPassword">New Password:</label> <br>
                            <input type="text" name="newPassword" id="newPassword" value="">
                            <p id="newPasswordError" class="error"></p>
                     </div>
                     <div>
                            <label for="confirmNewPassword">Confirm New Password:</label> <br>
                            <input type="text" name="confirmNewPassword" id="confirmNewPassword" value="">
                            <p id="confirmNewPasswordError" class="error"></p>
                     </div>
                     <div class="center btn-container">
                            <input type="submit" value="Save Changes" class="update-btn">
                     </div>
              </form>
       </div>


       <!-- Code To display Admin Dashboard... -->
<?php
} else {
?>
       <div class="center-fdct main">
              <div class="admin-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Admin !!</h1>
                            <h3><?= $_SESSION['name'] ?></h3>
                     </div>

                     <div class="student-status">
                            <div class="total-info">
                                   <div class="total-students"><img src="<?php echo BASE_URL . '/public/assets/images/student.png' ?>" alt="student icon">250 <br>Total Students</div>
                                   <div class="total-teachers"><img src="<?php echo BASE_URL . '/public/assets/images/hat.png' ?>" alt="hat icon">250 <br>Total Teachers</div>
                            </div>

                            <div class="semester-info">
                                   <div class="sem-container">
                                          <div class="semester-box">1st <br>Sem</div>
                                          <p>95 Students</p>
                                   </div>
                                   <div class="sem-container">
                                          <div class="semester-box">3rd <br>Sem</div>
                                          <p>43 Students</p>
                                   </div>
                                   <div class="sem-container">
                                          <div class="semester-box">5th <br>Sem</div>
                                          <p>38 Students</p>
                                   </div>
                                   <div class="sem-container">
                                          <div class="semester-box">6th <br>Sem</div>
                                          <p>32 Students</p>
                                   </div>
                                   <div class="sem-container">
                                          <div class="semester-box">8th <br>Sem</div>
                                          <p>28 Students</p>
                                   </div>
                            </div>

                            <div class="more-options">
                                   <div class="tadmission-container">
                                          <div class="tadmission-box">Total <br>Admissions</div>
                                          <p>1000 <br>Students</p>
                                   </div>
                                   <div><a href="?password-reset" class="resetPassword-btn">Reset Password</a></div>
                            </div>
                     </div>

                     <div class="admin-info">
                            <?php
                            try {
                                   // Retrieve data from admin table
                                   $sql = "SELECT * FROM admin WHERE aid = '{$_SESSION['aid']}'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          throw new Exception("Admin not found");
                                   }
                                   $row = $result->fetch_assoc();
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                            ?>
                            <div>
                                   <img src="<?= $row['photo']?>" alt="profile picture">
                            </div>
                            <p>Name: <?= $row['name'] ?></p>
                            <p>Gender: <?= $row['gender'] ?></p>
                            <p>DOB: <?= $row['dob'] ?></p>
                            <p>Faculty: <?= $row['faculty'] ?></p>
                            <p>Mobile: <?= $row['phone'] ?></p>
                            <p>Email: <?= $row['email'] ?></p>
                            <p>Address: <?= $row['address'] ?></p>
                            <p>username: <?= $row['aid'] ?></p>
                            <p class="center"><a href="?update-admin-info" class="update-btn">update Info</a>
                                   <a href="?update-admin-password" class="update-btn">update Password</a>
                            </p>
                     </div>
              </div>
       </div>

<?php
}
?>

<?php require_once "../includes/footer.php"; ?>
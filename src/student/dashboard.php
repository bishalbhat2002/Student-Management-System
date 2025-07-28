<?php require_once "../includes/header.php"; ?>

<!-- Code for Updating Student Info-->
<?php
if (isset($_GET['update-student-info'])) {
?>
       <?php
       try {
              // Retrieve data from student table
              $sql = "SELECT * FROM student WHERE regdNo = '{$_SESSION['regdNo']}'";
              $result = $conn->query($sql);
              if ($result->num_rows === 0) {
                     throw new Exception("Student not found");
              }
              $row = $result->fetch_assoc();
       } catch (Exception $e) {
              die("<br><b>Error:</b> " . $e->getMessage());
       }
       ?>

       <div class="main center-fdct">
              <h1 class="heading">Update Student Info</h1>
              <?php
                     $errors = $_SESSION['formErrors'] ?? [];
                     $oldData = $_SESSION['oldData'] ?? [];
                     unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>
              <form action="processes/updateStudentInfo.php" method="post" name="Update-student-form" enctype="multipart/form-data" class="form-expan small-input-field" id="updateStudentForm">

                     <div class="col-span-2 center mb-2">
                            <img src="<?= $row['photo']?>" alt="Photo" class="image small-image">
                     </div>

                     <input type="hidden" name="regdNo" value="<?= $row['regdNo'] ?>">

                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $oldData['name'] ?? $row['name']?>">
                            <p id="nameError" class="error"><?= $errors['name'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label>
                            <input type="text" name="faculty" id="faculty" value="<?= $row['faculty']?>" readonly>
                            <p class="error" id="facultyError"><?= $errors['faculty'] ?? "" ?></p>
                     </div> 
                     <div>
                            <label for="dob">DOB:</label>
                            <input type="date" name="dob" id="dob" value="<?= $oldData['dob'] ?? $row['dob']?>">
                            <p id="dobError" class="error"><?= $errors['dob'] ?? "" ?></p>

                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" name="gender" value="male" <?= ($row['gender'] === 'male') ? 'checked': '' ?>>Male
                            <input type="radio" name="gender" value="female" <?= ($row['gender'] === 'female') ? 'checked': '' ?>>Female
                            <p id="genderError" class="error"><?= $errors['gender'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? $row['phone']?>">
                            <p id="phoneError" class="error"><?= $errors['phone'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?= $oldData['email'] ?? $row['email']?>">
                            <p id="emailError" class="error"><?= $errors['email'] ?? "" ?></p>
                     </div>
                     <div class="col-span-2">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? $row['address']?>">
                            <p id="addressError" class="error"><?= $errors['address'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="parentName">Parent Name:</label>
                            <input type="text" name="parentName" id="parentName" value="<?= $oldData['parentName'] ?? $row['parentName']?>">
                            <p id="parentNameError" class="error"><?= $errors['parentName'] ?? "" ?></p>
                     </div>    
                     <div>
                            <label for="parentPhone">Parent Phone:</label>
                            <input type="text" name="parentPhone" id="parentPhone" value="<?= $oldData['parentPhone'] ?? $row['parentPhone']?>">
                            <p id="parentPhoneError" class="error"><?= $errors['parentPhone'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="photo">Upload Photo:</label>
                            <input type="file" name="photo" id="photo">
                            <p id="photoError" class="error"><?= $errors['photo'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="viewResults">View Results:</label> <br>
                            <div id="view-results">
                                   <a href="<?= $row['seeResult']?>" class="view-btn btn">SEE Result</a>
                                   <a href="<?= $row['nebResult']?>" class="view-btn btn">NEB Result</a>
                            </div>
                     </div>
                     <div>
                            <label for="seeResult">SEE Result:</label>
                            <input type="file" name="seeResult" id="seeResult">
                            <p id="seeResultError" class="error"><?= $errors['seeResult'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="neb-result">NEB Result:</label>
                            <input type="file" name="nebResult" id="nebResult">
                            <p id="nebResultError" class="error"><?= $errors['nebResult'] ?? "" ?></p>
                     </div>

                     <div class="col-span-2 center">
                            <button class="save-btn btn large mt-1">Save Changes</button>
                     </div>
              </form>
       </div>


<!-- Code for Updating Student Password-->
<?php
} else if (isset($_GET['update-student-password'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Update Password</h1>
              <form action="processes/updatePassword.php" name="update-student-password-from" method="post" enctype="multipart/form-data" class="form" id="updatePasswordForm">
                     <input type="hidden" name="regdNo" value="<?= $_SESSION['regdNo']?>">
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


<!-- Code To display Student Dashboard... -->
<?php
} else {
?>
       <div class="center-fdct main">
              <div class="student-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Student !!</h1>
                            <h3><?= $_SESSION['name'] ?></h3>
                     </div>

                     <div class="student-status ">
                            <div class="short-info">
                                   <div class="total-attendance">39 / 45 <br>Attendance</div>
                                   <div class="semester">6th <br>semester</div>
                            </div>

                            <div class="dashboard-notices box student-notices">
                                   <div class="caption">Students Notice</div>
                                   <a href="?snv-id" class="notice">
                                          <div class="notice-number">1</div>
                                          <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                          <p class="notice-date">2082/01/04</p>
                                   </a>
                                   <a href="?snv-id" class="notice">
                                          <div class="notice-number">1</div>
                                          <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                          <p class="notice-date">2082/01/04</p>
                                   </a>
                                   <a href="?snv-id" class="notice">
                                          <div class="notice-number">1</div>
                                          <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                          <p class="notice-date">2082/01/04</p>
                                   </a>
                                   <a href="?snv-id" class="notice">
                                          <div class="notice-number">1</div>
                                          <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                          <p class="notice-date">2082/01/04</p>
                                   </a>
                                   <a href="?snv-id" class="notice">
                                          <div class="notice-number">1</div>
                                          <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                          <p class="notice-date">2082/01/04</p>
                                   </a>
                            </div>
                     </div>

                     <div class="student-info">
                            <?php
                                   try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM student WHERE regdNo = '{$_SESSION['regdNo']}'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          throw new Exception("Student not found");
                                   }
                                   $row = $result->fetch_assoc();
                                   }
                                   catch(Exception $e){
                                          die("<br><b>Error:</b> ". $e->getMessage());
                                   }
                            ?>
                            <div>
                                   <img src="<?= $row['photo']?>" alt="profile picture">
                            </div>
                            <p>Name: <?= $row['name']?></p>
                            <p>Gender: <?= $row['gender']?></p>
                            <p>DOB: <?= $row['dob']?></p>
                            <p>Faculty: <?= $row['faculty']?></p>
                            <p>Phone: <?= $row['phone']?></p>
                            <p>Email: <?= $row['email']?></p>
                            <p>Address: <?= $row['address']?></p>
                            <p>Regd. No: <?= $row['regdNo']?></p>
                            <p class="center"><a href="?update-student-info" class="update-btn">update Info</a>
                                   <a href="?update-student-password" class="update-btn">update Password</a>
                            </p>

                     </div>
              </div>
       </div>
<?php
}
?>

<?php require_once "../includes/footer.php"; ?>



<?php

<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php" ?>

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
                                   <a href="<?= $row['seeResult']?>" target="blank" class="view-btn btn">SEE Result</a>
                                   <a href="<?= $row['nebResult']?>" target="blank" class="view-btn btn">NEB Result</a>
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

<!-- Code to View Student Notice -->
<?php
       }else if(isset($_GET['nid'])){
?>
              <div class="center-fdct main">

              <?php
                     if(empty($_GET['nid'])){
                            header("location: dashboard.php?error=Notice id is missing.");
                            exit(); 
                     }   
                     
                     try {
                            $table = "student";  
                            $nid = $_GET['nid'];  
                            
                            $sql = "SELECT * FROM {$table}notice WHERE nid = '$nid'";
                            
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            if ($result->num_rows === 0) {
                                   header('location: dashboard.php?error=No Notice Found.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
              
              ?>
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading"><?= $row['title']?></h2>
                            <p> 
                                   <?= $row['nbody']?>
                            </p>

                            <?php
                                   if(!empty($row['photo'])){
                            ?>
                                          <div class="center">
                                                 <a href="<?= $row['photo'] ?>"  download="Notice-sample-name" title="Click to download Notice">
                                                        <img src="<?= $row['photo'] ?>" alt="Notice Image" class="notice-image">
                                                 </a>
                                          </div>
                            <?php
                                   }
                            ?>
                     <div class="center"><?= $row['date'] ?></div>

                     </div>
                    
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

                     <?php      
                            $semId = $_SESSION['semId'];
                            $semName = getSemName($semId);
                            $attendanceArray = getAttendance($semId, $_SESSION['regdNo']);
                            $attendance = "-";
                            if($attendanceArray !== ""){
                                   $attendance = $attendanceArray['present'] ." / ". $attendanceArray['total'];
                            }
                     ?>     

                     <div class="student-status ">
                            <div class="short-info">
                                   <div class="total-attendance"><?= $attendance ?><br>Attendance</div>
                                   <div class="semester"><?= $semName ?> <br>semester</div>
                            </div>

                            <div class="dashboard-notices box student-notices" id="stay-bottom">
                                   <div class="caption">Students Notice</div>
                            <?php      
                                   try {
                                          // Retrieve data from studentNotice table
                                          $sql = "SELECT * FROM studentNotice order by nid desc";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                                 while($row = $result->fetch_assoc()){
                            ?>     
                                                        <a href="?nid=<?= $row['nid'] ?>" class="notice" >
                                                               <div class="notice-number"><?= $row['nid'] ?></div>
                                                               <div class="notice-title"><?= $row['title'] ?></div>
                                                               <p class="notice-date"><?= $row['date'] ?></p>
                                                        </a>
                            <?php
                                                 }
                                          }else{
                                                 echo "<h2 class='no-notice-found'>No Notices Found!!!</h2>";
                                          }
                                   } catch (Exception $e) {
                                          echo "<br><b>Error:</b> " . $e->getMessage();
                                   }
                            ?> 
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
                            <p>DOB: <?= $row['dob']?></p>
                            <p>Gender: <?= ucfirst($row['gender']) ?></p>
                            <p>Batch: <?= $row['batch']?></p>
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


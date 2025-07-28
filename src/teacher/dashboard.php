<?php require_once "../includes/header.php"; ?>

<!-- Code for Updating Teacher Info-->
<?php
       if(isset($_GET['update-teacher-info'])){           
?>
       <?php

              try {
                     // Retrieve data from admin table
                     $sql = "SELECT * FROM teacher WHERE tid = '{$_SESSION['tid']}'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            throw new Exception("Teacher not found");
                     }
                     $row = $result->fetch_assoc();
              } catch (Exception $e) {
                     die("<br><b>Error:</b> " . $e->getMessage());
              }
                     $errors = $_SESSION['formErrors'] ?? [];
                     $oldData = $_SESSION['oldData'] ?? [];
                     unset($_SESSION['formErrors'], $_SESSION['oldData']);

       ?>
               <div class="main center-fdct">
                     <h1 class="heading">Update Info</h1>
                     <form action="processes/updateTeacherInfo.php" method="post" name="update-teacher-form" enctype="multipart/form-data" id="updateTeacherForm" class="form-expan mb-1">
                            <div class="col-span-2 center mb-2">
                                   <img src="<?= $row['photo']?>" alt="Photo" class="image">
                            </div>

                                   <input type="hidden" name="tid" id="tid" value="<?= $row['tid']?>" readonly>                 
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name" value="<?= $oldData['name'] ?? $row['name']?>">
                                   <p id="nameError" class="error"><?= $errors['name'] ?? ''?></p>
                            </div>
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="date" name="dob" id="dob" value="<?= $oldData['dob'] ?? $row['dob']?>">
                                   <p id="dobError" class="error"><?= $errors['dob']  ?? ''?></p>
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="radio" name="gender" value="male" <?= ($row['gender'] === 'male')?'checked':'';?>>Male
                                   <input type="radio" name="gender" value="female" <?= ($row['gender'] === 'female')?'checked':'';?>>Female
                                   <p id="genderError" class="error"></p>
                            </div>  
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty" value="<?= $oldData['faculty'] ?? $row['faculty']?>">
                                   <p id="facultyError" class="error"><?= $errors['faculty']  ?? ''?></p>
                            </div>                        
                            <div>
                                   <label for="phone">Phone:</label>
                                   <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? $row['phone']?>">
                                   <p id="phoneError" class="error"><?= $errors['phone']  ?? ''?></p>
                            </div>
                            <div>
                                   <label for="email">Email:</label>
                                   <input type="email" name="email" id="email" value="<?= $oldData['email'] ?? $row['email']?>">
                                   <p id="emailError" class="error"><?= $errors['email']  ?? ''?></p>
                            </div>                      
                            <div>
                                   <label for="academic-qualification">Academic Qualifications:</label>
                                   <input type="text" name="academicQualification" id="academicQualification" value="<?= $oldData['academicQualification'] ?? $row['academicQualification']?>">
                                   <p id="academicQualificationError" class="error"><?= $errors['academicQualification']  ?? ''?></p>
                            </div>
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? $row['address']?>">
                                   <p id="addressError" class="error"><?= $errors['address']  ?? ''?></p>
                            </div>
                            <div>
                                   <label for="photo">Update Photo:</label>
                                   <input type="file" name="photo" id="photo" value="<?= $oldData['photo'] ?? $row['photo']?>">
                                   <p id="photoError" class="error"><?= $errors['photo']  ?? ''?></p>
                            </div>

                            <div class="col-span-2 center">
                                   <button class="save-btn btn large mt-2">Save Changes</button>
                            </div>    
                     </form>
              </div>



<!-- Code for Updating Teacher Password-->
<?php
       }else if(isset($_GET['update-teacher-password'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Update Password</h1>
                     <form action="processes/updatePassword.php" name="updateTeacherPassword" method="post" enctype="multipart/form-data" class="form" id="updatePasswordForm">
                            <input type="hidden" name="tid" value="<?= $_SESSION['tid']?>">
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


<!-- Code To display Teacher Dashboard... -->
<?php
       }else{
?> 
              <div class="center-fdct main">
              <div class="teacher-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Teacher !!</h1>
                            <h3><?= $_SESSION['name'] ?></h3>    
                     </div>

                     <div class="student-status">
                            <div class="total-info">
                                   <div class="total-students">
                                          <img src="<?php echo BASE_URL;?>/public/assets/images/student.png" alt="student icon">250 <br>Total Students
                                   </div>
                                   <div class="total-teachers">
                                          <img src="<?php echo BASE_URL;?>/public/assets/images/hat.png" alt="hat icon">250 <br>Total Teachers
                                   </div>
                            </div>

                            <div class="semester-info">
                                   <div class="sem-container"><div class="semester-box">1st <br>Sem</div> <p>95 Students</p></div>
                                   <div class="sem-container"><div class="semester-box">3rd <br>Sem</div> <p>43 Students</p></div>
                                   <div class="sem-container"><div class="semester-box">5th <br>Sem</div> <p>38 Students</p></div>
                                   <div class="sem-container"><div class="semester-box">6th <br>Sem</div> <p>32 Students</p></div>
                                   <div class="sem-container"><div class="semester-box">8th <br>Sem</div> <p>28 Students</p></div>
                            </div>

                            <div class="more-options">
                                   <div class="tadmission-container"><div class="tadmission-box">Total <br>Admissions</div> <p>1000 <br>Students</p></div>
                            </div>
                     </div>

                     <div class="teacher-info">
                            <?php
                                   try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM teacher WHERE tid = '{$_SESSION['tid']}'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          throw new Exception("Teacher not found");
                                   }
                                   $row = $result->fetch_assoc();
                                   }
                                   catch(Exception $e){
                                          die("<br><b>Error:</b> ". $e->getMessage());
                                   }
                            ?>

                            <div>
                                   <img src="<?= $row['photo'] ?>"; alt="profile picture">
                            </div>
                                   <p>Name: <?= $row['name'] ?></p>
                                   <p>Gender: <?= $row['gender'] ?></p>
                                   <p>DOB: <?= $row['dob'] ?></p>
                                   <p>Faculty: <?= $row['faculty'] ?></p>
                                   <p>Phone: <?= $row['phone'] ?></p>
                                   <p>Email: <?= $row['email'] ?></p>
                                   <p>Address: <?= $row['address'] ?></p>
                                   <p>Teacher ID: <?= $row['tid'] ?></p>
                                   <p class="center"><a href="?update-teacher-info" class="update-btn">update Info</a>
                                   <a href="?update-teacher-password" class="update-btn">update Password</a></p>
                            </div>
              </div>
              </div>

<?php
       }
?>

<?php require_once "../includes/footer.php"; ?>



<?php require_once "../../includes/header.php"; ?>


<!-- Code for Reset Password Options -->
<?php
       if(isset($_GET['password-reset'])){
?>
              <div class="center-fdc main"> 
                     <a href="?password-reset-student" class="reset-btn large">Reset Student Password</a> <br><br>
                     <a href="?password-reset-teacher" class="reset-btn large">Reset Teacher Password</a>
              </div>
    

<!-- Code for entering Student Registration Number for Password Reset -->
<?php
       }else if(isset($_GET['password-reset-student'])){           
?>
              <div class="center-fdct main">  
              <h1 class="heading">Student Password Reset</h1>
              <form action="?password-reset-regd-no" name="resetStudentPassword" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="regd-no">Registration No.:</label> <br>
                            <input type="text" name="regd-no" id="regd-no">
                     </div>
                     <div class="center">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>

<!-- Code for Student Password Reset -->
<?php
       }else if(isset($_GET['password-reset-regd-no'])){           
?>

              <div class="center-fdct main"> 
              <h1 class="heading">Student Password Reset</h1>
              <form action="?" name="resetStudentPassword" method="post" enctype="multipart/form-data" class="form-expan">
                     
                     <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div> 
                     <div>
                            <label for="regd-no">Registration No.:</label> <br>
                            <input type="text" name="regd-no" id="regd-no" value="">
                     </div>
                     <div>
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" value="">
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label> <br>
                            <input type="text" name="gender" value="male">
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label> <br>
                            <input type="text" name="faculty" readonly value="">
                     </div>                     
                     <div>
                            <label for="mobile">Mobile:</label> <br>
                            <input type="number" name="mobile" value="" max="">
                     </div>
                     <div>
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" value="">
                     </div>
                     <div class="col-span-2">
                            <label for="address">Adress:</label> <br>
                            <input type="text" name="address" value="">
                     </div> <br>

                     <div class="center btn-container">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>


<!-- Code for entering Teacher ID for password REset -->
<?php
       }else if(isset($_GET['password-reset-teacher'])){           
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
       }else if(isset($_GET['password-reset-tid'])){           
?>
       <div class="center-fdct main"> 
              <h1 class="heading">Teacher Password Reset</h1>
              <form action="" name="resetTeacherPassword" method="post" enctype="multipart/form-data" class="form-expan">
                     
                     <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div> 
                     <div>
                            <label for="tid">Teacher ID:</label> <br>
                            <input type="text" name="tid" for="tid" value="">
                     </div>
                     <div>
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" value="">
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label> <br>
                            <input type="text" name="gender" value="male">
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label> <br>
                            <input type="text" name="faculty" readonly value="">
                     </div>                     
                     <div>
                            <label for="mobile">Mobile:</label> <br>
                            <input type="number" name="mobile" value="" max="">
                     </div>
                     <div>
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" value="">
                     </div>
                     <div class="col-span-2">
                            <label for="address">Adress:</label> <br>
                            <input type="text" name="address" value="">
                     </div>
                     <div class="center btn-container">
                            <input type="submit" value="Reset Password" class="reset-btn">
                     </div>
              </form>
       </div>



<!-- Code for Updating Admin Info-->
<?php
       }else if(isset($_GET['update-admin-info'])){           
?>
              <div class="center-fdct main">
                     <h1 class="heading">Update Admin Info</h1>
                     <form action="" name="updateAdminInfo" method="post" enctype="multipart/form-data" class="form-expan small-input-field">
                            <input type="hidden" name="adminId" value="">

                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>

                            <div>
                                   <label for="username">Username:</label> <br>
                                   <input type="text" name="username" value="">
                            </div>
                            <div>
                                   <label for="name">Name:</label> <br>
                                   <input type="text" name="name" value="">
                            </div>
                            <div>
                                   <label for="dob">DOB:</label> <br>
                                   <input type="date" name="dob" value="" max="">
                            </div>
                            <div class="gender">
                                   <label for="gender">Gender:</label> <br>
                                   <input type="radio" name="gender" value="male">Male
                                   <input type="radio" name="gender" value="female">Female
                            </div>
                            <div>
                                   <label for="faculty">Faculty:</label> <br>
                                   <input type="text" name="faculty" readonly value="">
                            </div>
                            <div>
                                   <label for="phone">Mobile:</label> <br>
                                   <input type="number" name="phone" value="">
                            </div>
                            <div>
                                   <label for="email">Email:</label> <br>
                                   <input type="email" name="email" value="">
                            </div>

                            <div>
                                   <label for="address">Adress:</label> <br>
                                   <input type="text" name="address" value="">
                            </div>
                            <div>
                                   <label for="photo">Update Photo:</label> <br>
                                   <input type="file" name="photo" id="photo" value="">
                            </div>

                            <div class="center btn-container">
                                   <input type="submit" value="Save Changes" class="update-btn">
                            </div>
                     </form>
              </div>


<!-- Code for Updating Admin Password-->
<?php
       }else if(isset($_GET['update-admin-password'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Update Admin Password</h1>
                     <form action="" name="updateAdminPassword" method="post" enctype="multipart/form-data" class="form">
                            <input type="hidden" name="adminId" value="">
                            <div>
                                   <label for="currentPassword">current Password:</label> <br>
                                   <input type="text" name="currentPassword" value="">
                            </div>
                            <div>
                                   <label for="newPassword">New Password:</label> <br>
                                   <input type="text" name="newPassword" value="">
                            </div>
                            <div>
                                   <label for="confirmNewPassword">Confirm New Password:</label> <br>
                                   <input type="text" name="confirmNewPassword" value="">
                            </div>
                            <div class="center btn-container">
                                   <input type="submit" value="Save Changes" class="update-btn">
                            </div>
                     </form>
              </div>


<!-- Code To display Admin Dashboard... -->
<?php
       }else{
?> 
              <div class="center-fdct main">
              <div class="admin-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Admin !!</h1>
                            <h3>Bishal Bhat</h3>    
                     </div>

                     <div class="student-status">
                            <div class="total-info">
                                   <div class="total-students"><img src="<?php echo BASE_URL.'/assets/images/student.png'?>" alt="student icon">250 <br>Total Students</div>
                                   <div class="total-teachers"><img src="<?php echo BASE_URL.'/assets/images/hat.png'?>" alt="hat icon">250 <br>Total Teachers</div>
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
                                   <div><a href="?password-reset" class="resetPassword-btn">Reset Password</a></div>
                            </div>
                     </div>

                     <div class="admin-info">
                            <div>
                                   <img src= <?php echo BASE_URL."/assets/images/image.jpg"; ?> alt="profile picture">
                            </div>
                                   <p>Name: Bishal Bhat</p>
                                   <p>Gender: Male</p>
                                   <p>DOB: 2000-12-19</p>
                                   <p>Faculty: Department of CSIT</p>
                                   <p>Mobile: 98XXXXX</p>
                                   <p>Email: bishalbhat2002@gmail.com</p>
                                   <p>Address: Mahendranagar, kanchanpur</p>
                                   <p>username: admin-1001</p>
                                   <p class="center"><a href="?update-admin-info" class="update-btn">update Info</a>
                                   <a href="?update-admin-password" class="update-btn">update Password</a></p>
                            </div>
              </div>
              </div>

<?php
       }
?>

<?php require_once "../../includes/footer.php"; ?>
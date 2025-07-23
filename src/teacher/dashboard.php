<?php require_once "../../includes/header.php"; ?>

<!-- Code for Updating Teacher Info-->
<?php
       if(isset($_GET['update-teacher-info'])){           
?>
               <div class="main center-fdct">
                     <h1 class="heading">Update Info</h1>
                     <form action="?" method="post" name="update-teacher-form" enctype="multipart/form-data" class="form-expan mb-1">
                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="date" name="dob" id="dob">
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="radio" name="gender" value="male">Male
                                   <input type="radio" name="gender" value="female">Female
                            </div>  
                            <div>
                                   <label for="phone">Phone:</label>
                                   <input type="number" name="phone" id="phone">
                            </div>
                            <div>
                                   <label for="email">Email:</label>
                                   <input type="email" name="email" id="email">
                            </div>                      
                            <div>
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications">
                            </div>
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div>
                            <div>
                                   <label for="photo">Update Photo:</label>
                                   <input type="file" name="photo" id="photo">
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
                     <form action="" name="updateTeacherPassword" method="post" enctype="multipart/form-data" class="form">
                            <input type="hidden" name="tid" value="">
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


<!-- Code To display Teacher Dashboard... -->
<?php
       }else{
?> 
              <div class="center-fdct main">
              <div class="teacher-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Teacher !!</h1>
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
                            </div>
                     </div>

                     <div class="teacher-info">
                            <div>
                                   <img src= <?php echo BASE_URL."/assets/images/image.jpg"; ?> alt="profile picture">
                            </div>
                                   <p>Name: Bishal Bhat</p>
                                   <p>Gender: Male</p>
                                   <p>DOB: 2000-12-19</p>
                                   <p>Faculty: Department of CSIT</p>
                                   <p>Phone: 98XXXXX</p>
                                   <p>Email: bishalbhat2002@gmail.com</p>
                                   <p>Address: Mahendranagar, kanchanpur</p>
                                   <p>Teacher ID: 1001</p>
                                   <p class="center"><a href="?update-teacher-info" class="update-btn">update Info</a>
                                   <a href="?update-teacher-password" class="update-btn">update Password</a></p>
                            </div>
              </div>
              </div>

<?php
       }
?>

<?php require_once "../../includes/footer.php"; ?>



<?php require_once "../../includes/header.php"; ?>

<!-- Code for Updating Student Info-->
<?php
if (isset($_GET['update-student-info'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Update Student Info</h1>
              <form action="?" method="post" name="Update-student-form" enctype="multipart/form-data" class="form-expan small-input-field">

                     <div class="col-span-2 center mb-2">
                            <img src="../../assets/images/image.jpg" alt="Photo" class="image small-image">
                     </div>

                     <input type="hidden" name="regd-no" value="">

                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name">
                     </div>
                     <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty" readonly>
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
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address">
                     </div>
                     <div>
                            <label for="parent-phone">Parent Phone:</label>
                            <input type="number" name="parent-phone" id="parent-phone">
                     </div>

                     <div>
                            <label for="photo">Upload Photo:</label>
                            <input type="file" name="photo" id="photo">
                     </div>
                     <div>
                            <label for="view-results">View Results:</label> <br>
                            <div id="view-results">
                                   <a href="" class="view-btn btn">SEE Result</a>
                                   <a href="" class="view-btn btn">NEB Result</a>
                            </div>
                     </div>
                     <div>
                            <label for="see-result">SEE Result:</label>
                            <input type="file" name="see-result" id="see-result">
                     </div>
                     <div>
                            <label for="neb-result">NEB Result:</label>
                            <input type="file" name="neb-result" id="neb-result">
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
              <form action="" name="update-student-password-from" method="post" enctype="multipart/form-data" class="form">
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


<!-- Code To display Student Dashboard... -->
<?php
} else {
?>
       <div class="center-fdct main">
              <div class="student-dashboard center-fdct">
                     <div class="greet">
                            <h1>Welcome Student !!</h1>
                            <h3>Bishal Bhat</h3>
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
                            <div>
                                   <img src=<?php echo BASE_URL . "/assets/images/image.jpg"; ?> alt="profile picture">
                            </div>
                            <p>Name: Bishal Bhat</p>
                            <p>Gender: Male</p>
                            <p>DOB: 2000-12-19</p>
                            <p>Faculty: Department of CSIT</p>
                            <p>Phone: 98XXXXX</p>
                            <p>Email: bishalbhat2002@gmail.com</p>
                            <p>Address: Mahendranagar, kanchanpur</p>
                            <p>Regd. No: SC-4524-434-43</p>
                            <p class="center"><a href="?update-student-info" class="update-btn">update Info</a>
                                   <a href="?update-student-password" class="update-btn">update Password</a>
                            </p>
                     </div>
              </div>
       </div>
<?php
}
?>

<?php require_once "../../includes/footer.php"; ?>
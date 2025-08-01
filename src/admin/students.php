<?php require_once "../includes/header.php"; ?>


<!-- Code for Adding New Student -->
<?php
if (isset($_GET['add-student'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Add New Student</h1>
              <?php
              $errors = $_SESSION['formErrors'] ?? [];
              $oldData = $_SESSION['oldData'] ?? [];
              unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>
              <form action="processes/studentProcess.php?operation=add-student" method="post" name="add-student-form" enctype="multipart/form-data" class="form-expan" id="addStudentForm">
                     <div>
                            <label for="regdNo">Registration No:</label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $oldData['regdNo'] ?? '' ?>">
                            <p class="error" id="regdNoError"><?= $errors['regdNo'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" name="batch" id="batch" min="2067" max="<?= (date("Y") + 57) ?>" value="<?= $oldData['batch'] ?? '' ?>">
                            <p class="error" id="batchError"><?= $errors['batch'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $oldData['name'] ?? '' ?>">
                            <p class="error" id="nameError"><?= $errors['name'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label>
                            <input type="text" name="faculty" id="faculty" value="<?= $oldData['faculty'] ?? '' ?>">
                            <p class="error" id="facultyError"><?= $errors['faculty'] ?? "" ?></p>
                     </div>

                     <div class="gender">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" name="gender" value="male" <?= (isset($oldData['gender']) && $oldData['gender'] === 'male') ? 'checked' : '' ?>>Male
                            <input type="radio" name="gender" value="female" <?= (isset($oldData['gender']) && $oldData['gender'] === 'female') ? 'checked' : '' ?>>Female
                            <p class="error" id="genderError"><?= $errors['gender'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? '' ?>">
                            <p class="error" id="phoneError"><?= $errors['phone'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?= $oldData['email'] ?? '' ?>">
                            <p class="error" id="emailError"><?= $errors['email'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="dob">DOB:</label>
                            <input type="date" name="dob" id="dob" value="<?= $oldData['dob'] ?? '' ?>">
                            <p class="error" id="dobError"><?= $errors['dob'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? '' ?>">
                            <p class="error" id="addressError"><?= $errors['address'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="parentName">Parent Name:</label>
                            <input type="text" name="parentName" id="parentName" value="<?= $oldData['parentName'] ?? '' ?>">
                            <p class="error" id="parentNameError"><?= $errors['parentName'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="parentPhone">Parent Phone:</label>
                            <input type="text" name="parentPhone" id="parentPhone" value="<?= $oldData['parentPhone'] ?? '' ?>">
                            <p class="error" id="parentPhoneError"><?= $errors['parentPhone'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="photo">Upload Photo:</label>
                            <input type="file" name="photo" id="photo">
                            <p class="error" id="photoError"><?= $errors['photo'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="seeResult">SEE Result:</label>
                            <input type="file" name="seeResult" id="seeResult">
                            <p class="error" id="seeResultError"><?= $errors['seeResult'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="nebResult">NEB Result:</label>
                            <input type="file" name="nebResult" id="nebResult">
                            <p class="error" id="nebResultError"><?= $errors['nebResult'] ?? "" ?></p>
                     </div>

                     <div class="col-span-2 center">
                            <button class="add-btn btn large mt-1">Add Student</button>
                     </div>


              </form>

       </div>


       <!-- Code for Viewing All Students -->
<?php
} else if (isset($_GET['view-all-students'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Students</h1>
             
             <?php
                            try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM student LEFT JOIN semester ON student.semId = semester.semId ORDER BY regdNo DESC";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: students.php?view-student&error=No student Found to show...');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
              ?>

              <div class="box-cover center">
                     <table>
                            <thead class="top-sticky">
                                   <tr>
                                          <th title="Registration Number">Regd. No</th>
                                          <th>Name</th>
                                          <th>Semester</th>
                                          <th>Phone</th>
                                          <th>Address</th>
                                          <th title="Actions you can Perfrom">Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                            <?php
                                   while($row = $result->fetch_assoc()){
                            ?>
                                   <tr>
                                          <td class="tac v-align-m"><?= $row['regdNo']?></td>
                                          <td><?= $row['name']?></td>
                                          <td class="tac v-align-m"><?= $row['semName'] ?? '1st'?> Semester</td>
                                          <td><?= $row['phone']?></td>
                                          <td><?= $row['address']?></td>
                                          <td>
                                                 <a href="?view-student-regdNo=<?= $row['regdNo']?>" class="view-btn">View</a>
                                                 <a href="?edit-student-regdNo=<?= $row['regdNo']?>" class="edit-btn">Edit</a>
                                                 <a href="?delete-student-regdNo=<?= $row['regdNo']?>" onclick="return confirmDelete('<?= $row['regdNo']?>')" class="delete-btn">Delete</a>
                                          </td>
                                   </tr>
                            <?php
                                   }
                            ?>

                            </tbody>
                     </table>

              </div>
       </div>


       <!-- Code for entering Registration Number for viewing Student -->
<?php
} else if (isset($_GET['view-student'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Student</h1>
              <form action="" method="get" name="student-regd-form" class="form">
                     <div>
                            <label for="view-student-regdNo">Enter Regd. No:</label>
                            <input type="text" name="view-student-regdNo" id="view-student-regdNo">
                     </div>
                     <div class="center">
                            <input type="submit" value="View Student" class="view-btn">
                     </div>

                     <hr class="mt-1">

                     <div class="center mt-2">
                            <a href="?view-all-students" class="view-btn">View all Students</a>
                     </div>
              </form>
       </div>


       <!-- Code for viewing Student -->
<?php
} else if (isset($_GET['view-student-regdNo'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Student</h1>

              <?php
              if ($_SERVER['REQUEST_METHOD'] === "GET") {
                     $regdNo = trim($_GET['view-student-regdNo']);
                     try {
                            // Retrieve data from student table
                            $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                            $result = $conn->query($sql);
                            if ($result->num_rows === 0) {
                                   header('location: students.php?view-student&error=No student found with provided RegdNo.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     $row = $result->fetch_assoc();
              }
              ?>

              <form action="?edit-student-regdNo" method="post" name="view-student-form" enctype="multipart/form-data" class="form-expan small-input-field">

                     <div class="col-span-2 center mb-2">
                            <img src="<?= $row['photo'] ?>" alt="Photo" class="image">
                     </div>
                     <div>
                            <label for="regdNo">Registration No:</label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $row['regdNo'] ?>" readonly>
                     </div>
                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $row['name'] ?>" readonly>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label>
                            <input type="text" name="faculty" id="faculty" value="<?= $row['faculty'] ?>" readonly>
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label><br>
                            <input type="text" name="gender" id="gender" value="<?= $row['gender'] ?>" readonly>
                     </div>
                     <div>
                            <label for="dob">DOB:</label>
                            <input type="date" name="dob" id="dob" value="<?= $row['dob'] ?>" readonly>
                     </div>
                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $row['phone'] ?>" readonly>
                     </div>
                     <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?= $row['email'] ?>" readonly>
                     </div>
                     <div>
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $row['address'] ?>" readonly>
                     </div>
                     <div>
                            <label for="parentName">Parent Name:</label>
                            <input type="text" name="parentName" id="parentName" value="<?= $row['parentName'] ?>" readonly>
                     </div>
                     <div>
                            <label for="parent-phone">Parent Phone:</label>
                            <input type="number" name="parent-phone" id="parent-phone" value="<?= $row['parentPhone'] ?>" readonly>
                     </div>
                     <div>
                            <label for="view-results">View Results:</label> <br>
                            <div id="view-results">
                                   <a href="<?= $row['seeResult'] ?>" target="_blank" class="view-btn btn">SEE Result</a>
                                   <a href="<?= $row['nebResult'] ?>" target="_blank" class="view-btn btn">NEB Result</a>
                            </div>
                     </div>
                     <div class="col-span-2 center">
                            <a href="?edit-student-regdNo=<?= $row['regdNo'] ?>" class="edit-btn btn large mt-1">Edit Student</a>
                     </div>
              </form>

       </div>

       <!-- Code for entering Student Registration Number for Editing Details -->
<?php
} else if (isset($_GET['edit-student'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Edit Student</h1>
              <form action="" name="student-regd-form" class="form">
                     <div>
                            <label for="edit-student-regdNo">Enter Regd. No:</label>
                            <input type="text" name="edit-student-regdNo" id="edit-student-regdNo">
                     </div>
                     <div class="center">
                            <input type="submit" value="Find Student" class="edit-btn">
                     </div>
              </form>
       </div>



       <!-- Code for editing Student -->
<?php
} else if (isset($_GET['edit-student-regdNo'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Edit Student</h1>

              <?php
              if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['edit-student-regdNo'])) {
                     $regdNo = trim($_GET['edit-student-regdNo']);
                     try {
                            // Retrieve data from student table
                            $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                            $result = $conn->query($sql);
                            if ($result->num_rows === 0) {
                                   header('location: students.php?edit-student&error=No student found with provided RegdNo.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     $row = $result->fetch_assoc();
              }
              ?>

              <?php
              $errors = $_SESSION['formErrors'] ?? [];
              $oldData = $_SESSION['oldData'] ?? [];
              unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>

              <form action="processes/studentProcess.php?operation=update-student" method="post" name="view-student-form" enctype="multipart/form-data" class="form-expan small-input-field" id="updateStudentForm">

                     <div class="col-span-2 center mb-2">
                            <img src="<?= $row['photo'] ?>" alt="Photo" class="image small-image">
                     </div>

                     <input type="hidden" name="regdNo" id="regdNo" value="<?= $row['regdNo'] ?>" readonly>

                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $oldData['name'] ?? $row['name'] ?>">
                            <p class="error" id="nameError"><?= $errors['name'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label>
                            <input type="text" name="faculty" id="faculty" value="<?= $oldData['faculty'] ?? $row['faculty'] ?>">
                            <p class="error" id="facultyError"><?= $errors['faculty'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" name="batch" id="batch" min="2057" max="<?= (date("Y") + 57) ?>" value="<?= $oldData['batch'] ?? $row['batch'] ?>">
                            <p class="error" id="batchError"><?= $errors['batch'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="dob">DOB:</label>
                            <input type="date" name="dob" id="dob" value="<?= $oldData['dob'] ?? $row['dob'] ?>">
                            <p class="error" id="dobError"><?= $errors['dob'] ?? "" ?></p>
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" name="gender" value="male" <?= ($row['gender'] === 'male') ? 'checked' : '' ?>>Male
                            <input type="radio" name="gender" value="female" <?= ($row['gender'] === 'female') ? 'checked' : '' ?>>Female
                            <p class="error" id="genderError"><?= $errors['gender'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? $row['phone'] ?>">
                            <p class="error" id="phoneError"><?= $errors['phone'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?= $oldData['email'] ?? $row['email'] ?>">
                            <p class="error" id="emailError"><?= $errors['email'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? $row['address'] ?>">
                            <p class="error" id="addressError"><?= $errors['address'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="parentName">Parent Name:</label>
                            <input type="text" name="parentName" id="parentName" value="<?= $oldData['parentName'] ?? $row['parentName'] ?>">
                            <p class="error" id="parentNameError"><?= $errors['parentName'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="parent-phone">Parent Phone:</label>
                            <input type="text" name="parentPhone" id="parentPhone" value="<?= $oldData['parentPhone'] ?? $row['parentPhone'] ?>">
                            <p class="error" id="parentPhoneError"><?= $errors['parentPhone'] ?? "" ?></p>
                     </div>

                     <div>
                            <label for="photo">Upload Photo:</label>
                            <input type="file" name="photo" id="photo">
                            <p class="error" id="photoError"><?= $errors['photo'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="view-results">View Results:</label> <br>
                            <div id="view-results">
                                   <a href="<?= $row['seeResult'] ?>" target="_blank" class="view-btn btn">SEE Result</a>
                                   <a href="<?= $row['nebResult'] ?>" target="_blank" class="view-btn btn">NEB Result</a>
                            </div>
                     </div>
                     <div>
                            <label for="seeResult">SEE Result:</label>
                            <input type="file" name="seeResult" id="seeResult">
                            <p class="error" id="seeResultError"><?= $errors['seeResult'] ?? "" ?></p>
                     </div>
                     <div>
                            <label for="nebResult">NEB Result:</label>
                            <input type="file" name="nebResult" id="nebResult">
                            <p class="error" id="nebResultError"><?= $errors['nebResult'] ?? "" ?></p>
                     </div>

                     <div class="col-span-2 center">
                            <button class="save-btn btn large mt-1">Save Changes</button>
                     </div>


              </form>

       </div>


       <!-- Code for entering Student Registration Number for Adding Admission -->
<?php
} else if (isset($_GET['add-admission'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Add Admission</h1>
              <form action="" class="form">
                     <div>
                            <label for="add-admission-regdNo">Enter Regd. No:</label>
                            <input type="text" name="add-admission-regdNo" id="add-admission-regdNo">
                     </div>
                     <div class="center">
                            <input type="submit" value="Find Student" class="edit-btn">
                     </div>
              </form>
       </div>

       <!-- Code for editing Adding Student Admission -->
<?php
} else if (!empty($_GET['add-admission-regdNo'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Add Admission</h1>
             
             <?php
                     if ($_SERVER['REQUEST_METHOD'] === "GET" && !empty($_GET['add-admission-regdNo'])) {
                            $regdNo = trim($_GET['add-admission-regdNo']);
                            try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: students.php?add-admission&error=No student found with provided RegdNo.');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                            $row = $result->fetch_assoc();
                     }
              ?>

              <?php
              $errors = $_SESSION['formErrors'] ?? [];
              $oldData = $_SESSION['oldData'] ?? [];
              unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>
 
              <form action="processes/addAdmission.php" method="post" name="add-admission-form" enctype="multipart/form-data" class="form-expan small-input-field" id="addAdmissionForm">

                     <div class="col-span-2 center mb-1">
                            <img src="<?php echo BASE_URL; ?>/public/assets/images/image.jpg" alt="Photo" class="image">
                     </div>
                     <div>
                            <label for="regdNo">Registration No:</label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $row['regdNo']?>" readonly>
                            <p class="error"><?= $errors['regdNo'] ?? ''?></p>
                     </div>
                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $row['name']?>" readonly>
                     </div>
                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $row['phone']?>" readonly>
                     </div>
                     <div>
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $row['address']?>" readonly>
                     </div>
                     <div>
                            <label for="faculty">Faculty:</label>
                            <input type="text" name="faculty" id="faculty" value="<?= $row['faculty']?>" readonly>
                     </div>
                     <div>
                            <label for="parent-phone">Parent Phone:</label>
                            <input type="number" name="parent-phone" id="parent-phone" value="<?= $row['parentPhone']?>" readonly>
                     </div>

                     <div class="col-span-2 mt-1 mb-1">
                            <hr>
                     </div>

                     <div>
                            <label for="semester">Select Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php 
                                          require_once "../includes/semesterShow.php?runningsem"; 
                                   ?>
                            </select>
                            <p class="error" id="semesterError"><?= $errors['semester'] ?? ''?></p>
                     </div> <br>
                     <div>
                            <label for="amount">Enter Amount:</label>
                            <input type="number" name="amount" id="amount" title="Enter Amount Submitted by student in Numbers..." value="<?= $oldData['amount'] ?? ''?>">
                            <p class="error" id="amountError"><?= $errors['amount'] ?? ''?></p>
                     </div>
                     <div>
                            <label for="voucher-photo">Upload Photo:</label>
                            <input type="file" name="voucherPhoto" id="voucherPhoto" title="Upload proof of Amount submit...">
                            <p class="error" id="voucherError"><?= $errors['voucherPhoto'] ?? ''?></p>
                     </div>

                     <div class="col-span-2 center mt-2">
                            <button class="add-btn btn large mt-1">Add Admission</button>
                     </div>

              </form>
       </div>



       <!-- Code for Selecting Semester for Viewing Admission -->
<?php
} else if (isset($_GET['view-admission'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Admission</h1>
              <form action="" class="form">
                     <div>
                            <label for="semester">Select Semester:</label>
                            <select name="view-admission-semId" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php 
                                          require_once "../includes/semesterShow.php?runningSem"; 
                                   ?>
                            </select>
                     </div>
                     <div class="center">
                            <input type="submit" value="View Admission" class="view-btn">
                     </div>
              </form>
       </div>

       <!-- Code for Viewing Admission -->
<?php
} else if (!empty($_GET['view-admission-semId'])) {
?>
       <div class="main center-fdct">

             <?php
                     if ($_SERVER['REQUEST_METHOD'] === "GET" && !empty($_GET['view-admission-semId'])) {
                            $semId = trim($_GET['view-admission-semId']);
                            try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: students.php?add-admission&error=No student found with provided RegdNo.');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                            $row = $result->fetch_assoc();
                     }
              ?>









              <h1 class="heading">Semester X, View Admission</h1>
              <div class="box-cover">
                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd. No.</th>
                                          <th>Name</th>
                                          <th>Fee Submitted</th>
                                          <th>Phone</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td>SC-4632-32332-323-32</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">16500</td>
                                          <td>98063888</td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-323-32</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">16500</td>
                                          <td>98063888</td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-323-32</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">16500</td>
                                          <td>98063888</td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-323-32</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">16500</td>
                                          <td>98063888</td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-323-32</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">16500</td>
                                          <td>98063888</td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                            </tbody>
                     </table>
              </div>
       </div>

       <!-- Code for entering Batch or Student Registration Number for Viewing  Fees -->
<?php
} else if (isset($_GET['view-fees'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Fees</h1>
              <form action="?view-fees-batch-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="batch">Enter Batch:</label>
                            <input type="number" name="batch" id="batch">
                     </div>
                     <div class="center large bold">
                            OR
                     </div>
                     <div>
                            <label for="regd-no">Enter Regd. No:</label>
                            <input type="text" name="regd-no" id="regd-no">
                     </div>
                     <div class="center">
                            <input type="submit" value="View Fees" class="view-btn">
                     </div>
              </form>
       </div>

       <!-- Code for Viewing Fees -->
<?php
} else if (isset($_GET['view-fees-batch-regd-no'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">View Fees - 20YY Batch</h1>
              <div class="box-cover">
                     <table class="smaller-table">
                            <thead>
                                   <tr>
                                          <th>Regd. No.</th>
                                          <th>Name</th>
                                          <th>1st Sem</th>
                                          <th>2nd Sem</th>
                                          <th>3rd Sem</th>
                                          <th>4th Sem</th>
                                          <th>5th Sem</th>
                                          <th>6th Sem</th>
                                          <th>7th Sem</th>
                                          <th>8th Sem</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td>SC-4632-32332-32</td>
                                          <td>Bishal Bhat</td>
                                          <td>16500</td>
                                          <td>1600, 500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td></td>
                                          <td></td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-32</td>
                                          <td>Bishal Bhat</td>
                                          <td>16500</td>
                                          <td>1600, 500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td></td>
                                          <td></td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-32</td>
                                          <td>Bishal Bhat</td>
                                          <td>16500</td>
                                          <td>1600, 500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td></td>
                                          <td></td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>SC-4632-32332-32</td>
                                          <td>Bishal Bhat</td>
                                          <td>16500</td>
                                          <td>1600, 500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td>16500</td>
                                          <td></td>
                                          <td></td>
                                          <td>
                                                 <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                          </td>
                                   </tr>

                            </tbody>
                     </table>
              </div>
       </div>


       <!-- Code for entering Registration Number For Deletion -->
<?php
} else if (isset($_GET['delete-student'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Delete Student</h1>
              <form action="" class="form">
                     <div>
                            <label for="delete-student-regdNo">Enter Registration Number:</label>
                            <input type="text" name="delete-student-regdNo" id="delete-student-regdNo">
                     </div>
                     <div class="center">
                            <input type="submit" value="View student" class="view-btn">
                     </div>
              </form>
       </div>

       <!-- Code for Deleting Deleting -->
<?php
} else if (isset($_GET['delete-student-regdNo'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Delete Student</h1>
              
              <?php
              if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete-student-regdNo'])) {
                     $regdNo = trim($_GET['delete-student-regdNo']);
                     try {
                            // Retrieve data from student table
                            $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                            $result = $conn->query($sql);
                            if ($result->num_rows === 0) {
                                   header('location: students.php?delete-student&error=No student found with provided RegdNo.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     $row = $result->fetch_assoc();
              }
              ?>

              <form action="processes/studentProcess.php?operation=delete-student" method="post" name="delete-student-form" class="form-expan">
                     <div class="col-span-2 center mb-2">
                            <img src="<?= $row['photo']?>" alt="Photo" class="image">
                     </div>
                     <div>
                            <label for="regdNo">Registration Number:</label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $row['regdNo']?>" readonly>
                     </div>
                     <div>
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="<?= $row['name']?>" readonly>
                     </div>
                     <div class="gender">
                            <label for="gender">Gender:</label><br>
                            <input type="text" name="gender" id="gender" value="<?= $row['gender']?>" readonly>
                     </div>
                     <div>
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" value="<?= $row['phone']?>" readonly>
                     </div>
                     <div>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?= $row['email']?>" readonly>
                     </div>
                     <div>
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" value="<?= $row['address']?>" readonly>
                     </div>
                     <div>
                            <label for="parent">Parent Name:</label><br>
                            <input type="text" name="parentName" id="parentName" value="<?= $row['parentName']?>" readonly>
                     </div>
                     <div>
                            <label for="parentPhone">Parent Phone:</label><br>
                            <input type="number" name="parentPhone" id="parentPhone" value="<?= $row['parentPhone']?>" readonly>
                     </div>

                     <div class="col-span-2 center">
                            <button class="delete-btn btn large mt-1" onclick="return confirmDelete('<?= $row['regdNo']?>')">Delete Student</button>
                     </div>
              </form>
       </div>

       <!-- Code To display Default Teacher Options... -->
<?php
} else {
?>
       <div class="main center">
              <div class="center-fdct gap-2">
                     <a href="?add-student" class="view-btn x-width">Add Student</a>
                     <a href="?view-student" class="view-btn x-width">View Student</a>
                     <a href="?edit-student" class="view-btn x-width">Edit Student</a>
                     <a href="?add-admission" class="view-btn x-width">Add Admission</a>
                     <a href="?view-admission" class="view-btn x-width">View Admission</a>
                     <a href="?view-fees" class="view-btn x-width">View Fees</a>
                     <a href="?delete-student" class="view-btn x-width">Delete Student</a>
              </div>
       </div>
<?php
}
?>



<?php require_once "../includes/footer.php"; ?>
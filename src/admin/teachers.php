<?php require_once "../includes/header.php"; ?>


<!-- Code for Adding New Teacher -->
<?php
       if(isset($_GET['add-teacher'])){
?>
              <div class="main center-fdct">
                     <h1 class="heading">Add New Teacher</h1>

              <?php
                     $errors = $_SESSION['formErrors'] ?? [];
                     $oldData = $_SESSION['oldData'] ?? [];
                     unset($_SESSION['formErrors'], $_SESSION['oldData']);
              ?>
                     <form action="processes/teacherProcess.php?operation=add-teacher" method="post" name="add-teacher-form" enctype="multipart/form-data" class="form-expan" id="addTeacherForm">
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
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="radio" name="gender" value="male" <?= (isset($oldData['gender']) && $oldData['gender'] === 'male') ? 'checked' : '' ?>>Male
                                   <input type="radio" name="gender" value="female" <?= (isset($oldData['gender']) && $oldData['gender'] === 'female') ? 'checked' : '' ?>>Female
                                   <p class="error" id="genderError"><?= $errors['gender'] ?? "" ?></p>
                            </div>  

                            <div class="col-span-2">
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? '' ?>">
                                   <p class="error" id="addressError"><?= $errors['address'] ?? "" ?></p>
                            </div>

                            <div>
                                   <label for="academicQualification">Academic Qualifications:</label>
                                   <input type="text" name="academicQualification" id="academicQualification" value="<?= $oldData['academicQualification'] ?? '' ?>">
                                   <p class="error" id="academicQualificationError"><?= $errors['academicQualification'] ?? "" ?></p>
                            </div>

                            <div>
                                   <label for="photo">Upload Photo:</label>
                                   <input type="file" name="photo" id="photo">
                                   <p class="error" id="photoError"><?= $errors['photo'] ?? "" ?></p>
                            </div>

                            <div class="col-span-2 center">
                                   <button class="add-btn btn large mt-2">Add Teacher</button>
                            </div>
                            

                     </form>

              </div>


<!-- Code for Viewing All Teachers -->
<?php
       }else if(isset($_GET['view-all-teachers'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Teachers</h1>

                     <?php
                            try {
                                   // Retrieve data from teacher table
                                   $sql = "SELECT * FROM teacher ORDER BY tid DESC";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: teachers.php?view-teacher&error=No Teacher Found to show...');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                     ?>

                     <div class="box-expan-normal center">
                            <table>
                                   <thead class="top-sticky">
                                          <tr>
                                                 <th title="Teachers ID">Tid</th>
                                                 <th>Teacher Name</th>
                                                 <th>Qualification</th>
                                                 <th>Phone</th>
                                                 <th>Address</th>
                                                 <th title="Actions you can Perfrom">Action</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                   
                                   <?php
                                          while ($row = $result->fetch_assoc()) {
                                   ?>
                                          <tr>
                                                 <td class="tac v-align-m"><?= $row['tid']?></td>
                                                 <td><?= $row['name']?></td>
                                                 <td><?= $row['academicQualification']?></td>
                                                 <td><?= $row['phone']?></td>
                                                 <td><?= $row['address']?></td>
                                                 <td>
                                                        <a href="?view-teacher-id=<?= $row['tid']?>" class="view-btn">View</a>
                                                        <a href="?edit-teacher-id=<?= $row['tid']?>" class="edit-btn">Edit</a>
                                                        <a href="?delete-teacher-id=<?= $row['tid']?>" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                   <?php
                                          }
                                   ?>
                                          
                                   </tbody>
                            </table>

                     </div>
              </div>


<!-- Code for entering Teacher ID for viewing Teacher -->
<?php
       }else if(isset($_GET['view-teacher'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Teacher</h1>
                     <form action="" method="get" class="form">
                            <div>
                                   <label for="view-teacher-id">Enter Teacher ID:</label>
                                   <input type="number" name="view-teacher-id" id="view-teacher-id">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Teacher" class="view-btn">
                            </div>
                            
                            <hr class="mt-1">

                            <div class="center mt-2">
                                   <a href="?view-all-teachers" class="view-btn">View all teachers</a>
                            </div>
                     </form>
              </div>


<!-- Code for viewing Teacher -->
<?php
       }else if(isset($_GET['view-teacher-id'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading mt-1">View Teacher</h1>

              <?php
                     if (isset($_GET['view-teacher-id'])) {
                            $tid = trim($_GET['view-teacher-id']);
                            if (empty($tid)) {
                                   header('location: teachers.php?view-teacher&error=Teacher Id is Required.');
                                   exit();
                            }
                            try {
                                   // Retrieve data from Teacher table
                                   $sql = "SELECT * FROM teacher WHERE tid = '$tid'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: teachers.php?view-teacher&error=No teacher found with provided Teacher ID.');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                            $row = $result->fetch_assoc();
              ?>

                     <form action="" method="post" name="add-teacher-form" enctype="multipart/form-data" class="form-expan mb-1">
                            <div class="col-span-2 center mb-2">
                                   <img src="<?= $row['photo']?>" alt="Photo" class="image">
                            </div>
                            <input type="hidden" name="id" value="<?= $row['tid']?>" readonly>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name" value="<?= $row['name']?>" readonly>
                            </div>
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty" value="<?= $row['faculty']?>" readonly>
                            </div>
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender" value="<?= $row['gender']?>" readonly>
                            </div> 
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="text" name="dob" id="dob" value="<?= $row['dob']?>" readonly>
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
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications" value="<?= $row['academicQualification']?>" readonly>
                            </div>
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $row['address']?>" readonly>
                            </div>

                            <div class="col-span-2 center mt-1">
                                   <a href="?edit-teacher-id=<?= $row['tid'] ?>" class="edit-btn btn large mt-1">Edit Teacher</a>
                            </div>    
                     </form>

       <?php
              }
       ?>
              </div>


<!-- Code for entering Teacher ID for Editing Details -->
<?php
       }else if(isset($_GET['edit-teacher'])){           
?>
       <div class="main center-fdct">
                     <h1 class="heading">Edit Teacher</h1>
                     <form action="" method="get" class="form">
                            <div>
                                   <label for="edit-teacher-id">Enter Teacher ID:</label>
                                   <input type="number" name="edit-teacher-id" id="edit-teacher-id">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="Edit Teacher" class="edit-btn">
                            </div>
                     </form>
              </div>
       

<!-- Code for editing Teacher-->
<?php
       }else if(isset($_GET['edit-teacher-id'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Edit Teacher</h1>


              <?php
                     if (isset($_GET['edit-teacher-id'])) {
                            $tid = trim($_GET['edit-teacher-id']);
                            if(empty($tid)){
                                   header('location: teachers.php?edit-teacher&error=Teacher ID is required.');
                                   exit();  
                            }
                            try {
                                   // Retrieve data from Teacher table
                                   $sql = "SELECT * FROM teacher WHERE tid = '$tid'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: teachers.php?edit-teacher&error=No Teacher found with provided TID.');
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

                     <form action="processes/teacherProcess.php?operation=update-teacher" method="post" name="add-teacher-form" enctype="multipart/form-data" class="form-expan mb-1" id="updateTeacherForm">
                            <div class="col-span-2 center mb-2">
                                   <img src="<?= $row['photo']?>" alt="Photo" class="image">
                            </div>
                            <input type="hidden" name="tid" value="<?= $row['tid']?>" readonly>
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
                                   <label for="phone">Phone:</label>
                                   <input type="number" name="phone" id="phone" value="<?= $oldData['phone'] ?? $row['phone'] ?>">
                                   <p class="error" id="phoneError"><?= $errors['phone'] ?? "" ?></p>
                            </div>
                            <div>
                                   <label for="email">Email:</label>
                                   <input type="email" name="email" id="email"value="<?= $oldData['email'] ?? $row['email'] ?>">
                                   <p class="error" id="emailError"><?= $errors['email'] ?? "" ?></p>
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
                                   <label for="academicQualification">Academic Qualifications:</label>
                                   <input type="text" name="academicQualification" id="academicQualification" value="<?= $oldData['academicQualification'] ?? $row['academicQualification'] ?>">
                                   <p class="error" id="academicQualificationError"><?= $errors['academicQualification'] ?? "" ?></p>

                            </div>
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $oldData['address'] ?? $row['address'] ?>">
                                   <p class="error" id="addressError"><?= $errors['address'] ?? "" ?></p>
                            </div>


                            <div>
                                   <label for="photo">Upload Photo:</label>
                                   <input type="file" name="photo" id="photo">
                                   <p class="error" id="photoError"><?= $errors['photo'] ?? "" ?></p>
                            </div>

                            <div class="col-span-2 center">
                                   <button class="save-btn btn large mt-2">Save Changes</button>
                            </div>    
                     </form>
              </div>


<!-- Code for entering Teacher Id for Deletion-->
<?php
       }else if(isset($_GET['delete-teacher'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Delete Teacher</h1>
                     <form action="" method="get" class="form">
                            <div>
                                   <label for="delete-teacher-id">Enter Teacher ID:</label>
                                   <input type="number" name="delete-teacher-id" id="delete-teacher-id">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Teacher" class="view-btn">
                            </div>
                     </form>
              </div>

<!-- Code for Deleting Teacher -->
<?php
       }else if(isset($_GET['delete-teacher-id'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Delete Teacher</h1>

              <?php
                     if (isset($_GET['delete-teacher-id'])) {
                            $tid = trim($_GET['delete-teacher-id']);
                            if(empty($tid)){
                                   header("location: teachers.php?delete-teacher&error= Teacher ID is Required.");
                                   exit();
                            }
                            try {
                                   // Retrieve data from student table
                                   $sql = "SELECT * FROM teacher WHERE tid = '$tid'";
                                   $result = $conn->query($sql);
                                   if ($result->num_rows === 0) {
                                          header('location: teachers.php?delete-teacher&error=No Teacher found with provided Tid.');
                                          exit();
                                   }
                            } catch (Exception $e) {
                                   die("<br><b>Error:</b> " . $e->getMessage());
                            }
                            $row = $result->fetch_assoc();
                     }
              ?>

                     <form action="processes/teacherProcess.php?operation=delete-teacher" method="post" enctype="multipart/form-data" class="form-expan">
                            <div class="col-span-2 center mb-2">
                                   <img src="<?= $row['photo']?>" alt="Photo" class="image">
                            </div>
                            <input type="hidden" name="tid" value="<?= $row['tid']?>" readonly>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name" value="<?= $row['name']?>" readonly>
                            </div> 
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty" value="<?= $row['faculty']?>" readonly>
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
                                   <label for="dob">DOB:</label>
                                   <input type="text" name="dob" id="dob" value="<?= $row['dob']?>" readonly>
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender" value="<?= $row['gender']?>" readonly>
                            </div>  
                            <div>
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications" value="<?= $row['academicQualification']?>" readonly>
                            </div>
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $row['address']?>" readonly>
                            </div>

                            <div class="col-span-2 center mt-1">
                                   <button class="delete-btn btn large mt-1" onclick="return confirmDelete('TID')">Delete Teacher</button>
                            </div>    
                     </form>
              </div>

<!-- Code To display Default Teacher Options... -->
<?php
       }else{
?>        
              <div class="main center">
                     <div class="center-fdct gap-1">
                            <a href="?add-teacher" class="view-btn x-width">Add Teacher</a>
                            <a href="?view-teacher" class="view-btn x-width">View Teacher</a>
                            <a href="?edit-teacher" class="view-btn x-width">Edit Teacher</a>
                            <a href="?delete-teacher" class="view-btn x-width">Delete Teacher</a>
                     </div>
              </div>
<?php
       }
?>

<?php require_once "../includes/footer.php"; ?>






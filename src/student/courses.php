<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>

<!-- Code for Viewing Teacher -->
<?php
if (isset($_GET['view-teacher-id'])) {
?>
       <div class="main center-fdct">
              <?php
              $tid = $_GET['view-teacher-id'];
              try {
                     $sql = "SELECT * FROM teacher WHERE tid = $tid";
                     $result = $conn->query($sql);
              } catch (Exception $e) {
                     exit('<br><b>Error:</b>' . $e->getMessage());
              }
              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
              ?>
                     <h1 class="heading mt-1">View Teacher - Tid : <?= $row['tid'] ?></h1>
                     <form action="" method="post" name="view-teacher-form" enctype="multipart/form-data" class="form-expan mb-1">
                            <div class="col-span-2 center mb-2">
                                   <img src="<?= $row['photo'] ?>" alt="Photo" class="image">
                            </div>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name" value="<?= $row['name'] ?>" readonly>
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
                                   <label for="dob">DOB:</label>
                                   <input type="text" name="dob" id="dob" value="<?= $row['dob'] ?>" readonly>
                            </div>
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender" value="<?= $row['gender'] ?>" readonly>
                            </div>
                            <div>
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications" value="<?= $row['academicQualification'] ?>" readonly>
                            </div>
                            <div class="col-span-2">
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address" value="<?= $row['address'] ?>" readonly>
                            </div>
                     </form>
              <?php
              }
              ?>
       </div>


       <!-- Code to Select semester for Viewing courses -->
<?php
} else if (isset($_GET['view-courses'])) {
?>
       <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Courses</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="view-courses-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="view-courses-semId" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php
                                          require_once "../includes/showSemester.php";
                                          ?>
                                   </select>
                            </div>
                            <div class="center mt-1">
                                   <input type="submit" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>

       <!-- Code for Viewing courses -->
<?php
} else if (isset($_GET['view-courses-sem']) || isset($_GET['view-courses-semId'])) {
?>
       <div class="main center-fdct">

              <?php
              $semId = trim($_GET['view-courses-semId']);
              if (empty($semId)) {
                     header("location: courses.php?view-courses&error=Semester is Required.");
                     exit();
              }
              try {
                     // Retrieve data from student table
                     $sql = "SELECT * FROM sem{$semId}Courses c LEFT JOIN teacher t ON c.tid = t.tid ORDER BY cid";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header('location: courses.php?view-courses&error=No Courses found with provided semester.');
                            exit();
                     }
              } catch (Exception $e) {
                     die("<br><b>Error:</b> " . $e->getMessage());
              }
              $semName = getSemName($semId);
              ?>
              <h1 class="heading"> View Courses - <?= $semName ?> semester</h1>
              <table>
                     <thead>
                            <tr>
                                   <th>Course ID</th>
                                   <th>Course Title</th>
                                   <th>Teacher ID</th>
                                   <th>Teacher Name</th>
                            </tr>
                     </thead>
                     <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                   <tr>
                                          <td class="center"><?= $row['cid'] ?></td>
                                          <td><?= $row['cname'] ?></td>
                                          <td class="center"> <?= $row['tid'] ?></td>
                                          <td>
                                                 <span><?= $row['name'] ?></span>
                                                 <?php
                                                 if ($row['tid']) {
                                                 ?>
                                                        <a href="courses.php?view-teacher-id=<?= $row['tid'] ?>" class="teacher-info-link">&#8599;</a>
                                                 <?php
                                                 }
                                                 ?>
                                          </td>
                                   </tr>
                            <?php
                            }
                            ?>
                     </tbody>
              </table>
       </div>

       <!-- Code to Select semester for viewing Course schedule -->
<?php
} else if (isset($_GET['view-course-Schedule'])) {
?>
       <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Course Schedule</h1>
                     <form action="" class="form">
                            <input type="hidden" name="view-course-schedule-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="view-course-schedule-semId" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php
                                          require_once "../includes/showSemester.php";
                                          ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center mt-1">
                                   <input type="submit" name="submit" value="view Schedule" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>

       <!-- Code for viewing Course schedule -->
<?php
} else if (isset($_GET['view-course-schedule-sem'])) {
?>
       <div class="main center-fdct">

              <?php
              $semId = trim($_GET['view-course-schedule-semId']);
              if (empty($semId)) {
                     header("location: courses.php?view-course-Schedule&error=Semester is Required.");
                     exit();
              }
              try {
                     // Retrieve data from sem(1-8)courses table
                     $sql = "SELECT * FROM sem{$semId}Courses c LEFT JOIN teacher t ON c.tid = t.tid ORDER BY cid";
                     $result = $conn->query($sql);

                     if ($result->num_rows === 0) {
                            header('location: courses.php?view-course-schedule&error=No Courses found with provided semester.');
                            exit();
                     }
              } catch (Exception $e) {
                     die("<br><b>Error:</b> " . $e->getMessage());
              }
              $semName = getSemName($semId);
              ?>

              <h1 class="heading"><?= $semName ?> Semester - View Course Schedule</h1>
              <table class="edit-table">
                     <thead>
                            <tr>
                                   <th>Cid</th>
                                   <th>Course Title</th>
                                   <th>Tid</th>
                                   <th>Teacher Name</th>
                                   <th>From</th>
                                   <th>To</th>
                            </tr>
                     </thead>
                     <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                   <tr>
                                          <td class="tac"><?= $row['cid'] ?></td>
                                          <td><?= $row['cname'] ?></td>
                                          <td class="tac"><?= $row['tid'] ?></td>
                                          <td>
                                                 <span><?= $row['name'] ?></span>
                                                 <?php
                                                 if ($row['tid']) {
                                                 ?>
                                                        <a href="courses.php?view-teacher-id=<?= $row['tid'] ?>" class="teacher-info-link">&#8599;</a>
                                                 <?php
                                                 }
                                                 ?>
                                          </td>
                                          <td class="tac"> <?= $row['from_time'] ?></td>
                                          <td class="tac"> <?= $row['to_time'] ?></td>
                                   </tr>

                            <?php
                            }
                            ?>
                     </tbody>
              </table>
       </div>


       <!-- Code To display Default Options... -->
<?php
} else {
?>
       <div class="main center">
              <div class="center-fdc gap">
                     <a href="?view-courses" class="view-btn x-width">View Courses</a>
                     <a href="?view-course-Schedule" class="view-btn x-width">View Course Schedule</a>
              </div>
       </div>
<?php
}
?>



<?php require_once "../includes/footer.php"; ?>
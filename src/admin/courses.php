<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>


<!-- Code to Select semester for Viewing courses -->
<?php
if (isset($_GET['view-courses'])) {
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
                     $sql = "SELECT * FROM sem{$semId}Courses c LEFT JOIN teacher t ON c.tid = t.tid order by cid";
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
              <div class="box-cover">
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
                                                               <a href="teachers.php?view-teacher-id=<?=$row['tid']?>" class="teacher-info-link">&#8599;</a>
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

              <div class="mt-3 center">
                     <a href="?assign-teacher-to-course-semId=<?= $semId ?>" class="edit-btn font-large">Edit Courses</a>
              </div>

       </div>

       <!-- Code to Select semester for assigning Teachers to courses -->
<?php
} else if (isset($_GET['assign-teacher-to-course'])) {
?>
       <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Assign Teacher to a Course</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="assign-teacher-to-course-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="assign-teacher-to-course-semId" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php require_once "../includes/showSemester.php" ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center mt-1">
                                   <input type="submit" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>

       <!-- Code for assigning Teachers to courses -->
<?php
} else if (isset($_GET['assign-teacher-to-course-sem']) || isset($_GET['assign-teacher-to-course-semId'])) {
?>
       <div class="main center-fdct">

              <?php
              $semId = trim($_GET['assign-teacher-to-course-semId']);
              if (empty($semId)) {
                     header("location: courses.php?assign-teacher-to-course&error=Semester is Required.");
                     exit();
              }
              try {
                     // Retrieve data from sem(1-8)courses table
                     $sql = "SELECT * FROM sem{$semId}Courses order by cid";
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


              <h1 class="heading"><?= $semName ?> Semester - Assign Teacher to a Course</h1>
              <form action="processes/coursesProcess.php?operation=assign-teacher-to-course" method="POST" name="teacher-Assign" enctype="multipart/form-data">
                     <div class="box-cover">

                            <input type="hidden" name="semId" value="<?= $semId ?>" readonly>
                            <table class="edit-table">
                                   <thead>
                                          <tr>
                                                 <th>Course ID</th>
                                                 <th>Course Title</th>
                                                 <th>Teacher</th>
                                          </tr>
                                   </thead>
                                   <tbody>

                                          <?php
                                          while ($row = $result->fetch_assoc()) {
                                          ?>
                                                 <tr>
                                                        <td class="tac"><?= $row['cid'] ?></td>
                                                        <td><?= $row['cname'] ?></td>
                                                        <td class="v-align-m">
                                                               <!-- <input type="text" name="tid" class="m-0"> -->
                                                               <select name="<?= $row['cid'] ?>">
                                                                      <option value="" selected disabled>Select Teacher</option>
                                                                      <?php require "../includes/showTeacher.php"; ?>

                                                               </select>
                                                        </td>
                                                 </tr>
                                          <?php
                                          }
                                          ?>
                                   </tbody>
                            </table>
                     </div>
                     <div class="mt-2 center">
                            <input type="submit" class="font-large mt-3 save-btn" value="save changes">
                     </div>
              </form>
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
} else if (isset($_GET['view-course-schedule-sem']) || isset($_GET['view-course-schedule-semId'])) {
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
              <form action="" method="POST" name="edit-course-schedule" enctype="multipart/form-data">
                     <div class="box-cover">
                            <table class="edit-table">
                                   <thead class="top-sticky">
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
                                                                      <a href="teachers.php?view-teacher-id=<?=$row['tid']?>" class="teacher-info-link">&#8599;</a>
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
              </form>
              <div class="mt-3 center">
                     <a href="?edit-course-schedule-semId=<?= $semId ?>" class="edit-btn font-large">Edit Course Schedule</a>
              </div>


              <!-- Code to Select semester for editing Course schedule -->
       <?php
} else if (isset($_GET['edit-course-schedule'])) {
       ?>
              <div class="main center-fdct">
                     <div class="center-fdct">
                            <h1 class="heading">Edit Course Schedule</h1>
                            <form action="" method="get" class="form">
                                   <input type="hidden" name="edit-course-schedule-sem" value="true" readonly>
                                   <div>
                                          <label for="semester">Select Semester:</label>
                                          <select name="edit-course-schedule-semId" id="semester">
                                                 <option value="" disabled selected>Select Semester</option>
                                                 <?php
                                                 require_once "../includes/showSemester.php";
                                                 ?>
                                                 <!-- Add All semester dynamically using PHP -->
                                          </select>
                                   </div>
                                   <div class="center">
                                          <input type="submit" class="view-btn">
                                   </div>
                            </form>
                     </div>
              </div>

              <!-- Code for editing Course schedule -->
       <?php
} else if (isset($_GET['edit-course-schedule-sem']) || isset($_GET['edit-course-schedule-semId'])) {
       ?>
              <div class="main center-fdct">

                     <?php
                     $semId = trim($_GET['edit-course-schedule-semId']);

                     if (empty($semId)) {
                            header("location: courses.php?edit-course-schedule&error=Semester is Required.");
                            exit();
                     }
                     try {
                            // Retrieve data from sem(1-8)courses table
                            $sql = "SELECT * FROM sem{$semId}Courses c LEFT JOIN teacher t ON c.tid = t.tid ORDER BY cid ASC";
                            $result = $conn->query($sql);

                            if ($result->num_rows === 0) {
                                   header('location: courses.php?edit-course-schedule&error=No Courses found with provided semester.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     $semName = getSemName($semId);
                     ?>

                     <h1 class="heading"><?= $semName ?> Semester - Edit Course Schedule</h1>
                     <form action="processes/coursesProcess.php?operation=edit-course-schedule" method="POST" name="edit-course-schedule" enctype="multipart/form-data">
                            <div class="box-cover">
                                   <input type="hidden" name="semId" value="<?= $semId ?>" readonly>
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
                                                                             <a href="teachers.php?view-teacher-id=<?=$row['tid']?>" class="teacher-info-link">&#8599;</a>
                                                                      <?php
                                                                      }
                                                                      ?>
                                                               </td>
                                                               <td class="v-align-m">
                                                                      <input type="text" name="<?= $row['cid'] . "_from" ?>" value="<?= $row['from_time'] ?>" class="m-0">
                                                               </td>
                                                               <td class="v-align-m">
                                                                      <input type="text" name="<?= $row['cid'] . "_to" ?>" value="<?= $row['to_time'] ?>" class="m-0">
                                                               </td>
                                                        </tr>
                                                 <?php
                                                 }
                                                 ?>
                                          </tbody>

                                   </table>
                            </div>
                            <div class="mt-3 center">
                                   <input type="submit" class="font-large mt-3 save-btn" value="save changes">
                            </div>
                     </form>
              </div>

              <!-- Code To display Default Options... -->
       <?php
} else {
       ?>
              <div class="main center">
                     <div class="center-fdc gap">
                            <a href="?view-courses" class="view-btn x-width">View Courses</a>
                            <a href="?assign-teacher-to-course" class="view-btn x-width">Assign Teacher to a course</a>
                            <a href="?view-course-Schedule" class="view-btn x-width">View Course Schedule</a>
                            <a href="?edit-course-schedule" class="view-btn x-width">Edit Course Schedule</a>
                     </div>
              </div>
       <?php
}
       ?>



       <?php require_once "../includes/footer.php"; ?>
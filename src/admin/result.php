<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>


<!-- Code for Selecting Batch and Semester for Result Publish -->
<?php
if (isset($_GET['publish-result'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">Publish Result</h1>
              <form action="" method="get" class="form">
                     <input type="hidden" name="publish-result-batch" value="1">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" name="batch" id="batch" min="2062" max="<?php echo date('Y') + 57; ?>" required>
                     </div>
                     <div>
                            <label for="examYear">Exam Year:</label>
                            <input type="number" name="examYear" id="examYear" min="2062" max="<?php echo date('Y') + 57; ?>" required>
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester" required>
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php
                                   require_once "../includes/showSemester.php";
                                   ?>
                            </select>
                     </div>
                     <div class="center">
                            <button type="submit" class="add-btn btn mt-2 large">Add</button>
                     </div>
              </form>
       </div>

       <!-- Code for entering Regd. No and Symbol Number for Result Publish -->
<?php
} else if (isset($_GET['publish-result-batch'])) {
?>
       <?php
       $examYear = trim($_GET['examYear']);
       $batch = trim($_GET['batch']);
       $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';

       if (empty($examYear) || empty($batch) || empty($semId)) {
              header("location: result.php?publish-result&error=All fields are Required.");
              exit();
       }
       $semName = getSemName($semId);
       ?>

       <div class="main center-fdct">
              <h1 class="heading">Result Publish - <?= $batch ?> Batch : <?= $semName ?> semester</h1>
              <form action="?enter-marks" method="post" class="form">
                     <input type="hidden" name="examYear" value="<?= $examYear ?>">
                     <input type="hidden" name="batch" value="<?= $batch ?>">
                     <input type="hidden" name="semId" value="<?= $semId ?>">
                     <div>
                            <label for="regdNo">Regd. No:</label>
                            <input type="text" name="regdNo" id="regdNo" required>
                     </div>

                     <div>
                            <label for="symbolNo">Symbol No:</label>
                            <input type="text" name="symbolNo" id="symbolNo" required>
                     </div>

                     <div class="center">
                            <button type="submit" class="add-btn btn mt-1 large">Add</button>
                     </div>
              </form>

       </div>


       <!-- Code to enter students marks for result Publish-->
<?php
} else if (isset($_GET['enter-marks'])) {
?>
       <?php
       $regdNo = trim($_POST['regdNo']);
       $symbolNo = trim($_POST['symbolNo']);
       $examYear = trim($_POST['examYear']);
       $batch = trim($_POST['batch']);
       $semId = trim($_POST['semId']);

       if (empty($regdNo) || empty($symbolNo)) {
              header("location: result.php?publish-result&error=All fields are Required.");
              exit();
       }

       try {
              $result = $conn->query("SELECT * FROM student where regdNo = '$regdNo'");
              if ($result->num_rows === 0) {
                     header("location: result.php?examYear=$examYear&batch=$batch&semester=$semId&error=No student exists for RegdNo - $regdNo");
                     exit();
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }


       $semName = getSemName($semId);
       ?>

       <div class="main center-fdct">

              <?php
              $courses = getCourses($semId);
              if ($courses === "") {
                     header("location: ?publish-result?error=Invalid Semester Entered.");
                     exit();
              }
              ?>
              <h1 class="heading">Result Publish - <?= $batch ?> Batch : <?= $semName ?> semester</h1>
              <form action="processes/resultProcess.php?operation=publish-result" name="result-publish-form" method="post" enctype="multipart/form-data" class="form-expan addresult-form">
                     <div>
                            <label for="registration-no" class="mt-zero">Regd. No:</label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $regdNo ?>" readonly>
                     </div>
                     <div>
                            <label for="symbolNo" class="mt-zero">Symbol No:</label>
                            <input type="text" name="symbolNo" id="symbolNo" value="<?= $symbolNo ?>" readonly>
                     </div>

                     <input type="hidden" name="examYear" value="<?= $examYear ?>">
                     <input type="hidden" name="batch" value="<?= $batch ?>">
                     <input type="hidden" name="semId" value="<?= $semId ?>">

                     <table class="col-span-2 add-result-table-style">
                            <thead>
                                   <tr>
                                          <th colspan="2">Subjects</th>
                                          <th>Theory</th>
                                          <th>Practical</th>
                                   </tr>
                            </thead>
                            <tbody>

                                   <?php
                                   while ($row = $courses->fetch_assoc()) {
                                   ?>
                                          <tr>
                                                 <td class="smaller tac"><?= $row['cid'] ?></td>
                                                 <td class="smaller pl-2"><?= $row['cname'] ?></td>
                                                 <?php
                                                 if ($row['TH'] > 0) {
                                                 ?>
                                                        <td class="marks-input-box smaller"><input type="number" name="<?= $row['cid'] . '_TH' ?>" min="0" max="<?= $row['TH'] ?>" required></td>
                                                 <?php
                                                 } else {
                                                        echo "<td></td>";
                                                 }
                                                 if ($row['PR'] > 0) {
                                                 ?>
                                                        <td class="marks-input-box smaller"><input type="number" name="<?= $row['cid'] . '_PR' ?>" min="0" max="<?= $row['PR'] ?>" required></td>
                                          </tr>
                                   <?php
                                                 }
                                   ?>
                            <?php
                                   }
                            ?>
                            </tbody>
                     </table>
                     <br>

                     <div class="center col-span-2 mt-1">
                            <button class="btn save-btn large">Save</button>
                     </div>
              </form>
       </div>

       <!-- Code for entering Batch, Semester, Regd. No, and Symbol. No. for Result Edit  -->
<?php
} else if (isset($_GET['edit-result'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Result Edit</h1>
              <form action="" method="get" class="form">
                     <input type="hidden" name="edit-result-student" value="true">

                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php
                                   require_once "../includes/showSemester.php";
                                   ?>
                            </select>
                     </div>
                     <div>
                            <label for="regdNo">Regd. No:</label>
                            <input type="text" name="regdNo" id="regdNo">
                     </div>
                     <div>
                            <label for="symbolNo">Symbol No:</label>
                            <input type="text" name="symbolNo" id="symbolNo">
                     </div>

                     <div class="center col-span-2">
                            <button type="submit" class="edit-btn btn mt-2 large">Edit</button>
                     </div>
              </form>
       </div>


       <!-- Code to Edit Result (Edit marks in result) -->
<?php
} else if (isset($_GET['edit-result-student'])) {
?>
       <div class="main center-fdct">

              <?php
              $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';
              $regdNo = trim($_GET['regdNo']);
              $symbolNo = trim($_GET['symbolNo']);

              if (empty($semId) || empty($regdNo) || empty($symbolNo)) {
                     header("location: result.php?edit-result&error=All fields are Required.");
                     exit();
              }

              try {
                     $sql = "SELECT * from student s JOIN sem{$semId}result r ON s.regdNo = r.regdNo WHERE r.symbolNo = '$symbolNo'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header("location: result.php?edit-result&error=No result exists for Symbol Number - $symbolNo");
                            exit();
                     }
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }

              $row = $result->fetch_assoc();
              $courses = getCourses($semId);
              $semName = getSemName($semId);
              ?>

              <h1 class="heading">Edit Result : <?= $row['batch'] ?> Batch - <?= $semName ?> Semester</h1>
              <form action="processes/resultProcess.php" name="result-edit-form" method="post" class="form-expan">
                     <div>
                            <label for="regdNo" class="mt-zero">Regd. No: </label>
                            <input type="text" name="regdNo" id="regdNo" value="<?= $regdNo ?>" readonly>
                     </div>
                     <div>
                            <label for="symbolNo" class="mt-zero">Symbol No: </label>
                            <input type="text" name="symbolNo" id="symbolNo" value="<?= $symbolNo ?>" readonly>
                     </div>
                     <input type="hidden" name="semId" value="<?= $semId ?>" required readonly>

                     <table class="col-span-2 add-result-table-style">
                            <thead>
                                   <tr>
                                          <th colspan="2">Subjects</th>
                                          <th>Theory</th>
                                          <th>Practical</th>
                                   </tr>
                            </thead>
                            <tbody>

                                   <?php
                                   foreach ($courses as $course) {
                                          $courseId = $course['cid'];
                                          $courseName = $course['cname'];

                                          #Making keys for Semester Result Table From Course table's cid. 
                                          $thkey = $course['cid'] . "_TH";
                                          $prkey = $course['cid'] . "_PR";

                                          $thMarks = (isset($row[$thkey]) ? $row[$thkey] : '');
                                          $prMarks = (isset($row[$prkey]) ? $row[$prkey] : '');
                                   ?>
                                          <tr>
                                                 <td class="subject-code"><?= $courseId ?></td>
                                                 <td class="subject-name"><?= $courseName ?></td>
                                                 <?php
                                                 if ($course['TH'] > 0) {
                                                 ?>
                                                        <td class="marks-input-box smaller"><input type="number" class="tac" name="<?= $course['cid'] . '_TH' ?>" min="0" max="<?= $course['TH'] ?>" value="<?= $thMarks ?>" required></td>
                                                 <?php
                                                 } else {
                                                        echo "<td></td>";
                                                 }
                                                 if ($course['PR'] > 0) {
                                                 ?>
                                                        <td class="marks-input-box smaller"><input type="number" class="tac" name="<?= $course['cid'] . '_PR' ?>" min="0" max="<?= $course['PR'] ?>" value="<?= $prMarks ?>" required></td>
                                                 <?php
                                                 }
                                                 ?>

                                          </tr>
                                   <?php
                                   }
                                   ?>
                            </tbody>
                     </table>
                     <br>

                     <div class="center col-span-2 mt-1">
                            <button class="btn save-btn large">Save Changes</button>
                     </div>
              </form>
       </div>



       <!-- Code to enter Batch and semester for Result Analyzing -->
<?php
} else if (isset($_GET['analyze-result'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">View All Result</h1>
              <form action="" method="get" class="form">
                     <input type="hidden" name="Analyze-result-batch-sem" value="true">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" min="2062" name="batch" id="batch" max="<?php echo date('Y') + 57; ?>">
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php
                                   require_once "../includes/showSemester.php";
                                   ?>
                            </select>
                     </div>
                     <div class="center">
                            <button type="submit" class="view-btn btn mt-2 large">View Result</button>
                     </div>
              </form>
       </div>

       <!-- Code to View Result of entire Semester -->
<?php
} else if (isset($_GET['Analyze-result-batch-sem'])) {
?>

       <div class="center-fdct main">


              <?php
              $batch = trim($_GET['batch']);
              $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';

              $semName = getSemName($semId);

              if (empty($semId) || empty($batch)) {
                     header("location: result.php?analyze-result&error=All fields are Required.");
                     exit();
              }

              try {
                     $sql = "SELECT * from student s JOIN sem{$semId}result r ON s.regdNo = r.regdNo WHERE s.batch = '$batch'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header("location: result.php?edit-result&error=No result exists for $batch Batch - $semName Sem.");
                            exit();
                     }
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }

              $courses = getCourses($semId);
              $semName = getSemName($semId);
              ?>
              <h1 class="heading">View Result : <?= $batch ?> Batch - <?= $semName ?> Semester </h1>
              <!-- <form action=""  class="form-result-analyze">
                     <div class="center">
                            <label for="filter" class="mr-1">Filter:</label>
                            <select name="filter" id="filter" class="mr-3">
                                   <option value="" disabled selected>Select Filter</option>
                                   <option value="Pass">PASS</option>
                                   <option value="Fail">FAIL</option>
                            </select>

                            <label for="sort" class="mr-1">Sort By:</label>
                            <select name="sort" id="sort" class="mr-3">
                                   <option value="desc" selected>Highest First </option>
                                   <option value="asc">Lowest First</option>
                            </select>
                            <button type="submit" class="view-btn btn">View Result</button>
                     </div>
              </form> -->

              <div class="center-fdct">
                     <table class="mt-1" id="result-analysis-table">
                            <thead class="top-sticky">
                                   <tr>
                                          <th>S.N.</th>
                                          <th>Symbol No:</th>
                                          <th>Name</th>
                                          <?php
                                          foreach ($courses as $header) {
                                                 $courseId = $header['cid'];
                                                 $courseName = $header['cname'];
                                                 echo "<th title='$courseName'>$courseId</th>";
                                          }
                                          ?>
                                          <th>Total</th>
                                          <th>Result</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>

                                   <?php
                                   while ($row = $result->fetch_assoc()) {
                                          static $counter = 1;
                                          $symbolNo = $row['symbolNo'];
                                          echo "<tr>";
                                   ?>
                                                        <td class="tac"><?= $counter?></td>
                                                        <td><?= $symbolNo ?></td>
                                                        <td><?= $row['name'] ?></td>
                                   <?php
                                          $status = "PASS";
                                          $totalMarks = 0;
                                          $counter++;

                                          foreach ($courses as $course) {
                                                 $courseId = $course['cid']; // Course ID
                                                 $courseName = $course['cname']; // Course Name

                                                 $thfm = $course['TH']; // Course Theory Full Marks
                                                 $prfm = $course['PR']; // Course Pratical Full Marks

                                                 #Making keys for Semester Result Table From Course table's cid.
                                                 $thkey = $course['cid'] . "_TH";
                                                 $prkey = $course['cid'] . "_PR";

                                                 $thMarks = (isset($row[$thkey]) ? $row[$thkey] : 0);
                                                 $prMarks = (isset($row[$prkey]) ? $row[$prkey] : 0);

                                                 $marksObtained = $thMarks + $prMarks; // Marks obtained for a subject (Th + Pr)

                                                 $totalMarks += $marksObtained; // Total Marks obtained by Student

                                                 if ($status !== "FAIL") {
                                                        #check for Theory Marks
                                                        if ($thfm == 100) {
                                                               if (isset($row[$thkey]) && $row[$thkey] < 45) {
                                                                      $status = "FAIL";
                                                               }
                                                        } else {
                                                               if (isset($row[$thkey]) && $row[$thkey] < 27) {
                                                                      $status = "FAIL";
                                                               }
                                                        }

                                                        #check for Pratical Marks
                                                        if ($prfm == 100) {
                                                               if (isset($row[$prkey]) && $row[$prkey] < 45) {
                                                                      $status = "FAIL";
                                                               }
                                                        } else {
                                                               if (isset($row[$prkey]) && $row[$prkey] < 18) {
                                                                      $status = "FAIL";
                                                               }
                                                        }
                                                 }
                                   ?>              
                                                        <td class="tac"><?= $marksObtained ?></td>
                                   <?php
                                          }
                                   ?>   
                                                        <td class="tac"><?= $totalMarks ?></td>
                                                        <td class="tac"><?= $status ?></td>
                                                        <td class="center gap-05">
                                                               <a href="?edit-result-student&semester=<?=$semId?>&symbolNo=<?=$row['symbolNo']?>&regdNo=<?=$row['regdNo']?>" class="edit-btn">Edit</a>
                                                               <a href="?result-view&symbolNo=<?=$symbolNo?>&semester=<?=$semId?>" class="view-btn">View</a>
                                                        </td>

                                                 </tr>
                                   <?php
                                   }
                                   ?>
                            </tbody>
                     </table>
              </div>
       </div>

       <!-- Code to enter Batch, Semester, Symbol No to view Result-->
<?php
} else if (isset($_GET['view-result'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Result View</h1>
              <form action="" method="get" class="form">
                     <input type="hidden" name="result-view" value="true">
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <?php
                                   require_once "../includes/showSemester.php";
                                   ?>
                            </select>
                     </div>
                     <div>
                            <label for="symbolNo">Symbol No:</label>
                            <input type="text" name="symbolNo" id="symbolNo">
                     </div>

                     <div class="center">
                            <button type="submit" class="edit-btn btn mt-2 large">View</button>
                     </div>
              </form>
       </div>


       <!-- Code to View Result... -->
<?php
} else if (isset($_GET['result-view'])) {
?>
       <?php
       $symbolNo = $_GET['symbolNo'];
       $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';

       if (empty($symbolNo) || empty($semId)) {
              header("location: result.php?view-result&error=All fields are Required.");
              exit();
       }

       try {
              $sql = "SELECT * from student s JOIN sem{$semId}result r ON s.regdNo = r.regdNo WHERE r.symbolNo = '$symbolNo'";
              $result = $conn->query($sql);
              if ($result->num_rows === 0) {
                     header("location: result.php?view-result&error=No result exists for Symbol Number - $symbolNo");
                     exit();
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }

       $semName = getSemName($semId);
       $row = $result->fetch_assoc();
       ?>

       <div class="main center-fdc">
              <div class="box-color-white" id="result">
                     <form action="" method="POST" name="resultForm" enctype="multipart/form-data">
                            <!-- Header Section -->
                            <div class="header">
                                   <div class="fwu-logo">
                                          <img src="<?php echo BASE_URL; ?>/public/assets/images/fwu-logo.jpg" alt="FWU-Logo">
                                   </div>
                                   <div>
                                          <h1>Farwestern University</h1>
                                          <h2>Office of the central Examinations</h2>
                                          <h3>Mahendranagar, Kanchanpur</h3>
                                   </div>
                                   <div class="fwu-logo">
                                          <img src="<?php echo BASE_URL; ?>/public/assets/images/fwu-logo.jpg" alt="FWU-Logo">
                                   </div>
                            </div>
                            <!-- Student Info Section -->
                            <div class="student-info-result">
                                   <div class="info-container">
                                          <span>Name: <?= $row['name'] ?></span>
                                          <span>Regd. No: <?= $row['regdNo'] ?></span>
                                   </div>
                                   <div class="info-container">
                                          <span>Level: Undergraduate</span>
                                          <span>Symbol No: <?= $row['symbolNo'] ?></span>
                                   </div>
                                   <div class="info-container">
                                          <span>Program: BSC-CSIT</span>
                                          <span>Exam Year: <?= $row['examYear'] ?></span>
                                   </div>
                                   <div class="info-container">
                                          <span>Faculty: Science & Technology</span>
                                          <span>Batch: <?= $row['batch'] ?></span>
                                   </div>
                                   <div class="info-container">
                                          <span>Campus: FWU Central Campus</span>
                                          <span>Semester: <?= $semName ?> Sem</span>
                                   </div>
                                   <div class="info-container">
                                          <span>Date of Birth: <?= $row['dob'] ?></span>
                                   </div>
                            </div>

                            <!-- Student Marks Section -->
                            <div class="marks">
                                   <table class="result-table">
                                          <thead>
                                                 <tr>
                                                        <th>Course ID</th>
                                                        <th>Course Title</th>
                                                        <th colspan="2">Marks Obtained <span class="small-text">[TH]</span> <Span class="small-text">[PR]</Span></th>
                                                        <th>MO</th>
                                                        <th>FM</th>
                                                        <th>Result</th>
                                                 </tr>
                                          </thead>
                                          <tbody>

                                                 <?php
                                                 $courses = getCourses($semId);
                                                 $status = "PASS";
                                                 $totalMarksObtained = 0;
                                                 $totalFullMarks = 0;

                                                 $marksObtained = 0;
                                                 $fullMarks = 0;

                                                 foreach ($courses as $course) {
                                                        $courseId = $course['cid'];
                                                        $courseName = $course['cname'];
                                                        $courseStatus = "PASS";
                                                        $thfm = $course['TH'];
                                                        $prfm = $course['PR'];

                                                        #Making keys for Semester Result Table From Course table's cid. 
                                                        $thkey = $course['cid'] . "_TH";
                                                        $prkey = $course['cid'] . "_PR";

                                                        $thMarks = (isset($row[$thkey]) ? $row[$thkey] : '-');
                                                        $prMarks = (isset($row[$prkey]) ? $row[$prkey] : '-');

                                                        $thMarksAddition = (isset($row[$thkey]) ? $row[$thkey] : 0);
                                                        $prMarksAddition = (isset($row[$prkey]) ? $row[$prkey] : 0);

                                                        $marksObtained = $thMarksAddition + $prMarksAddition;

                                                        $fullMarks = 100;

                                                        $totalMarksObtained += $marksObtained;
                                                        $totalFullMarks += $fullMarks;

                                                        if ($thfm == 100) {
                                                               if (isset($row[$thkey]) && $row[$thkey] < 45) {
                                                                      $courseStatus = "FAIL";
                                                               }
                                                        } else {
                                                               if (isset($row[$thkey]) && $row[$thkey] < 27) {
                                                                      $courseStatus = "FAIL";
                                                               }
                                                        }

                                                        if ($prfm == 100) {
                                                               if (isset($row[$prkey]) && $row[$prkey] < 45) {
                                                                      $courseStatus = "FAIL";
                                                               }
                                                        } else {
                                                               if (isset($row[$prkey]) && $row[$prkey] < 18) {
                                                                      $courseStatus = "FAIL";
                                                               }
                                                        }

                                                        if ($status === "PASS" && $courseStatus === "FAIL") {
                                                               $status = "FAIL";
                                                        }
                                                 ?>
                                                        <tr>
                                                               <td><?= $courseId ?></td>
                                                               <td class="tas"><?= $courseName ?></td>
                                                               <td><?= $thMarks ?></td>
                                                               <td><?= $prMarks ?></td>
                                                               <td><?= $marksObtained ?></td>
                                                               <td><?= $fullMarks ?></td>
                                                               <td><?= $courseStatus ?></td>
                                                        </tr>
                                                 <?php
                                                 }
                                                 ?>
                                          </tbody>
                                          <tfoot>
                                                 <tr>
                                                        <td colspan="7"><b><?= $status ?></b></td>
                                                 </tr>
                                                 <tr>
                                                        <td colspan="7"><b>Total Obtained Marks:</b> <?= $totalMarksObtained ?></Marks:br>
                                                        </td>
                                                 </tr>
                                                 <tr>
                                                        <td colspan="7"><b>Total Full Marks:</b> <?= $totalFullMarks ?></Marks:br>
                                                        </td>
                                                 </tr>
                                          </tfoot>
                                   </table>
                            </div>

                            <!-- Note Section -->
                            <div class="result-note">
                                   <b>Note:</b>
                                   <p>
                                          This Grade Sheet is for general idea of marks you secured. This is not for
                                          official use. If any mistakes appear; report at Administration ledger will
                                          be referred.
                                   </p>
                            </div>

                     </form>
              </div>
              <div class="center mt-1">
                     <button class="save-btn btn" onclick="downloadResultPDF()">Download Result</button>
              </div>
       </div>
<?php
} else {
?>
       <div class="main center">
              <div class="center-fdc gap">
                     <a href="?publish-result" class="view-btn x-width">Publish Result</a>
                     <a href="?edit-result" class="view-btn x-width">Edit Result</a>
                     <a href="?view-result" class="view-btn x-width">View Result</a>
                     <a href="?analyze-result" class="view-btn x-width">Analyze Result</a>
              </div>
       </div>
<?php
}
?>



<?php require_once "../includes/footer.php"; ?>
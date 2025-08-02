<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>

<!-- Code to View Result for selected SEM... -->
<?php
if (isset($_GET['result-view'])) {
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
<!-- Code for Selecting Semester for Result View -->
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

<?php
}
?>

<?php require_once "../includes/footer.php"; ?>
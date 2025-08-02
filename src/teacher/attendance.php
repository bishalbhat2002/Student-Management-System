<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>

<!-- Code for Selecting Semester to take Attendance -->
<?php
       if(isset($_GET['take-attendance'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Take Attendance</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="take-attendance-sem" value="true" readonly>
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php
                                                 require_once "../includes/showRunningSemester.php";
                                          ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" class="add-btn">
                            </div>
                     </form>
              </div>
              </div>


<!-- Code for Taking Attendance -->
<?php
       }else if(isset($_GET['take-attendance-sem'])){           
?>
       <div class="main center-fdct">

       <?php
              $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';

              if (empty($semId)) {
                     header("location: attendance.php?take-attendance&error=Semester is Required.");
                     exit();
              }
              $batch = getSemBatch($semId);
              $semName = getSemName($semId);

              try {
                     $sql = "SELECT * FROM student s JOIN sem{$semId}Admission a on s.regdNo = a.regdNo WHERE s.batch = '$batch'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header("location: attendance.php?take-attendance&error=No student is admitted to $semName Semester.");
                            exit();
                     }
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }
       ?>

              <h1 class="heading">Take Attendance -  <?= $semName?> Semester</h1>
              <form action="processes/attendanceProcess.php" name="take-attendance-form" method="POST"  onsubmit="return attendanceSubmitConfirm()">
                     <input type="hidden" name="semester" value="<?= $semId?>">
                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd. No</th>
                                          <th>Name</th>
                                          <th><?= date("Y-m-d"); ?></th>
                                          <th>Phone</th>
                                   </tr>
                            </thead>
                            <tbody>
                     <?php
                            while($row=$result->fetch_assoc()){
                     ?>
                                  <tr>
                                   <td><?= $row['regdNo']?></td>
                                   <td><?= $row['name']?></td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="<?= $row['regdNo']?>" class="big-checkbox"></td>
                                   <td><?= $row['phone']?></td>
                                  </tr>  
                     <?php
                            }
                     ?>     
              
                            </tbody>
                     </table>
                     <div class="center mt-1">
                            <input type="submit" class="submit-btn" value="Submit">
                     </div>
              </form>
       </div>


<!-- Code to Select semester for viewing Student Attendance -->
<?php
       }else if(isset($_GET['view-attendance'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Attendance</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="view-attendance-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php 
                                                 require_once "../includes/showRunningSemester.php";
                                          ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="view" class="view-btn">
                            </div>
                     </form>
              </div>
              </div> 

<!-- Code for viewing Student Attendance -->
<?php
       }else if(isset($_GET['view-attendance-sem'])){          
?>              
       <div class="main center-fdct">

       
        <?php
              $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';

              if (empty($semId)) {
                     header("location: attendance.php?view-attendance&error=Semester is Required.");
                     exit();
              }
              $batch = getSemBatch($semId);
              $semName = getSemName($semId);

              try {
                     $sql = "SELECT * FROM student s
                            JOIN sem{$semId}Admission a ON s.regdNo = a.regdNo
                            JOIN sem{$semId}Attendance att ON s.regdNo = att.regdNo
                            WHERE s.batch = '$batch'";

                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header("location: attendance.php?view-attendance&error=No student is admitted to $semName Semester.");
                            exit();
                     }
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }
       ?>


              <h1 class="heading">View Attendance - <?= $semName?> Semester</h1>
              <form action="?" name="take-attendance-form" method="POST" enctype="multipart/form-data">

                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd. No</th>
                                          <th>Name</th>
                                          <th title="Today"><?php echo date("Y-m-d"); ?></th>
                                          <th>Last Attend</th>
                                          <th>Total Attendance</th>
                                          <th>Phone</th>
                                   </tr>
                            </thead>
                            <tbody>
                     <?php
                            $currentDate = date('Y-m-d');
                            while($row=$result->fetch_assoc()){
                                   $lastupdate = $row['lastAttend'];
                     ?>
                                  <tr>
                                          <td><?= $row['regdNo']?></td>
                                          <td><?= $row['name']?></td>
                                          <td class="tac v-align-m"><?= ($currentDate == $lastupdate) ? "Present" : "Absent"?></td>
                                          <td class="tac v-align-m"><?= $row['lastAttend']?></td>
                                          <td class="tac v-align-m"><?= $row['present'] .'/'. $row['total'] ?></td>
                                          <td><?= $row['phone']?></td>
                                  </tr>   
                     <?php
                            }
                     ?>
                            </tbody>
                     </table>
              </form>

       </div>


<!-- Code To display Default Options... -->
<?php
       }else{
?> 
       <div class="main center">
       <div class="center-fdc gap">
              <a href="?take-attendance" class="view-btn x-width">Take Attendance</a> 
              <a href="?view-attendance" class="view-btn x-width">View Attendance</a> 
       </div>
       </div>
<?php
       }
?>



<?php require_once "../includes/footer.php"; ?>
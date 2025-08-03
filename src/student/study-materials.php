<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>

<!-- View Teacher Code -->
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


       <!-- Code to view study materials -->
<?php
} else {
?>
       <div class="main center-fdct">
              <div class="center-fdct">

                     <?php
                     $semId = $_SESSION['semId'];

                     if (empty($semId)) {
                            echo "<h2 class='heading-smaller mt-3'> Unable to Fetch Semester ID....</h2>";
                            exit();
                     }

                     $semName = getSemName($semId);
                     $batch = getSemBatch($semId);

                     try {
                            $sql = "SELECT * FROM sem{$semId}StudyMaterials WHERE batch = '$batch' ORDER BY smid DESC";
                            $result = $conn->query($sql);
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     ?>
                     <h1 class="heading">View Study Materials - <?= $semName ?> Semester</h1>

                     <?php
                     if ($result->num_rows == 0) {
                            echo "<h2 class='heading-smaller mt-3'>No Study Material Found....</h2>";
                     } else {
                            while ($row = $result->fetch_assoc()) {
                                   $subjectName = getCourseName($semId, $row['cid']);
                                   $teacherName = getTeacherName($row['tid']);
                     ?>
                                   <div action="" class="study-material-container smc-student">
                                          <div class="id">SMID</div>
                                          <div class="subject-title"><?= $subjectName ?></div>
                                          <div class="id-value"><?= $row['smid'] ?></div>
                                          <div class="main-content">
                                                 <p><?= $row['message'] ?></p>
                                                 <div class="justify-end gap-3">
                                                        <div>
                                                               <a href="<?= $row['file'] ?>" download="sampleNote" class="save-btn">Click To Download</a>
                                                               <a href="<?= $row['file'] ?>" target="_blank" class="view-btn">View Note</a>

                                                        </div>
                                                        <div class="sender-info-box">
                                                               <a href="study-materials.php?view-teacher-id=<?= $row['tid'] ?>" class="teacher-name" title="View Teacher Info"><?= $teacherName ?></a>
                                                               <span class="sent-date"><?= $row['date'] ?></span>
                                                        </div>
                                                 </div>
                                          </div>

                                   </div>
                     <?php
                            }
                     }
                     ?>

              </div>
       </div>


<?php
}
?>























































<!-- 
      <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Semester X, View Study Materials</h1>
                     
                     <form action="" name="sem-select-form" method="POST" enctype="multipart/form-data" class="study-material-container smc-student">
                            <div class="id">ID</div>
                            <div class="subject-title">Web Technology - II</div>
                            <div class="id-value">1021</div>
                            <div class="main-content">
                                   <p>The file linked to this message contains PHP pdf.</p>
                                   <div class="space-between">
                                          <div>
                                                 <a href="<?php echo BASE_URL; ?>/uploads/study materials/PHP.pdf" download="sampleNote" class="save-btn">Click To Download</a>
                                                 <a href="<?php echo BASE_URL; ?>/uploads/study materials/PHP.pdf" target="_blank" class="view-btn">View Note</a>
                                                 
                                          </div>
                                          <div class="flex gap-2">
                                                 <span class="teacher-name">Bishal Bhat</span>
                                                 <span class="sent-date"><?php echo date('Y-m-d'); ?></span>
                                          </div>
                                   </div>
                            </div>
                     </form>                                                

              </div>
              </div>  -->













<?php require_once "../includes/footer.php"; ?>
<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>

<!-- Code for Selecting Semester to send Study Materials -->
<?php
       if(isset($_GET['send-study-material'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Send Study Materials</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="send-study-material-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php require_once "../includes/showRunningSemester.php"; ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" class="add-btn">
                            </div>
                     </form>
              </div>
              </div>


<!-- Code for sending Study Materials -->
<?php
       }else if(isset($_GET['send-study-material-sem'])){           
?>
       <div class="main center-fdct">

       
        <?php
              $semId = $_GET['semester'];
              if (empty($semId)) {
                     header("location: study-materials.php?send-study-material&error=Semester is Required.");
                     exit();
              }
              try {
                     $courses = getCourses($semId);
              
                     if ($courses->num_rows === 0) {
                            header('location: study-materials.php?send-study-material&error=No Courses found with provided semester.');
                            exit();
                     }
                     
              } catch (Exception $e) {
                     die("<br><b>Error:</b> " . $e->getMessage());
              }

              $errors = $_SESSION['formErrors'] ?? [];
              $oldData = $_SESSION['oldData'] ?? [];
              unset($_SESSION['formErrors'], $_SESSION['oldData']);

              $semName = getSemName($semId);
              ?>

              <h1 class="heading">Send Study Material - <?= $semName?> Semester</h1>
              <form action="processes/studyMaterialProcess.php?operation=add-study-material" method="POST" enctype="multipart/form-data" class="form-expan" id="sendStudyMaterialForm">
                     <div>
                            <label for="Semester" class="mt-zero">Semester:</label>
                            <input type="text" name="semester" id="semester" value="<?= $semId ?>" readonly>
                            <p id="semesterError" class="error"><?= $errors['semester'] ?? ''?></p>
                     </div>
                     <div>
                            <label for="subject" class="mt-zero">Subject:</label>
                            <select name="subject" id="subject">
                                   <option value="" selected disabled>Select Subject</option>
                            <?php 
                                   while($course=$courses->fetch_assoc()){
                            ?>
                                          <option value="<?= $course['cid']?>"><?= $course['cname']?></option>
                                          <!-- Subject Names added dynamically here -->
                            <?php
                                   }
                            ?>
                            </select>
                            <p id="subjectError" class="error"><?= $errors['subject'] ?? ''?></p>
                     </div>
                     <div class="col-span-2 row-span-2">
                            <label for="message">Message:</label>
                            <textarea name="message" id="Message" placeholder="Title or Message related to study Material here..."><?= $oldData['message'] ?? ''?></textarea>
                            <p id="messageError" class="error"><?= $errors['message'] ?? ''?></p>
                     </div>
                     <div>
                            <label for="file">Upload File:</label>
                            <input type="file" name="file" id="file">
                            <p id="fileError" class="error"><?= $errors['file'] ?? ''?></p>
                     </div>
                 
                     <div class="center btn-container mt-1">
                            <input type="submit" value="submit" class="submit-btn">
                     </div>
              </form>
       </div>



<!-- Code for Selecting Semester to View Study Materials -->
<?php
      } else if(isset($_GET['view-study-material'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Study Materials</h1>
                     <form action="" method="get" class="form">
                            <input type="hidden" name="view-study-material-sem" value="true">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <?php require_once "../includes/showRunningSemester.php"; ?>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" class="add-btn">
                            </div>
                     </form>
              </div>
              </div>



<!-- Code to view study materials -->
<?php
       }else if(isset($_GET['view-study-material-sem'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">

              <?php
                     $semId = $_GET['semester'];
                     if (empty($semId)) {
                            header("location: study-materials.php?view-study-material&error=Semester is Required.");
                            exit();
                     }
                     $semName = getSemName($semId);
                     $batch = getSemBatch($semId);
                     try {      
                            $sql = "SELECT * FROM sem{$semId}StudyMaterials WHERE batch = $batch ORDER BY smid DESC";
                            $result = $conn->query($sql);     
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
              ?>
                     <h1 class="heading">View Study Materials - <?= $semName?> Semester</h1>
                    
              <?php 
                     if($result->num_rows == 0){
                            echo "<h2 class='heading-smaller mt-3'>No Study Material Found....</h2>";
                     }else{
                            while($row=$result->fetch_assoc()){
                                   $subjectName = getCourseName($semId, $row['cid']);
                                   $teacherName = getTeacherName($row['tid']);
              ?>
                                   <div action="" class="study-material-container">
                                          <div class="id">SMID</div>
                                          <div class="subject-title"><?=$subjectName?></div>
                                          <div class="id-value"><?=$row['smid']?></div>
                                          <div class="main-content">
                                                 <p><?= $row['message']?></p>
                                                 <div class="space-between">
                                                        <div>
                                                               <a href="<?= $row['file']?>" download="sampleNote" class="save-btn">Click To Download</a>
                                                               <a href="<?= $row['file']?>" target="_blank" class="view-btn">View Note</a>
                                                               
                                                        </div>
                                                        <div class="sender-info-box">
                                                               <a href="study-materials.php?view-teacher-id=<?= $row['tid']?>" class="teacher-name" title="View Teacher Info"><?= $teacherName?></a>
                                                               <span class="sent-date"><?= $row['date']?></span>
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="actions">
                                                 <a href="?update-study-material-id=<?=$row['smid']?>&semester=<?= $semId?>" class="update-btn">update</a><br>
                                                 <a href="processes/studyMaterialProcess.php?delete-study-material-id=<?=$row['smid']?>&semester=<?=$semId?>" class="delete-btn" onclick="return confirmDelete('<?=$row['smid']?>')">Delete</a>
                                          </div>
                                   </div>   
              <?php
                            }
                     }
              ?>
                     <a href="?send-study-material-sem&semester=<?=$semId?>" class='add-btn mt-2'>Add Study Material</a>

              </div>
              </div> 

<!-- Code for Updating Study Material -->
<?php
       }else if(isset($_GET['update-study-material-id'])){          
?>              
       <div class="main center-fdct">

              <?php
                     $semId = $_GET['semester'];
                     $smid = $_GET['update-study-material-id'];
                     if (empty($smid) || empty($semId)) {
                            header("location: study-materials.php");
                            exit();
                     }
                     $semName = getSemName($semId);

                     try {      
                            $sql = "SELECT * FROM sem{$semId}StudyMaterials WHERE smid = '$smid'";
                            $result = $conn->query($sql);     
                            if($result->num_rows == 0){
                                   header("location: study-materials.php?error=Invalid Semester or Study Material ID.");
                                   exit(); 
                            }
                            $row = $result->fetch_assoc();
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
                     
                     $errors = $_SESSION['formErrors'] ?? [];
                     $oldData = $_SESSION['oldData'] ?? [];
                     unset($_SESSION['formErrors'], $_SESSION['oldData']);

              ?>

              <h1 class="heading">Update <?= $semName?> Sem Study Material - SMID : <?= $smid?></h1>
              <form action="processes/studyMaterialProcess.php?operation=update-study-material" name="take-attendance-form" method="POST" enctype="multipart/form-data" class="form-expan" id="updateStudyMaterialForm">
                     <input type="hidden" name="smid" value="<?= $row['smid']?>">
                     <div>
                            <label for="Semester">Semester:</label>
                            <input type="text" name="semester" id="semester" value=" <?=$semId?>" readonly>
                            <p id="semesterError" class="error"><?= $errors['semester']  ?? ''?></p>
                     </div>

              <?php
                     $courses = getCourses($semId);
              ?>
                     <div>
                            <label for="subject">Subject:</label>
                            <select name="subject" id="subject">
                            <?php
                                   while($course=$courses->fetch_assoc()){
                            ?>
                                          <option value="<?= $course['cid']?>" <?= ($course['cid'] == $row['cid'])? "selected" : ""?> ><?= $course['cname']?></option>
                                          <!-- Subject Names added dynamically here -->
                            <?php
                                   }
                            ?>
                            
                            </select>
                            <p id="subjectError" class="error"><?= $errors['subject']  ?? ''?></p>
                     </div>
                     <div class="col-span-2 row-span-2">
                            <label for="message">Message:</label>
                            <textarea name="message" id="Message" placeholder="Title or Message related to study Material here..."><?=$oldData['message'] ?? $row['message']?></textarea>
                            <p id="messageError" class="error"><?= $errors['message']  ?? ''?></p>
                     </div>
                     <div>
                            <label for="file">Update File:</label>
                            <input type="file" name="file" id="file">
                            <p id="fileError" class="error"><?= $errors['file']  ?? ''?></p>
                     </div>
                 
                     <div class="center btn-container mt-1">
                            <input type="submit" value="save changes" class="save-btn">
                     </div>
              </form>
       </div>

<!-- View Teacher Code -->
<?php
} else if(isset($_GET['view-teacher-id'])){           
?>
              <div class="main center-fdct">
              <?php
                     $tid = $_GET['view-teacher-id'];
                     try{
                            $sql = "SELECT * FROM teacher WHERE tid = $tid"; 
                            $result= $conn->query($sql);
                     } catch (Exception $e) {
                            exit('<br><b>Error:</b>'.$e->getMessage());
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
                                   <input type="number" name="phone" id="phone"  value="<?= $row['phone'] ?>" readonly>
                            </div>
                            <div>
                                   <label for="email">Email:</label>
                                   <input type="email" name="email" id="email"  value="<?= $row['email'] ?>" readonly>
                            </div>                      
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="text" name="dob" id="dob"  value="<?= $row['dob'] ?>" readonly>
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender"  value="<?= $row['gender'] ?>" readonly>
                            </div>  
                            <div>
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications"  value="<?= $row['academicQualification'] ?>" readonly>
                            </div>
                            <div class="col-span-2">
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address"  value="<?= $row['address'] ?>" readonly>
                            </div>  
                     </form>
              <?php
                     }
              ?>
              </div>

<!-- Code To display Default Options... -->
<?php
       }else{
?> 
       <div class="main center">
       <div class="center-fdc gap-1">
              <a href="?send-study-material" class="view-btn x-width">Send Study Materials</a> 
              <a href="?view-study-material" class="view-btn x-width">View Study Materials</a> 
       </div>
       </div>
<?php
       }
?>


<?php require_once "../includes/footer.php"; ?>
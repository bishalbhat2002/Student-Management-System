<?php require_once "../includes/header.php"; ?>

<?php
       $errors = $_SESSION['formErrors'] ?? [];
       $oldData = $_SESSION['oldData'] ?? [];
       unset($_SESSION['formErrors'], $_SESSION['oldData']);          // Clear for next request
?>


<!-- Code to View Teacher Notice -->
<?php
       if(isset($_GET['tnv-id'])){
?>
              <div class="center-fdct main">
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading">Notice Title...</h2>
                            <p> Notice Body Message... Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, harum accusamus excepturi voluptate cum nemo eos distinctio optio repudiandae, aliquam quas sit nisi quibusdam similique reiciendis neque, fugiat velit quam.</p>
                            <div class="center">
                                   <a href="<?php echo BASE_URL;?>/public/assets/notice.jpeg" download="Notice-sample-name" title="Click to download Notice"><img src="../../assets/images/notice.jpeg" alt="Notice Image" class="notice-image"></a>
                            </div>
                     <div class="center">Date: 2082/01/05</div>

                     </div>
                    
              </div>


<!-- Code to View student Notice -->
<?php
       } else if(isset($_GET['snv-id'])){
?>
              <div class="center-fdct main">
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading">Notice Title...</h2>
                            <p> Notice Body Message... Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, harum accusamus excepturi voluptate cum nemo eos distinctio optio repudiandae, aliquam quas sit nisi quibusdam similique reiciendis neque, fugiat velit quam.</p>
                            <div class="center">
                                   <img src="<?php echo BASE_URL;?>/public/assets/images/notice.jpeg" alt="Notice Image" class="notice-image">
                            </div>
                     <div class="center">Date: 2082/01/05</div>

                     </div>
                    
              </div>

       
              
<!-- Code to Send Notice to Student  -->
<?php
       } else if(isset($_GET['add-student-notice'])){
?>
              <div class="center-fdct main">
                     <h1 class="heading">Send Notice to Students</h1>
                     <form action="../admin/processes/noticeProcess.php?table=student" method="post" name="noticeForm" enctype="multipart/form-data" class="form" id="addStudentNotice">
                            <div>
                                   <label for="title">Notice Title:</label> <br>
                                   <input type="text" name="title" id="title" value="<?= $oldData['title'] ?? ''?>">
                                   <p id="titleError" class="error"><?= $errors['title'] ?? ''?></p>
                            </div>
                            <div>  
                                   <label for="noticeBody">Notice Body</label> <br>
                                   <textarea name="noticeBody" id="noticeBody" cols="30" rows="5" placeholder="Notice body here..."><?= $oldData['noticeBody'] ?? ''?></textarea>
                                   <p id="noticeBodyError" class="error"><?= $errors['noticeBody'] ?? ''?></p>
                            </div>
                            <div>
                                   <label for="noticePhoto">Upload Notice:</label> <br>
                                   <input type="file" name="noticePhoto" id="noticePhoto">
                                   <p id="noticePhotoError" class="error"><?= $errors['noticePhoto'] ?? ''?></p>
                            </div>
                            <div class="center">
                                   <input type="submit" class="submit-btn" value="Send Notice">
                            </div>
                     </form>
              </div>

<?php               
       }else{
?>
              <div class="notices main">
                     <div class="teacher-notices box">
                            <div class="caption">Teachers Notice</div>

                            <?php      
                                   try {
                                          // Retrieve data from teacherNotice table
                                          $sql = "SELECT * FROM teacherNotice order by nid desc";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                                 while($row = $result->fetch_assoc()){

                            ?>     
                                                        <a href="?table=teacher&nid=<?= $row['nid'] ?>" class="notice" >
                                                               <div class="notice-number"><?= $row['nid'] ?></div>
                                                               <div class="notice-title"><?= $row['title'] ?></div>
                                                               <p class="notice-date"><?= $row['date'] ?></p>
                                                        </a>
                           <?php
                                                 }
                                          }else{
                                                 echo "<h2 class='no-notice-found'>No Notices Found!!!</h2>";
                                          }
                                   } catch (Exception $e) {
                                          echo "<br><b>Error:</b> " . $e->getMessage();
                                   }
                            ?>   
                            
              </div>   
                     
              <div class="student-notices box">
                     <div class="caption">Students Notice <a href="?add-student-notice" title="Add new Notice for Student" class="add-notice">Add Notice</a></div>
                            <?php      
                                   try {
                                          // Retrieve data from studentNotice table
                                          $sql = "SELECT * FROM studentNotice order by nid desc";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {
                                                 while($row = $result->fetch_assoc()){
                            ?>     
                                                        <a href="?table=student&nid=<?= $row['nid'] ?>" class="notice" >
                                                               <div class="notice-number"><?= $row['nid'] ?></div>
                                                               <div class="notice-title"><?= $row['title'] ?></div>
                                                               <p class="notice-date"><?= $row['date'] ?></p>
                                                        </a>
                            <?php
                                                 }
                                          }else{
                                                 echo "<h2 class='no-notice-found'>No Notices Found!!!</h2>";
                                          }
                                   } catch (Exception $e) {
                                          echo "<br><b>Error:</b> " . $e->getMessage();
                                   }
                            ?>              
              </div>   
<?php 
       }
?>

<?php require_once "../includes/footer.php"; ?>






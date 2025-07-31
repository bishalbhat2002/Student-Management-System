<?php require_once "../includes/header.php"; ?>
   
<?php
       if(isset($_GET['snv-id'])){
?>
<!-- Code to View student Notice -->
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

<?php               
       }else{
?> 
              <div class="main single-student-notices center-fdct">                  
                     <div class="student-notices box pb-1">
                            <div class="caption-full">Students Notice</div>
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
              </div>
<?php 
       }
?>

<?php require_once "../includes/footer.php"; ?>






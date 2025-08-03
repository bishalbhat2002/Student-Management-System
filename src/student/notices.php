<?php require_once "../includes/header.php"; ?>
   

<!-- Code to View Student Notice -->
<?php
if(isset($_GET['nid'])){
?>
       <div class="center-fdct main">

              <?php
                     if(empty($_GET['nid'])){
                            header("location: notices.php?error=Notice id is missing.");
                            exit(); 
                     }   
                     
                     try {
                            $table = "student";  
                            $nid = $_GET['nid'];  
                            
                            $sql = "SELECT * FROM {$table}notice WHERE nid = '$nid'";
                            
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            if ($result->num_rows === 0) {
                                   header('location: notices.php?error=No Notice Found.');
                                   exit();
                            }
                     } catch (Exception $e) {
                            die("<br><b>Error:</b> " . $e->getMessage());
                     }
              
              ?>
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading"><?= $row['title']?></h2>
                            <p> 
                                   <?= $row['nbody']?>
                            </p>

                            <?php
                                   if(!empty($row['photo'])){
                            ?>
                                          <div class="center">
                                                 <a href="<?= $row['photo'] ?>"  download="Notice-sample-name" title="Click to download Notice">
                                                        <img src="<?= $row['photo'] ?>" alt="Notice Image" class="notice-image">
                                                 </a>
                                          </div>
                            <?php
                                   }
                            ?>
                             <div class="center"><?= $row['date'] ?></div>

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






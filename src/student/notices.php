<?php require_once "../../includes/header.php"; ?>
   
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
                                   <img src="../../assets/images/notice.jpeg" alt="Notice Image" class="notice-image">
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
                            <a href="?snv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>                            
                            </a>
                            <a href="?snv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>                            
                            </a>                     
                            <a href="?snv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>                            
                            </a>                     
                            <a href="?snv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>                            
                            </a>                     
                            <a href="?snv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>                            
                            </a>              
                     </div>   
              </div>
<?php 
       }
?>

<?php require_once "../../includes/footer.php"; ?>






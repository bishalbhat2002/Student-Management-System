<?php require_once "../includes/header.php"; ?>

<?php
       if(isset($_GET['add-teacher-notice'])){
?>
<!-- Code to Send Notice to Teacher  -->
              <div class="center-fdct main">
                     <h1 class="heading">Send Notice to Teachers</h1>
                     <form action="" method="post" name="noticeForm" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="title">Notice Title:</label> <br>
                                   <input type="text" name="title" id="title" required>
                            </div>
                            <div>  
                                   <label for="noticeBody">Notice Body</label> <br>
                                   <textarea name="noticeBody" id="noticeBody" cols="30" rows="5" placeholder="Notice body here..."></textarea>
                            </div>
                            <div>
                                   <label for="noticePhoto">Upload Notice:</label> <br>
                                   <input type="file" name="noticePhoto" id="noticePhoto" required>
                            </div>
                            <div class="center">
                                   <input type="submit" class="submit-btn" value="Send Notice">
                            </div>
                     </form>
              </div>

 <?php
       } else if(isset($_GET['add-student-notice'])){
?>
<!-- Code to Send Notice to Student  -->
              <div class="center-fdct main">
                     <h1 class="heading">Send Notice to Students</h1>
                     <form action="" method="post" name="noticeForm" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="title">Notice Title:</label> <br>
                                   <input type="text" name="title" id="title" required>
                            </div>
                            <div>  
                                   <label for="noticeBody">Notice Body</label> <br>
                                   <textarea name="noticeBody" id="noticeBody" cols="30" rows="5" placeholder="Notice body here..."></textarea>
                            </div>
                            <div>
                                   <label for="noticePhoto">Upload Notice:</label> <br>
                                   <input type="file" name="noticePhoto" id="noticePhoto" required>
                            </div>
                            <div class="center">
                                   <input type="submit" class="submit-btn" value="Send Notice">
                            </div>
                     </form>
              </div>

<?php
       } else if(isset($_GET['tnv-id'])){
?>
<!-- Code to View Teacher Notice -->
              <div class="center-fdct main">
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading">Notice Title...</h2>
                            <p> Notice Body Message... Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, harum accusamus excepturi voluptate cum nemo eos distinctio optio repudiandae, aliquam quas sit nisi quibusdam similique reiciendis neque, fugiat velit quam.</p>
                            <div class="center">
                                   <a href=<?php echo BASE_URL."/public/assets/images/notice.jpeg";?>  download="Notice-sample-name" title="Click to download Notice"><img src="../../assets/images/notice.jpeg" alt="Notice Image" class="notice-image"></a>
                            </div>
                     <div class="center">Date: 2082/01/05</div>

                     </div>
                    
              </div>

<?php
       } else if(isset($_GET['snv-id'])){
?>
<!-- Code to View student Notice -->
              <div class="center-fdct main">
                     <h1 class="heading">View Notice</h1>
                     <div class="box notice-view-box">
                            <h2 class="sub-heading">Notice Title...</h2>
                            <p> Notice Body Message... Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, harum accusamus excepturi voluptate cum nemo eos distinctio optio repudiandae, aliquam quas sit nisi quibusdam similique reiciendis neque, fugiat velit quam.</p>
                            <div class="center">
                                   <img src=<?php echo BASE_URL."/public/assets/images/notice.jpeg";?> alt="Notice Image" class="notice-image">
                            </div>
                     <div class="center">Date: 2082/01/05</div>

                     </div>
                    
              </div>

<?php               
       }else{
?>
              <div class="notices main">
                     <div class="teacher-notices box">
                            <div class="caption">Teachers Notice <a href="?add-teacher-notice" title="Add new Notice for Teachers" class="add-notice">Add Notice</a></div>
                            
                            <a href="?tnv-id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...43242</div>
                                   <p class="notice-date">2082/01/04</p>
                            </a>
                            
                            <a href="?id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>
                            </a>
                            <a href="?id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>
                            </a>             
                            <a href="?id" class="notice" >
                                   <div class="notice-number">1</div>
                                   <div class="notice-title">6th Semester Form Fillup Notice...</div>
                                   <p class="notice-date">2082/01/04</p>
                            </a>
                            
              </div>   
                     
              <div class="student-notices box">
                     <div class="caption">Students Notice <a href="?add-student-notice" title="Add new Notice for Student" class="add-notice">Add Notice</a></div>
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
<?php 
       }
?>


<?php require_once "../includes/footer.php"; ?>






<?php require_once "../../includes/header.php"; ?>

<!-- Code for Selecting Semester to send Study Materials -->
<?php
       if(isset($_GET['send-study-material'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Send Study Materials</h1>
                     <form action="?send-study-material-sem" name="sem-select-form" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="Send" class="add-btn">
                            </div>
                     </form>
              </div>
              </div>


<!-- Code for sending Study Materials -->
<?php
       }else if(isset($_GET['send-study-material-sem'])){           
?>
       <div class="main center-fdct">
              <h1 class="heading">X Semester, Send Study Material</h1>
              <form action="?view-study-material-sem" name="take-attendance-form" method="POST" enctype="multipart/form-data" class="form-expan">
                     <div>
                            <label for="Semester">Semester:</label>
                            <input type="text" name="semester" id="semester" readonly>
                     </div>
                     <div>
                            <label for="subject">Subject:</label>
                            <select name="subject" id="subject">
                                   <option value="DSA">DSA</option>
                                   <option value="C++">C++</option>
                                   <!-- Subject Names added dynamically here -->
                            </select>
                     </div>
                     <div class="col-span-2 row-span-2">
                            <label for="message">Message:</label>
                            <textarea name="message" id="Message" placeholder="Title or Message related to study Material here..."></textarea>
                     </div>
                     <div>
                            <label for="file">Upload File:</label>
                            <input type="file" name="file" id="file">
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
                     <h1 class="heading">Send Study Materials</h1>
                     <form action="?view-study-material-sem" name="sem-select-form" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="View" class="add-btn">
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
                     <h1 class="heading">Semester X, View Study Materials</h1>
                     
                     <form action="?view-attendance-sem" name="sem-select-form" method="POST" enctype="multipart/form-data" class="study-material-container">
                            <div class="id">ID</div>
                            <div class="subject-title">Web Technology - II</div>
                            <div class="id-value">1021</div>
                            <div class="main-content">
                                   <p>The file linked to this message contains PHP pdf.</p>
                                   <div class="space-between">
                                          <div>
                                                 <a href="../../uploads/study materials/PHP.pdf" download="sampleNote" class="save-btn">Click To Download</a>
                                                 <a href="../../uploads/study materials/PHP.pdf" target="_blank" class="view-btn">View Note</a>
                                                 
                                          </div>
                                          <div class="flex gap-2">
                                                 <span class="teacher-name">Bishal Bhat</span>
                                                 <span class="sent-date"><?php echo date('Y-m-d');?></span>
                                          </div>
                                   </div>
                            </div>
                            <div class="actions">
                                   <a href="?update-study-material-id" class="update-btn">update</a><br>
                                   <a href="?update-study-material-id" class="delete-btn" onclick="return confirmDelete(id)">Delete</a>
                            </div>
                     </form>                                                

              </div>
              </div> 

<!-- Code for Updating Study Material -->
<?php
       }else if(isset($_GET['update-study-material-id'])){          
?>              
       <div class="main center-fdct">
              <h1 class="heading">X Semester, Update Study Material</h1>
              <form action="?view-study-material-sem" name="take-attendance-form" method="POST" enctype="multipart/form-data" class="form-expan">
                     <div>
                            <label for="Semester">Semester:</label>
                            <input type="text" name="semester" id="semester" readonly>
                     </div>
                     <div>
                            <label for="subject">Subject:</label>
                            <select name="subject" id="subject">
                                   <option value="DSA">DSA</option>
                                   <option value="C++">C++</option>
                                   <!-- Subject Names added dynamically here -->
                            </select>
                     </div>
                     <div class="col-span-2 row-span-2">
                            <label for="message">Message:</label>
                            <textarea name="message" id="Message" placeholder="Title or Message related to study Material here..."></textarea>
                     </div>
                     <div>
                            <label for="file">Upload File:</label>
                            <input type="file" name="file" id="file">
                     </div>
                 
                     <div class="center btn-container mt-1">
                            <input type="submit" value="save changes" class="save-btn">
                     </div>
              </form>
       </div>

<!-- Code To display Default Options... -->
<?php
       }else{
?> 
       <div class="main center">
       <div class="center-fdc gap">
              <a href="?send-study-material" class="view-btn x-width">Send Study Materials</a> 
              <a href="?view-study-material" class="view-btn x-width">View Study Materials</a> 
       </div>
       </div>
<?php
       }
?>



<?php require_once "../../includes/footer.php"; ?>
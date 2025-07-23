<?php require_once "../../includes/header.php"; ?>

<!-- Code for Selecting Semester to take Attendance -->
<?php
       if(isset($_GET['take-attendance'])){           
?>
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Take Attendance</h1>
                     <form action="?take-attendance-sem" name="sem-select-form" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="Take Attendance" class="add-btn">
                            </div>
                     </form>
              </div>
              </div>


<!-- Code for Taking Attendance -->
<?php
       }else if(isset($_GET['take-attendance-sem'])){           
?>
       <div class="main center-fdct">
              <h1 class="heading">X semester, Take Attendance</h1>
              <form action="?view-attendance-sem" name="take-attendance-form" method="POST"  onsubmit="return attendanceSubmitConfirm()" enctype="multipart/form-data">

                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd. No</th>
                                          <th>Name</th>
                                          <th><?php echo date("Y-m-d"); ?></th>
                                          <th>Phone</th>
                                   </tr>
                            </thead>
                            <tbody>
                                  <tr>
                                   <td>SC-3494-434-434</td>
                                   <td>Bishal Bhat</td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="regd-no" class="big-checkbox"></td>
                                   <td>9806443223</td>
                                  </tr>  

                                  <tr>
                                   <td>SC-3494-434-434</td>
                                   <td>Bishal Bhat</td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="regd-no" class="big-checkbox"></td>
                                   <td>9806443223</td>
                                  </tr>      
                                  
                                  <tr>
                                   <td>SC-3494-434-434</td>
                                   <td>Bishal Bhat</td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="regd-no" class="big-checkbox"></td>
                                   <td>9806443223</td>
                                  </tr>      
                                  
                                  <tr>
                                   <td>SC-3494-434-434</td>
                                   <td>Bishal Bhat</td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="regd-no" class="big-checkbox"></td>
                                   <td>9806443223</td>
                                  </tr>      
                                  
                                  <tr>
                                   <td>SC-3494-434-434</td>
                                   <td>Bishal Bhat</td>
                                   <td class="tac v-align-m"><input type="checkbox" value="1" name="regd-no" class="big-checkbox"></td>
                                   <td>9806443223</td>
                                  </tr>
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
                     <h1 class="heading">Take Attendance</h1>
                     <form action="?view-attendance-sem" name="sem-select-form" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
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
              <h1 class="heading">X semester, View Attendance</h1>
              <form action="?" name="take-attendance-form" method="POST" enctype="multipart/form-data">

                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd. No</th>
                                          <th>Name</th>
                                          <th title="Current Day"><?php echo date("Y-m-d"); ?></th>
                                          <th>Total Attendance</th>
                                          <th>Phone</th>
                                   </tr>
                            </thead>
                            <tbody>
                                  <tr>
                                          <td>SC-3494-434-434</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">Present</td>
                                          <td class="tac v-align-m">40 / 45</td>
                                          <td>9806443223</td>
                                  </tr>  
                                  <tr>
                                          <td>SC-3494-434-434</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">Absent</td>
                                          <td class="tac v-align-m">40 / 45</td>
                                          <td>9806443223</td>
                                  </tr>  
                                  <tr>
                                          <td>SC-3494-434-434</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">Present</td>
                                          <td class="tac v-align-m">40 / 45</td>
                                          <td>9806443223</td>
                                  </tr>  
                                  <tr>
                                          <td>SC-3494-434-434</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">Present</td>
                                          <td class="tac v-align-m">40 / 45</td>
                                          <td>9806443223</td>
                                  </tr>  
                                  <tr>
                                          <td>SC-3494-434-434</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac v-align-m">Absent</td>
                                          <td class="tac v-align-m">40 / 45</td>
                                          <td>9806443223</td>
                                  </tr>  
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



<?php require_once "../../includes/footer.php"; ?>
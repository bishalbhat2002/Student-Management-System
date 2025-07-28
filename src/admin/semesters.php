<?php require_once "../includes/header.php"; ?>
<div class="main center-fdct">

<?php
       if(isset($_GET['viewstudents-sem'])){
?>
<!-- View All Student Code here -->
       <div>
              <h1 class="heading">X Semester Information</h1>
              <div class="box-cover">
                     <table>
                            <thead>
                                   <tr>
                                          <th>Regd.No</th>
                                          <th>Name</th>
                                          <th>Attendance</th>
                                          <th>Phone</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td>Sc-1243423342</td>
                                          <td>Bishal Bhat</td>
                                          <td class="center">39/39</td>
                                          <td>98095343</td>
                                          <td>
                                                 <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>Sc-1243423342</td>
                                          <td>Bishal Bhat</td>
                                          <td class="center">39/39</td>
                                          <td>98095343</td>
                                          <td>
                                                 <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>Sc-1243423342</td>
                                          <td>Bishal Bhat</td>
                                          <td class="center">39/39</td>
                                          <td>98095343</td>
                                          <td>
                                                 <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>Sc-1243423342</td>
                                          <td>Bishal Bhat</td>
                                          <td class="center">39/39</td>
                                          <td>98095343</td>
                                          <td>
                                                 <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>Sc-1243423342</td>
                                          <td>Bishal Bhat</td>
                                          <td class="center">39/39</td>
                                          <td>98095343</td>
                                          <td>
                                                 <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                          </td>
                                   </tr>
                            </tbody>
                     </table>
              </div> 
       </div>

<?php
       }else if(isset($_GET['addSemester'])){
?>
<!-- Code for Adding New Semester -->
              <div>
                     <h1 class="heading">Add New Semester</h1>       
                     <form action="processes/addSemester.php" method="post" name="addNewSemester" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label> <br>
                                   <select name="semesterId" id="semester">
                                          <option value="" selected disabled>Select Semester</option>
                                          <?php 
                                                 $nonRunningSem = true;                               # Set to true because we only want to show the non running semesters to add to the running list.
                                                 require_once "../includes/semesterShow.php"; 
                                          ?>
                                   </select>

                                   <div class="center">
                                          <input type="submit" value="Add Semester" class="add-btn">
                                   </div>
                            </div>
                     </form>
              </div>
<?php
       }else{
?>

       <div class="semester-edit">
                            
              <h1 class="heading">View Semester Info</h1>
       <?php
              try {
                     $sql;
                     $sql = "SELECT * FROM runningSemesters"; 
                     $result = $conn->query($sql);
                     if (!$result->num_rows > 0) {
                            echo "<h2 class='heading-smaller'>No Running Semester Found...</h2>";
                     }
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }
              $semArray = ['0th', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th'];
              while ($row = $result->fetch_assoc()) {
                     $rsid = $row['rsid'];
       ?>
              <div class="sem-container width-large">
                     <div class="semester-box"> <?= $semArray[$rsid] ?> <br>Sem</div> 
                     <p> <?= $row['totalStudent']?> Students</p> 
                     <div class="action">
                            <a href="?viewstudents&semId=<?= $rsid?>" class="view-btn">View All Students</a>
                            <a href="?deleteSemester&semId=<?= $rsid?>" class="delete-btn" onclick="return confirmDelete('semID')">Delete Semester</a>
                     </div>
              </div>

       <?php }        
       ?>
              <!-- <div class="sem-container width-large">
                     <div class="semester-box">3rd <br>Sem</div> 
                     <p>43 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn" onclick="return confirmDelete('semID')">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">5th <br>Sem</div> 
                     <p>38 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn" onclick="return confirmDelete('semID')">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">6th <br>Sem</div> 
                     <p>32 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn" onclick="return confirmDelete('semID')">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">8th <br>Sem</div> 
                     <p>28 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn" onclick="return confirmDelete('semID')">Delete Semester</a>
                     </div>
              </div> -->
              <div class="center">
                     <a href="?addSemester" class="add-btn font-large">Add New Semester</a>
              </div>
       </div>
       
       <?php
       }
       ?>
</div>


<?php require_once "../includes/footer.php"; ?>
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
                     <form action="processes/semester.php?operation=add-semester" method="post" name="addNewSemester" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label> <br>
                                   <select name="semesterId" id="semester">
                                          <option value="" selected disabled>Select Semester</option>
                                          <?php 
                                                 $nonRunningSem = true;                               # Set to true because we only want to show the non running semesters to add to the running list.
                                                 require_once "../includes/semesterShow.php"; 
                                          ?>
                                   </select>
                            </div>
                            <div>
                                   <label for="batch">Select Batch:</label>
                                   <input type="number" name="batch" id="batch" min="2067" max="<?= (Date("Y")+57) ?>" >
                            </div>
                                   <div class="center mt-1">
                                          <input type="submit" value="Add Semester" class="add-btn">
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
                     $sql = "SELECT semName, totalStudent, rsid, batch FROM 
                     runningSemester JOIN semester ON runningSemester.rsid = semester.semId"; 
                     $result = $conn->query($sql);
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }

              if (!$result->num_rows > 0) {
                     echo "<h2 class='heading-smaller'>No Running Semester Found...</h2>";
              }else{
                     while ($row = $result->fetch_assoc()) {
       ?>
                            <div class="sem-container large-width">
                                   <div class="semester-box"> 
                                          <div class="semester"><?= $row['semName'] ?> <br> Sem</div>
                                          <div class="batch"><?= $row['batch'] ?></div>
                                   </div> 
                                   <p> <?= $row['totalStudent']?> Students</p> 
                                   <div class="action">
                                          <a href="?viewstudents&semId=<?= $row['rsid']?>" class="view-btn">View All Students</a>
                                          <a href="processes/semester.php?operation=delete-semester&semId=<?= $row['rsid']?>" class="delete-btn" onclick="return confirmDelete('<?= $row['rsid']?>')">Delete Semester</a>
                                   </div>
                            </div>       

       <?php         }    
              }    
       ?>
              <div class="center mt-1">
                     <a href="?addSemester" class="add-btn font-large">Add New Semester</a>
              </div>
       </div>
       
       <?php
       }
       ?>
</div>


<?php require_once "../includes/footer.php"; ?>
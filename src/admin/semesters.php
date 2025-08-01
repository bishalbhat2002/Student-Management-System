<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php" ?>
<div class="main center-fdct">

<?php
       if(isset($_GET['view-Semester-students'])){
?>
<!-- View All Student Code here -->
       <div>
       <?php
              if(empty($_GET['semId']) || empty($_GET['batch'])){
                     header('location: semesters.php');
                     exit();
              }
              try {
                     $semId = $_GET['semId'];
                     $batch = $_GET['batch'];
                     
                     $sql = "SELECT * FROM student JOIN sem{$semId}admission ON student.regdNo = sem{$semId}admission.regdNo
                            WHERE student.batch = '$batch'"; 
                     $result = $conn->query($sql);
              } catch (Exception $e) {
                     exit("<br><b>Error:</b>" . $e->getMessage());
              }
       ?>
              <h1 class="heading"><?= getSemName($semId)?> Semester Information</h1>
             
             <?php
                     if ($result->num_rows == 0) {
                            echo "<h2 class='heading-smaller'>No Student Found...</h2>";
                     }else{
              ?>
                            <div class="box-cover">
                                   <table>
                                          <thead class="top-sticky">
                                                 <tr>
                                                        <th>Regd.No</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                 </tr>
                                          </thead>
                                          <tbody>

                                          <?php
                                                 while ($row = $result->fetch_assoc()){
                                          ?>
                                                        <tr>
                                                               <td><?= $row['regdNo']?></td>
                                                               <td><?= $row['name']?></td>
                                                               <td class="center"><?= $row['phone']?></td>
                                                               <td><?= $row['address']?></td>
                                                               <td>
                                                                      <a href="students.php?view-student-regd-no" class="view-btn">View Details</a>
                                                               </td>
                                                        </tr>
                                          <?php
                                                 }
                                          ?>
                                          </tbody>
                                   </table>
                            </div> 
              <?php
                     }
              ?>
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
                                                 require_once "../includes/semesterShow.php?runningSem"; 
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
                                          <a href="?view-Semester-students&semId=<?= $row['rsid']?>&batch=<?= $row['batch']?>" class="view-btn">View All Students</a>
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
<?php require_once "../../includes/header.php"; ?>
<div class="main center-fdct">

<?php
       if(isset($_GET['viewstudents-sem'])){
?>
<!-- View All Student Code here -->
       <div>
              <h1 class="heading">X Semester Information</h1>
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
                                          <a href="?viewStudent-id" class="view-btn">View Details</a>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Sc-1243423342</td>
                                   <td>Bishal Bhat</td>
                                   <td class="center">39/39</td>
                                   <td>98095343</td>
                                   <td>
                                          <a href="?viewStudent-id" class="view-btn">View Details</a>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Sc-1243423342</td>
                                   <td>Bishal Bhat</td>
                                   <td class="center">39/39</td>
                                   <td>98095343</td>
                                   <td>
                                          <a href="?viewStudent-id" class="view-btn">View Details</a>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Sc-1243423342</td>
                                   <td>Bishal Bhat</td>
                                   <td class="center">39/39</td>
                                   <td>98095343</td>
                                   <td>
                                          <a href="?viewStudent-id" class="view-btn">View Details</a>
                                   </td>
                            </tr>
                            <tr>
                                   <td>Sc-1243423342</td>
                                   <td>Bishal Bhat</td>
                                   <td class="center">39/39</td>
                                   <td>98095343</td>
                                   <td>
                                          <a href="?viewStudent-id" class="view-btn">View Details</a>
                                   </td>
                            </tr>
                     </tbody>
              </table>

       </div>

<?php
       }else if(isset($_GET['addSemester'])){
?>
<!-- Code for Adding New Semester -->
              <div>
                     <h1 class="heading">Add New Semester</h1>       
                     <form action="" method="post" name="addNewSemester" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label> <br>
                                   <select name="semester" id="semester">
                                          <option value="" selected disabled>Select Semester</option>
                                          <option value="1st">1st Semester</option>
                                          <option value="2nd">2nd Semester</option>
                                          <option value="3rd">3rd Semester</option>
                                          <option value="4th">4th Semester</option>
                                          <option value="5th">5th Semester</option>
                                          <option value="6th">6th Semester</option>
                                          <option value="7th">7th Semester</option>
                                          <option value="8th">8th Semester</option>
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
              <div class="sem-container width-large">
                     <div class="semester-box">1st <br>Sem</div> 
                     <p>95 Students</p> 
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">3rd <br>Sem</div> 
                     <p>43 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">5th <br>Sem</div> 
                     <p>38 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">6th <br>Sem</div> 
                     <p>32 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn">Delete Semester</a>
                     </div>
              </div>
              <div class="sem-container width-large">
                     <div class="semester-box">8th <br>Sem</div> 
                     <p>28 Students</p>
                     <div class="action">
                            <a href="?viewstudents-sem" class="view-btn">View All Students</a>
                            <a href="?deleteSemester-id" class="delete-btn">Delete Semester</a>
                     </div>
              </div>
              <div class="center">
                     <a href="?addSemester" class="add-btn font-large">Add New Semester</a>
              </div>
       </div>
       
       <?php
       }
       ?>
</div>


<?php require_once "../../includes/footer.php"; ?>
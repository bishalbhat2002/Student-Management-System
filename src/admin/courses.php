<?php require_once "../../includes/header.php"; ?>


<!-- Code to Select semester for Viewing courses -->
<?php
       if(isset($_GET['view-courses'])){
?>
       <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Courses</h1>
                     <form action="?view-courses-sem" name="SelectSem" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="view courses" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>

<!-- Code for Viewing courses -->
<?php
       }else if(isset($_GET['view-courses-sem'])){           
?>
       <div class="main center-fdct">
              <h1 class="heading">X semester, View Courses</h1>
              <table>
                     <thead>
                            <tr>
                                   <th>Course ID</th>
                                   <th>Course Title</th>
                                   <th>Teacher ID</th>
                                   <th>Teacher Name</th>
                            </tr>
                     </thead>
                     <tbody>
                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>
                     </tbody>
              </table>

              <div class="mt-3 center">
                     <a href="?assign-teacher-to-course-sem" class="edit-btn font-large">Edit Courses</a>
              </div>

       </div>

<!-- Code to Select semester for assigning Teachers to courses -->
<?php
       }else if(isset($_GET['assign-teacher-to-course'])){           
?>
        <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Assign Teacher to a Course</h1>
                     <form action="?assign-teacher-to-course-sem" name="SelectSem" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="view courses" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>

<!-- Code for assigning Teachers to courses -->
<?php
       }else if(isset($_GET['assign-teacher-to-course-sem'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Semester X, Assign Teacher to a Course</h1>
                     <form action="" method="POST" name="teacher-Assign" enctype="multipart/form-data">
                            <table class="edit-table">

                                   <thead>
                                          <tr>
                                                 <th>Course ID</th>
                                                 <th>Course Title</th>
                                                 <th>Teacher ID</th>
                                                 <th>Teacher Name</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>
                                          
                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>
                                   </tbody>
                            </table>       
                            <div class="mt-3 center">
                                   <input type="submit" class="font-large mt-3 save-btn" value="save changes">
                            </div>
                     </form>
              </div>

<!-- Code to Select semester for viewing Course schedule -->
<?php
       }else if(isset($_GET['view-course-Schedule'])){           
?>
       <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">View Course Schedule</h1>
                     <form action="?view-course-schedule-sem" name="SelectSem" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="view Schedule" class="view-btn">
                            </div>
                     </form>
              </div>
       </div>     

<!-- Code for viewing Course schedule -->
<?php
       }else if(isset($_GET['view-course-schedule-sem'])){          
?>              
              <div class="main center-fdct">
                     <h1 class="heading">Semester X, View Course Schedule</h1>
                     <form action="?edit-course-schedule" method="POST" name="edit-course-schedule" enctype="multipart/form-data">
                            <table class="edit-table">

                                   <thead>
                                          <tr>
                                                 <th>Cid</th>
                                                 <th>Course Title</th>
                                                 <th>Tid</th>
                                                 <th>Teacher Name</th>
                                                 <th>From</th>
                                                 <th>To</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>
                                                        Bishal Bhat
                                                        <a href="" class="teacher-info-link">&#8599;</a>
                                                 </td>
                                                 <td> X:00 AM</td>
                                                 <td> Y:00 AM</td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>
                                                        Bishal Bhat
                                                        <a href="" class="teacher-info-link">&#8599;</a>
                                                 </td>
                                                 <td> X:00 AM</td>
                                                 <td> Y:00 AM</td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>
                                                        Bishal Bhat
                                                        <a href="" class="teacher-info-link">&#8599;</a>
                                                 </td>
                                                 <td> X:00 AM</td>
                                                 <td> Y:00 AM</td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>
                                                        Bishal Bhat
                                                        <a href="" class="teacher-info-link">&#8599;</a>
                                                 </td>
                                                 <td> X:00 AM</td>
                                                 <td> Y:00 AM</td>
                                          </tr>
                                   </tbody>
                            </table>
                     </form>
                     <div class="mt-3 center">
                            <a href="?edit-course-schedule-sem" class="edit-btn font-large">Edit Course Schedule</a>
                     </div>

              </div>


<!-- Code to Select semester for editing Course schedule -->
<?php
       }else if(isset($_GET['edit-course-schedule'])){           
?>      
              <div class="main center-fdct">
              <div class="center-fdct">
                     <h1 class="heading">Edit Course Schedule</h1>
                     <form action="?edit-course-schedule-sem" name="SelectSem" method="POST" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" disabled selected>Select Semester</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <!-- Add All semester dynamically using PHP -->
                                   </select>
                            </div>
                            <div class="center">
                                   <input type="submit" name="submit" value="view schedule" class="view-btn">
                            </div>
                     </form>
              </div>
              </div>  

<!-- Code for editing Course schedule -->
<?php
       }else if(isset($_GET['edit-course-schedule-sem'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Semester X, Edit Course Schedule</h1>
                     <form action="?edit-course-schedule" method="POST" name="edit-course-schedule" enctype="multipart/form-data">
                            <table class="edit-table">

                                   <thead>
                                          <tr>
                                                 <th>Cid</th>
                                                 <th>Course Title</th>
                                                 <th>Tid</th>
                                                 <th>Teacher Name</th>
                                                 <th>From</th>
                                                 <th>To</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>
                                          
                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>

                                          <tr>
                                                 <td class="tac">CSIT-101</td>
                                                 <td>Data Structures and Algorithm</td>
                                                 <td class="tac">1001</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tid" class="m-0">
                                                 </td>
                                                 <td class="v-align-m">
                                                        <input type="text" name="tname" class="m-0">
                                                 </td>
                                          </tr>
                                         
                                   </tbody>
                                   
                            </table>     
                            <div class="mt-3 center">
                                   <input type="submit" class="font-large mt-3 save-btn" value="save changes">
                            </div>
                     </form>
              </div>

<!-- Code To display Default Options... -->
<?php
       }else{
?> 
       <div class="main center">
       <div class="center-fdc gap">
              <a href="?view-courses" class="view-btn x-width">View Courses</a>
              <a href="?assign-teacher-to-course" class="view-btn x-width">Assign Teacher to a course</a> 
              <a href="?view-course-Schedule" class="view-btn x-width">View Course Schedule</a> 
              <a href="?edit-course-schedule" class="view-btn x-width">Edit Course Schedule</a>
       </div>
       </div>
<?php
       }
?>



<?php require_once "../../includes/footer.php"; ?>


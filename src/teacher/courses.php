<?php require_once "../../includes/header.php"; ?>

<!-- Code for Viewing Teacher -->
<?php
       if(isset($_GET['view-teacher-tid'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading mt-1">Tid: 1001 - View Teacher</h1>
                     <form action="" method="post" name="view-teacher-form" enctype="multipart/form-data" class="form-expan mb-1">
                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div>
                                   <label for="phone">Phone:</label>
                                   <input type="number" name="phone" id="phone">
                            </div>
                            <div>
                                   <label for="email">Email:</label>
                                   <input type="email" name="email" id="email">
                            </div>                      
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="text" name="dob" id="dob">
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender">
                            </div>  
                            <div>
                                   <label for="academic-qualifications">Academic Qualifications:</label>
                                   <input type="text" name="academic-qualifications" id="academic-qualifications">
                            </div>
                            <div class="col-span-2">
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div>  
                     </form>
              </div>


<!-- Code to Select semester for Viewing courses -->
<?php
       }else if(isset($_GET['view-courses'])){
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
                                          <a href="?view-teacher-tid" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="?view-teacher-tid" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="?view-teacher-tid" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>

                            <tr>
                                   <td class="center">CSIT-101</td>
                                   <td>Data Structures and Algorithm</td>
                                   <td class="center">1001</td>
                                   <td>
                                          <span>Bishal Bhat</span>
                                          <a href="?view-teacher-tid" class="teacher-info-link">&#8599;</a>
                                   </td>
                            </tr>
                     </tbody>
              </table>
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
                                                 <a href="?view-teacher-tid" class="teacher-info-link">&#8599;</a>
                                          </td>
                                          <td> X:00 AM</td>
                                          <td> Y:00 AM</td>
                                   </tr>
                            </tbody>
                     </table>
              </div>

<!-- Code To display Default Options... -->
<?php
       }else{
?> 
       <div class="main center">
       <div class="center-fdc gap">
              <a href="?view-courses" class="view-btn x-width">View Courses</a> 
              <a href="?view-course-Schedule" class="view-btn x-width">View Course Schedule</a> 
       </div>
       </div>
<?php
       }
?>



<?php require_once "../../includes/footer.php"; ?>


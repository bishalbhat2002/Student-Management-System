<?php require_once "../../includes/header.php"; ?>


<!-- Code for Adding New Student -->
<?php
       if(isset($_GET['add-student'])){
?>
              <div class="main center-fdct">
                     <h1 class="heading">Add New Student</h1>
                     <form action="?view-all-students" method="post" name="add-student-form" enctype="multipart/form-data" class="form-expan">
                            <div>
                                   <label for="regd-no">Registration No:</label>
                                   <input type="text" name="regd-no" id="regd-no">
                            </div>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty">
                            </div> 
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="radio" name="gender" value="male">Male
                                   <input type="radio" name="gender" value="female">Female
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
                                   <input type="date" name="dob" id="dob">
                            </div>      
             

                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div> 
                               
                            <div>
                                   <label for="parent-phone">Parent Phone:</label>
                                   <input type="number" name="parent-phone" id="parent-phone">
                            </div>                                

                            <div> 
                                   <label for="photo">Upload Photo:</label>
                                   <input type="file" name="photo" id="photo">
                            </div>              
                            <div>
                                   <label for="see-result">SEE Result:</label>
                                   <input type="file" name="see-result" id="see-result">
                            </div>
                            <div>
                                   <label for="neb-result">NEB Result:</label>
                                   <input type="file" name="neb-result" id="neb-result">
                            </div>

                            <div class="col-span-2 center">
                                   <button class="add-btn btn large mt-1">Add Student</button>
                            </div>
                            

                     </form>

              </div>


<!-- Code for Viewing All Students -->
<?php
       }else if(isset($_GET['view-all-students'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Students</h1>
                     <div class="box-expan-normal center">
                            <table>
                                   <thead>
                                          <tr>
                                                 <th title="Registration Number">Regd. No</th>
                                                 <th>Name</th>
                                                 <th>Attendance</th>
                                                 <th>Address</th>
                                                 <th title="Actions you can Perfrom">Action</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td class="tac v-align-m">SC-4903-3293-23</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">41/45</td>
                                                 <td>Dodhara Chandani Mp-3, Kanchanppur</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View</a>
                                                        <a href="?edit-student-regd-no" class="edit-btn">Edit</a>
                                                        <a href="?delete-student-regd-no" class="delete-btn">Delete</a>
                                                 </td>
                                          </tr>
                                          
                                   </tbody>
                            </table>

                     </div>
              </div>


<!-- Code for entering Registration Number for viewing Student -->
<?php
       }else if(isset($_GET['view-student'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Student</h1>
                     <form action="?view-student-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="regd-no">Enter Regd. No:</label>
                                   <input type="text" name="regd-no" id="regd-no">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Student" class="view-btn">
                            </div>
                            
                            <hr class="mt-1">

                            <div class="center mt-2">
                                   <a href="?view-all-students" class="view-btn">View all Students</a>
                            </div>
                     </form>
              </div>


<!-- Code for viewing Student -->
<?php
       }else if(isset($_GET['view-student-regd-no'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Student</h1>
                     <form action="?edit-student-regd-no" method="post" name="view-student-form" enctype="multipart/form-data" class="form-expan small-input-field">
                           
                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>       
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>                            
                            <div>
                                   <label for="regd-no">Registration No:</label>
                                   <input type="text" name="regd-no" id="regd-no">
                            </div>
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty">
                            </div>   
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender">
                            </div>                              
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="date" name="dob" id="dob">
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
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div> 
                            <div>
                                   <label for="parent-phone">Parent Phone:</label>
                                   <input type="number" name="parent-phone" id="parent-phone">
                            </div>                                
                            <div>
                                   <label for="view-results">View Results:</label> <br>
                                   <div id="view-results"> 
                                          <a href="../../assets/image.jpg" target="_blank" class="view-btn btn">SEE Result</a>
                                          <a href="../../assets/image.jpg" target="_blank" class="view-btn btn">NEB Result</a>
                                   </div>
                            </div>            
                            <div class="col-span-2 center">
                                   <button class="edit-btn btn large mt-1">Edit Student</button>
                            </div>
                            

                     </form>

              </div>

<!-- Code for entering Student Registration Number for Editing Details -->
<?php
       }else if(isset($_GET['edit-student'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Edit Student</h1>
                     <form action="?edit-student-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="regd-no">Enter Regd. No:</label>
                                   <input type="text" name="regd-no" id="regd-no">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="Find Student" class="edit-btn">
                            </div>
                     </form>
              </div>
       


<!-- Code for editing Student -->
<?php
       }else if(isset($_GET['edit-student-regd-no'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Edit Student</h1>
                     <form action="" method="post" name="view-student-form" enctype="multipart/form-data" class="form-expan small-input-field">
                           
                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image small-image">
                            </div>       
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty">
                            </div>                        
                            <div>
                                   <label for="dob">DOB:</label>
                                   <input type="date" name="dob" id="dob">
                            </div>      
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="radio" name="gender" value="male">Male
                                   <input type="radio" name="gender" value="female">Female
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
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div>         
                            <div>
                                   <label for="parent-phone">Parent Phone:</label>
                                   <input type="number" name="parent-phone" id="parent-phone">
                            </div>                                

                            <div> 
                                   <label for="photo">Upload Photo:</label>
                                   <input type="file" name="photo" id="photo">
                            </div> 
                            <div>
                                   <label for="view-results">View Results:</label> <br>
                                   <div id="view-results"> 
                                          <a href="" class="view-btn btn">SEE Result</a>
                                          <a href="" class="view-btn btn">NEB Result</a>
                                   </div>
                            </div>            
                            <div>
                                   <label for="see-result">SEE Result:</label>
                                   <input type="file" name="see-result" id="see-result">
                            </div>
                            <div>
                                   <label for="neb-result">NEB Result:</label>
                                   <input type="file" name="neb-result" id="neb-result">
                            </div>

                            <div class="col-span-2 center">
                                   <button class="save-btn btn large mt-1">Save Changes</button>
                            </div>
                            

                     </form>

              </div>




<!-- Code for entering Student Registration Number for Adding Admission -->
<?php
       }else if(isset($_GET['add-admission'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Add Admission</h1>
                     <form action="?add-admission-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="regd-no">Enter Regd. No:</label>
                                   <input type="text" name="regd-no" id="regd-no">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="Find Student" class="edit-btn">
                            </div>
                     </form>
              </div>

<!-- Code for editing Adding Student Admission -->
<?php
       }else if(isset($_GET['add-admission-regd-no'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Add Admission</h1>
                     <form action="" method="post" name="add-admission-form" enctype="multipart/form-data" class="form-expan small-input-field">
                           
                            <div class="col-span-2 center mb-1">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>       
                            <div>
                                   <label for="regd-no">Registration No:</label>
                                   <input type="text" name="regd-no" id="regd-no">
                            </div>  <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div>
                                   <label for="phone">Phone:</label>
                                   <input type="number" name="phone" id="phone">
                            </div>                        
                            <div>
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div> 
                            <div>
                                   <label for="faculty">Faculty:</label>
                                   <input type="text" name="faculty" id="faculty">
                            </div>                                
                            <div>
                                   <label for="parent-phone">Parent Phone:</label>
                                   <input type="number" name="parent-phone" id="parent-phone">
                            </div>    
                            
                            <div class="col-span-2 mt-1 mb-1">
                                   <hr>                            
                            </div>

                            <div> 
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" selected disabled>Select Sem</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <option value="8th Sem">8th Semester</option>
                                   </select>
                            </div> <br>      
                            <div>
                                   <label for="amount">Enter Amount:</label>
                                   <input type="number" name="amount" id="amount" title="Enter Amount Submitted by student in Numbers...">
                            </div>
                            <div>
                                   <label for="voucher-photo">Upload Photo:</label>
                                   <input type="file" name="voucher-photo" id="voucher-photo" title="Upload proof of Amount submit...">
                            </div>

                            <div class="col-span-2 center">
                                   <button class="add-btn btn large mt-1">Add Admission</button>
                            </div>        

                     </form>
              </div>



<!-- Code for Selecting Semester for Viewing Admission -->
<?php
       }else if(isset($_GET['view-admission'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Admission</h1>
                     <form action="?view-admission-semester" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Select Semester:</label>
                                   <select name="semester" id="semester">
                                          <option value="" selected disabled>Select Sem</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <option value="8th Sem">8th Semester</option>
                                   </select>                                
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Admission" class="view-btn">
                            </div>
                     </form>
              </div>



<!-- Code for Viewing Admission -->
<?php
       }else if(isset($_GET['view-admission-semester'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Semester X, View Admission</h1>
                     <div>
                            <table>
                                   <thead>
                                          <tr>
                                                 <th>Regd. No.</th>
                                                 <th>Name</th>
                                                 <th>Fee Submitted</th>
                                                 <th>Phone</th>
                                                 <th>Action</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td>SC-4632-32332-323-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">16500</td>
                                                 <td>98063888</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>  
                                          <tr>
                                                 <td>SC-4632-32332-323-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">16500</td>
                                                 <td>98063888</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td>SC-4632-32332-323-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">16500</td>
                                                 <td>98063888</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td>SC-4632-32332-323-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">16500</td>
                                                 <td>98063888</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>
                                          <tr>
                                                 <td>SC-4632-32332-323-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td class="tac v-align-m">16500</td>
                                                 <td>98063888</td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>       
                                   </tbody>
                            </table>
                     </div>
              </div>

<!-- Code for entering Batch or Student Registration Number for Viewing  Fees -->
<?php
       }else if(isset($_GET['view-fees'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Fees</h1>
                     <form action="?view-fees-batch-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="batch">Enter Batch:</label>
                                   <input type="number" name="batch" id="batch">                                   
                            </div>
                            <div class="center large bold">
                                   OR
                            </div>
                            <div>
                                   <label for="regd-no">Enter Regd. No:</label>
                                   <input type="text" name="regd-no" id="regd-no">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Fees" class="view-btn">
                            </div>
                     </form>
              </div>

<!-- Code for Viewing Fees -->
<?php
       }else if(isset($_GET['view-fees-batch-regd-no'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">View Fees - 20YY Batch</h1>
                     <div>
                            <table class="smaller-table">
                                   <thead>
                                          <tr>
                                                 <th>Regd. No.</th>
                                                 <th>Name</th>
                                                 <th>1st Sem</th>
                                                 <th>2nd Sem</th>
                                                 <th>3rd Sem</th>
                                                 <th>4th Sem</th>
                                                 <th>5th Sem</th>
                                                 <th>6th Sem</th>
                                                 <th>7th Sem</th>
                                                 <th>8th Sem</th>
                                                 <th>Action</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                          <tr>
                                                 <td>SC-4632-32332-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td>16500</td>
                                                 <td>1600, 500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td></td>
                                                 <td></td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>                                            
                                          <tr>
                                                 <td>SC-4632-32332-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td>16500</td>
                                                 <td>1600, 500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td></td>
                                                 <td></td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>                                            
                                          <tr>
                                                 <td>SC-4632-32332-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td>16500</td>
                                                 <td>1600, 500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td></td>
                                                 <td></td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>                                            
                                          <tr>
                                                 <td>SC-4632-32332-32</td>
                                                 <td>Bishal Bhat</td>
                                                 <td>16500</td>
                                                 <td>1600, 500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td>16500</td>
                                                 <td></td>
                                                 <td></td>
                                                 <td>
                                                        <a href="?view-student-regd-no" class="view-btn">View Student</a>
                                                 </td>
                                          </tr>  
                                                
                                   </tbody>
                            </table>
                     </div>
              </div>


<!-- Code for entering Registration Number For Deletion -->
<?php
       }else if(isset($_GET['delete-student'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Delete Student</h1>
                     <form action="?delete-student-regd-no" method="post" name="student-regd-form" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="tid">Enter Teacher ID:</label>
                                   <input type="number" name="tid" id="tid">                                   
                            </div>
                            <div class="center">
                                   <input type="submit" value="View Teacher" class="view-btn">
                            </div>
                     </form>
              </div>



<!-- Code for Deleting Deleting -->
<?php
       }else if(isset($_GET['delete-student-regd-no'])){           
?>
              <div class="main center-fdct">
                     <h1 class="heading">Delete Student</h1>
                     <form action="?view-all-students" method="post" name="delete-student-form" enctype="multipart/form-data" class="form-expan">
                            <div class="col-span-2 center mb-2">
                                   <img src="../../assets/images/image.jpg" alt="Photo" class="image">
                            </div>
                            <div>
                                   <label for="name">Name:</label>
                                   <input type="text" name="name" id="name">
                            </div>
                            <div class="gender">
                                   <label for="gender">Gender:</label><br>
                                   <input type="text" name="gender" id="gender">
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
                                   <label for="parent">Parent:</label><br>
                                   <input type="text" name="parent" id="parent">
                            </div>                           
                            <div>
                                   <label for="parent-phone">Parent Phone:</label><br>
                                   <input type="number" name="parent-phone" id="parent-phone">
                            </div>     
                            <div class="col-span-2">
                                   <label for="address">Address:</label>
                                   <input type="text" name="address" id="address">
                            </div>


                            <div class="col-span-2 center">
                                   <button class="delete-btn btn large mt-1">Delete Student</button>
                            </div>    
                     </form>
              </div>

<!-- Code To display Default Teacher Options... -->
<?php
       }else{
?>        
              <div class="main center">
                     <div class="center-fdct gap-2">
                            <a href="?add-student" class="view-btn x-width">Add Student</a>
                            <a href="?view-student" class="view-btn x-width">View Student</a>
                            <a href="?edit-student" class="view-btn x-width">Edit Student</a>
                            <a href="?add-admission" class="view-btn x-width">Add Admission</a>
                            <a href="?view-admission" class="view-btn x-width">View Admission</a>
                            <a href="?view-fees" class="view-btn x-width">View Fees</a>
                            <a href="?delete-student" class="view-btn x-width">Delete Student</a>
                     </div>
              </div>
<?php
       }
?>



<?php require_once "../../includes/footer.php"; ?>






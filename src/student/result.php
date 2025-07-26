<?php require_once "../includes/header.php"; ?>



<!-- Code to View Result for selected SEM... -->
<?php
       if(isset($_GET['result-view-sem'])){
?>
               <div class="main center-fdc">
                     <div class="box-color-white" id="result">
                     <form action="" method="POST" name="resultForm" enctype="multipart/form-data">
                                   <!-- Header Section -->
                                   <div class="header">
                                          <div class="fwu-logo">
                                                 <img src="<?php echo BASE_URL;?>/public/assets/images/fwu-logo.jpg" alt="FWU-Logo">
                                          </div>  
                                          <div>
                                                 <h1>Farwestern University</h1>
                                                 <h2>Office of the central Examinations</h2>
                                                 <h3>Mahendranagar, Kanchanpur</h3>
                                          </div>                          
                                          <div class="fwu-logo">
                                                 <img src="<?php echo BASE_URL;?>/public/assets/images/fwu-logo.jpg" alt="FWU-Logo">
                                          </div>
                                   </div>
                                   <!-- Student Info Section -->
                                   <div class="student-info-result">
                                          <div class="info-container">
                                                 <span>Name: Bishal Bhat</span>
                                                 <span>Regd. No: SC-4803-3294-3294</span>
                                          </div>
                                          <div class="info-container">
                                                 <span>Level: Undergraduate</span>
                                                 <span>Symbol No: 89003493</span>
                                          </div>
                                          <div class="info-container">
                                                 <span>Program: BSC-CSIT</span>
                                                 <span>Exam Year: 2023</span>
                                          </div>
                                          <div class="info-container">
                                                 <span>Faculty: Science & Technology</span>
                                                 <span>Batch: 2078</span>
                                          </div>
                                          <div class="info-container">
                                                 <span>Campus: FWU Central Campus</span>
                                                 <span>Semester: 1st Sem</span>
                                          </div>
                                          <div class="info-container">
                                                 <span>Date of Birth: 205x/0x/0y</span>
                                          </div>
                                   </div>
                                   <!-- Student Marks Section -->
                                   <div class="marks">
                                          <table class="result-table">
                                                 <thead>
                                                        <tr>
                                                               <th>Course ID</th>
                                                               <th>Course Title</th>
                                                               <th colspan="2">Marks Obtained <span>[TH]</span> <Span>[PR]</Span></th>
                                                               <th>MO</th>
                                                               <th>FM</th>
                                                               <th>Result</th>
                                                        </tr>
                                                 </thead>
                                                 <tbody>
                                                        <tr>
                                                               <td>CSIT-111</td>
                                                               <td>Subject-1 efefr erogjri rtioeh</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>Pass</td>
                                                        </tr>                             
                                                        <tr>
                                                               <td>CSIT-111</td>
                                                               <td>Subject-1</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>Pass</td>
                                                        </tr>
                                                        <tr>
                                                               <td>CSIT-111</td>
                                                               <td>Subject-1</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>Pass</td>
                                                        </tr>
                                                        <tr>
                                                               <td>CSIT-111</td>
                                                               <td>Subject-1</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>Pass</td>
                                                        </tr>
                                                        <tr>
                                                               <td>CSIT-111</td>
                                                               <td>Subject-1</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>x.y</td>
                                                               <td>Pass</td>
                                                        </tr>
                                                 </tbody>
                                                 <tfoot>              
                                                        <tr>
                                                               <td colspan="7"><b>PASS</b></td>
                                                        </tr>
                                                        <tr>
                                                               <td colspan="7"><b>Total Obtained Marks:</b> x.y</Marks:br></td>
                                                        </tr>
                                                        <tr>
                                                               <td colspan="7"><b>Total Full Marks:</b> x.y</Marks:br></td>
                                                        </tr>     
                                                 </tfoot>
                                          </table>
                                   </div>

                                   <!-- Note Section -->
                                   <div class="result-note">
                                          <b>Note:</b>
                                          <p>
                                                 This Grade Sheet is for general idea of marks you secured. This is not for 
                                                 official use. If any mistakes appear; report at Administration ledger will 
                                                 be referred.
                                          </p>
                                   </div>

                            </form>
                     </div>   
                     <div class="center mt-1">
                            <button class="save-btn btn" onclick="downloadResultPDF()">Download Result</button>
                     </div>
              </div>
<?php
       }else{
?>     
<!-- Code for Selecting Semester for Result View -->

              <div class="center-fdct main">
                     <h1 class="heading">View Result</h1>
                     <form action="?result-view-sem" name="semester-select-form" method="post" enctype="multipart/form-data" class="form">
                            <div>
                                   <label for="semester">Semester:</label>
                                   <select name="semester" id="semester"  >
                                          <option value="" selected disabled>Select Sem</option>
                                          <option value="1st Sem">1st Semester</option>
                                          <option value="2nd Sem">2nd Semester</option>
                                          <option value="8th Sem">8th Semester</option>
                                   </select>
                            </div>
                            <div class="center">
                                   <button type="submit" class="view-btn btn mt-2 large">View Result</button>
                            </div>
                     </form>
              </div>
<?php
       }
?>  

<?php require_once "../includes/footer.php"; ?>
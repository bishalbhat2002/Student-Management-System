<?php require_once "../includes/header.php"; ?>


<!-- Code for Selecting Batch and Semester for Result Publish -->
<?php
if (isset($_GET['publish-result'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">Publish Result</h1>
              <form action="?publish-result-batch-year" name="result-publish-form" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" min="2062" max="<?php echo date('Y') + 57; ?>">
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <option value="1st Sem">1st Semester</option>
                                   <option value="2nd Sem">2nd Semester</option>
                                   <option value="8th Sem">8th Semester</option>
                            </select>
                     </div>
                     <div class="center">
                            <button type="submit" class="add-btn btn mt-2 large">Add</button>
                     </div>
              </form>
       </div>

       <!-- Code for entering Regd. No and Symbol Number for Result Publish -->
<?php
} else if (isset($_GET['publish-result-batch-year'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">20YY Batch, X semester: Result Publish</h1>
              <form action="?publish-result-batch-year-regd-symbo-no" name="result-publish-form" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="registration-no">Regd. No:</label>
                            <input type="text" name="registration-no" id="registration-no">
                     </div>

                     <div>
                            <label for="symbol-no">Symbol No:</label>
                            <input type="number" name="symbol-no" id="symbol-no">
                     </div>

                     <div class="center">
                            <button type="submit" class="add-btn btn mt-2 large">Add</button>
                     </div>
              </form>

       </div>


       <!-- Code to enter students marks for result Publish-->
<?php
} else if (isset($_GET['publish-result-batch-year-regd-symbo-no'])) {
?>

       <div class="main center-fdct">
              <h1 class="heading">20YY Batch, X Semester: Result Publish</h1>
              <form action="?result-view-id" name="result-publish-form" method="post" enctype="multipart/form-data" class="form-expan">
                     <div>
                            <label for="registration-no">Regd. No:</label>
                            <input type="text" name="registration-no" id="registration-no">
                     </div>
                     <div>
                            <label for="symbol-no">Symbol No:</label>
                            <input type="number" name="symbol-no" id="symbol-no">
                     </div>

                     <table class="col-span-2 add-result-table-style">
                            <thead>
                                   <tr>
                                          <th colspan="2">Subjects</th>
                                          <th>Theory</th>
                                          <th>Practical</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                            </tbody>
                     </table>
                     <br>

                     <div class="center col-span-2 mt-2">
                            <button class="btn save-btn large">Save</button>
                     </div>
              </form>
       </div>

       <!-- Code for entering Batch, Semester, Regd. No, and Symbol. No. for Result Edit  -->
<?php
} else if (isset($_GET['edit-result'])) {
?>

       <div class="main center-fdct">
              <h1 class="heading">Result Edit</h1>
              <form action="?edit-result-id" name="result-edit-form" method="post" enctype="multipart/form-data" class="form-expan">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" min="2062" max="<?php echo date('Y') + 57; ?>">
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <option value="1st Sem">1st Semester</option>
                                   <!-- Add Semesters Dynamically using PHP -->
                                   <option value="8th Sem">8th Semester</option>
                            </select>
                     </div>
                     <div>
                            <label for="registration-no">Regd. No:</label>
                            <input type="text" name="registration-no" id="registration-no">
                     </div>
                     <div>
                            <label for="symbol-no">Symbol No:</label>
                            <input type="number" name="symbol-no" id="symbol-no">
                     </div>

                     <div class="center col-span-2">
                            <button type="submit" class="edit-btn btn mt-2 large">Edit</button>
                     </div>
              </form>
       </div>


       <!-- Code to Edit Result (Edit marks in result) -->
<?php
} else if (isset($_GET['edit-result-id'])) {
?>

       <div class="main center-fdct">
              <h1 class="heading">20YY Batch, X Semester: Edit Result</h1>
              <form action="?view-result" name="result-edit-form" method="post" enctype="multipart/form-data" class="form-expan">
                     <div>
                            <label for="registration-no">Regd. No:</label>
                            <input type="text" name="registration-no" id="registration-no">
                     </div>
                     <div>
                            <label for="symbol-no">Symbol No:</label>
                            <input type="number" name="symbol-no" id="symbol-no">
                     </div>

                     <table class="col-span-2 add-result-table-style">
                            <thead>
                                   <tr>
                                          <th colspan="2">Subjects</th>
                                          <th>Theory</th>
                                          <th>Practical</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                                   <tr>
                                          <td class="subject-code">CSIT-101</td>
                                          <td class="subject-name">Subject-1 Lorem ipsum </td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                          <td class="marks-input-box"><input type="number" min="0" max="100"></td>
                                   </tr>
                            </tbody>
                     </table>
                     <br>

                     <div class="center col-span-2 mt-1">
                            <button class="btn save-btn large">Save Changes</button>
                     </div>
              </form>
       </div>


       <!-- Code to enter Batch, Semester, Symbol No to view Result-->
<?php
} else if (isset($_GET['view-result'])) {
?>
       <div class="main center-fdct">
              <h1 class="heading">Result View</h1>
              <form action="?result-view-id" name="result-view-form" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" min="2062" max="<?php echo date('Y') + 57; ?>">
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <option value="1st Sem">1st Semester</option>
                                   <!-- Add Semesters Dynamically using PHP -->
                                   <option value="8th Sem">8th Semester</option>
                            </select>
                     </div>
                     <div>
                            <label for="symbol-no">Symbol No:</label>
                            <input type="number" name="symbol-no" id="symbol-no">
                     </div>

                     <div class="center">
                            <button type="submit" class="edit-btn btn mt-2 large">View</button>
                     </div>
              </form>
       </div>

       <!-- Code to enter Batch and semester for Result Analyzing -->
<?php
} else if (isset($_GET['analyze-result'])) {
?>
       <div class="center-fdct main">
              <h1 class="heading">Analyze Result</h1>
              <form action="?Analyze-result-batch-sem" name="result-analyze-form" method="post" enctype="multipart/form-data" class="form">
                     <div>
                            <label for="batch">Batch:</label>
                            <input type="number" min="2062" max="<?php echo date('Y') + 57; ?>">
                     </div>
                     <div>
                            <label for="semester">Semester:</label>
                            <select name="semester" id="semester">
                                   <option value="" selected disabled>Select Sem</option>
                                   <option value="1st Sem">1st Semester</option>
                                   <!-- Dynamically Add Result using PHP -->
                                   <option value="8th Sem">8th Semester</option>
                            </select>
                     </div>
                     <div class="center">
                            <button type="submit" class="view-btn btn mt-2 large">View Result</button>
                     </div>
              </form>
       </div>

       <!-- Code to View Result of entire Semester -->
<?php
} else if (isset($_GET['Analyze-result-batch-sem'])) {
?>

       <div class="center-fdct main">
              <h1 class="heading-smaller">Batch: 20YY, Sem: X - Analyze Result</h1>
              <form action="?Analyze-result-batch-sem" name="result-publish-form" method="post" enctype="multipart/form-data" class="form-result-analyze">
                     <div class="center">
                            <label for="filter" class="mr-1">Filter:</label>
                            <select name="filter" id="filter" class="mr-3">
                                   <option value="Pass" selected>PASS</option>
                                   <option value="Fail">FAIL</option>
                            </select>

                            <label for="sort" class="mr-1">Sort By:</label>
                            <select name="sort" id="sort" class="mr-3">
                                   <option value="desc" selected>Highest First </option>
                                   <option value="asc">Lowest First</option>
                            </select>
                            <button type="submit" class="view-btn btn">View Result</button>
                     </div>
              </form>
              <hr>

              <div class="center-fdct">
                     <table class="mt-1" id="result-analysis-table">
                            <thead class="top-sticky">
                                   <tr>
                                          <th>Symbol No:</th>
                                          <th>Name</th>
                                          <th title="DSA">CSIT-101</th>
                                          <th title="MP">CSIT-102</th>
                                          <th title="DAA">CSIT-103</th>
                                          <th title="WEB-Technology">CSIT-104</th>
                                          <th title="IT">CSIT-105</th>
                                          <th title="C++">CSIT-106</th>
                                          <th>GPA</th>
                                          <th>Result</th>
                                          <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?result-view-id" class="view-btn">View</a>
                                          </td>
                                   </tr>


                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>

                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>

                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>


                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>

                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>
                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>


                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>

                                   <tr>
                                          <td>09389437894</td>
                                          <td>Bishal Bhat</td>
                                          <td class="tac">90</td>
                                          <td class="tac">91</td>
                                          <td class="tac">97</td>
                                          <td class="tac">99</td>
                                          <td class="tac">91</td>
                                          <td class="tac">99</td>
                                          <td></td>
                                          <td class="tac">Pass</td>
                                          <td class="center gap-05">
                                                 <a href="?edit-result-id" class="edit-btn">Edit</a>
                                                 <a href="?view" class="view-btn">View</a>
                                          </td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>

                                   <tr>
                                          <td>fewkl</td>
                                   </tr>


                            </tbody>
                     </table>
              </div>
       </div>



       <!-- Code to View Result... -->
<?php
} else if (isset($_GET['result-view-id'])) {
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
                                                        <td colspan="7"><b>Total Obtained Marks:</b> x.y</Marks:br>
                                                        </td>
                                                 </tr>
                                                 <tr>
                                                        <td colspan="7"><b>Total Full Marks:</b> x.y</Marks:br>
                                                        </td>
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
} else {
?>
       <div class="main center">
              <div class="center-fdc gap">
                     <a href="?publish-result" class="view-btn x-width">Publish Result</a>
                     <a href="?edit-result" class="view-btn x-width">Edit Result</a>
                     <a href="?view-result" class="view-btn x-width">View Result</a>
                     <a href="?analyze-result" class="view-btn x-width">Analyze Result</a>
              </div>
       </div>
<?php
}
?>



<?php require_once "../includes/footer.php"; ?>
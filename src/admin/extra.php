    <?php
       $batch = trim($_GET['batch']);
       $semId = (!empty($_GET['semester'])) ? $_GET['semester'] : '';
       
       $semName = getSemName($semId);
       
       if (empty($semId) || empty($batch)) {
              header("location: result.php?analyze-result&error=All fields are Required.");
              exit();
       }

       try {
              $sql = "SELECT * from student s JOIN sem{$semId}result r ON s.regdNo = r.regdNo WHERE s.batch = '$batch'";
              $result = $conn->query($sql);
              if ($result->num_rows === 0) {
                     header("location: result.php?edit-result&error=No result exists for $batch Batch - $semName Sem.");
                     exit();
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }

       $courses = getCourses($semId);
       $semName = getSemName($semId);

       while ($row = $result->fetch_assoc()) {
              
              $status = "PASS";
              $totalMarks = 0;

              foreach ($courses as $course) {
                     $courseId = $course['cid'];        // Course ID
                     $courseName = $course['cname'];    // Course Name

                     $thfm = $course['TH'];             // Course Theory Full Marks
                     $prfm = $course['PR'];             // Course Pratical Full Marks

                     #Making keys for Semester Result Table From Course table's cid. 
                     $thkey = $course['cid'] . "_TH";
                     $prkey = $course['cid'] . "_PR";

                     $thMarks = (isset($row[$thkey]) ? $row[$thkey] : 0);
                     $prMarks = (isset($row[$prkey]) ? $row[$prkey] : 0);

                     $marksObtained = $thMarks + $prMarks;            // Marks obtained for a subject (Th + Pr)

                     $totalMarksObtained += $marksObtained;           // Total Marks obtained by Student
                     
                     if($status !== "FAIL"){
                            #check for Theory Marks
                            if ($thfm == 100) {
                                   if (isset($row[$thkey]) && $row[$thkey] < 45) {
                                          $Status = "FAIL";
                                   }
                            } else {
                                   if (isset($row[$thkey]) && $row[$thkey] < 27) {
                                          $Status = "FAIL";
                                   }
                            }
                            
                            #check for Pratical Marks
                            if ($prfm == 100) {
                                   if (isset($row[$prkey]) && $row[$prkey] < 45) {
                                          $Status = "FAIL";
                                   }
                            } else {
                                   if (isset($row[$prkey]) && $row[$prkey] < 18) {
                                          $Status = "FAIL";
                                   }
                            }
                     }

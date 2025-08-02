 <?php

       try {
              $sql = "SELECT * from student s JOIN sem{$semId}result r ON s.regdNo = r.regdNo WHERE r.symbolNo = '$symbolNo'";
              $result = $conn->query($sql);
              if ($result->num_rows === 0) {
                     header("location: result.php?edit-result&error=No result exists for Symbol Number - $symbolNo");
                     exit();
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }

       $row = $result->fetch_assoc();
       $courses = getCourses($semId);

       foreach ($courses as $course) {
              $courseId = $course['cid'];
              $courseName = $course['cname'];

              #Making keys for Semester Result Table From Course table's cid. 
              $thkey = $course['cid'] . "_TH";
              $prkey = $course['cid'] . "_PR";

              $thMarks = (isset($row[$thkey]) ? $row[$thkey] : '');
              $prMarks = (isset($row[$prkey]) ? $row[$prkey] : '');
       }

       ?>
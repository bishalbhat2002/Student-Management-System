<?php
              try{
                     $sql = "SELECT * FROM teacher"; 
       
                     $resultTeacher = $conn->query($sql);
                     if (!$resultTeacher->num_rows > 0) {
                           echo "<h2 class='heading-smaller'>No Teacher Found...</h2>";
                     }else{
                            while ($rowTeacher = $resultTeacher->fetch_assoc()) {
                                   echo "<option value='{$rowTeacher['tid']}'>{$rowTeacher['name']}</option>";
                            }
                     }
              } catch (Exception $e) {
                     exit('<br><b>Error:</b>'.$e->getMessage());
              }

?>
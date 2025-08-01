<?php
              try{
                     $sql = "SELECT * FROM semester"; 
       
                     $result = $conn->query($sql);
                     if (!$result->num_rows > 0) {
                           echo "<h2 class='heading-smaller'>No Semester Found...</h2>";
                     }else{
                            while ($row = $result->fetch_assoc()) {
                                   echo "<option value='{$row['semId']}'>{$row['semName']} Semester</option>";
                            }
                     }
              } catch (Exception $e) {
                     exit('<br><b>Error:</b>'.$e->getMessage());
              }

?>
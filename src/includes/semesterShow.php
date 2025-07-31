<?php
try {
       $sql;
       if($nonRunningSem){
              $sql = "SELECT * FROM semester
                     WHERE semId NOT IN (SELECT rsid FROM runningSemester)";
       }
       else{
             $sql = "SELECT * FROM semester"; 
       }
       $result = $conn->query($sql);

       if (!$result->num_rows > 0) {
              echo "<h2 class='heading-smaller'>No Semester Found...</h2>";
       }
} catch (Exception $e) {
       exit('<br><b>Error:</b>'.$e->getMessage());
}
while ($row = $result->fetch_assoc()) {
       echo "<option value='{$row["semId"]}'>{$row['semName']}</option>";
}
?>



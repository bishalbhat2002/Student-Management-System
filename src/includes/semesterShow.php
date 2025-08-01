<?php
try {
       $sql;
       if(isset($_GET['nonRunningSem'])){
              $sql = "SELECT * FROM semester
                     WHERE semId NOT IN (SELECT rsid FROM runningSemester)";
       
       }else if(isset($_GET['runningSem'])){
              $sql = "SELECT * FROM semester s JOIN runningSemester r On s.semId=r.rsid";
       }
       else{
             $sql = "SELECT * FROM semester"; 
       }

       $result = $conn->query($sql);

       if (!$result->num_rows > 0) {
              echo "<h2 class='heading-smaller'>No Semester Found...</h2>";
       }else{
              if(isset($_GET['runningSem'])){
                     while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["semId"]} batch='{$row['batch']}'>{$row['semName']}</option>";
                     }
              }else{
                     while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row["semId"]}>{$row['semName']}</option>";
                     }
              }
       }

} catch (Exception $e) {
       exit('<br><b>Error:</b>'.$e->getMessage());
}

?>



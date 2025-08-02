<?php
require_once "connection.php";
require_once "../../includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

       $regdNo = $_POST['regdNo'];
       $symbolNo = $_POST['symbolNo'];
       $semId = $_POST['semId'];                  #Dynamic table selection

       // Collect Subject Marks
       $marks = [];
       foreach ($_POST as $key => $value) {
              if (preg_match('/^(CSIT_\d+(_\d+)?)(_TH|_PR)$/', $key)) {
                     $marks[$key] = $value;
              }
       }

       $tableName = "sem{$semId}result";

       try{
              // Check if record exists
              $checkSql = "SELECT * FROM $tableName WHERE regdNo = '$regdNo'";
              $result = $conn->query($checkSql);
       }catch(Exception $e){
              exit("<br><b>Error:</b>".$e->getMessage());
       }

      
       if ($result->num_rows > 0) {
              // Update Existing Record
              $updateSql = "UPDATE $tableName SET
                            symbolNo = '$symbolNo'";

              foreach ($marks as $subject => $mark) {
                     $updateSql .= ", $subject = '$mark'";
              }

              $updateSql .= " WHERE regdNo = '$regdNo'";

              try{
                     $conn->query($updateSql);
                     header("location: ../result.php?result-view&semester=$semId&symbolNo=$symbolNo&success= Result Updated Successfully.");
                     exit();
              }catch(Exception $e){
                     exit("<br><b>Result Update Error:</b>".$e->getMessage());
              }

       } else {
              $examYear = $_POST['examYear'];
              // Insert New Record
              $columns = "regdNo, symbolNo, examYear";
              $values = "'$regdNo', '$symbolNo', '$examYear'";

              foreach ($marks as $subject => $mark) {
                     $columns .= ", $subject";
                     $values .= ", $mark";
              }

              $insertSql = "INSERT INTO $tableName ($columns) VALUES ($values)";
              
              try{
                     $conn->query($insertSql);
                     header("location: ../result.php?result-view&semester=$semId&symbolNo=$symbolNo&success= Result published Successfully.");
                     exit();
              }catch(Exception $e){
                     exit("<br><b>Error:</b>".$e->getMessage());
              }
       }  

} else {
       header("location: ../result.php?publish-result&error= Direct Access to Processing file not allowed.");
       exit();
}
?>

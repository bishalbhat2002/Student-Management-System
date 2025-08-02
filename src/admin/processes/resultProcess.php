<?php
require_once "connection.php";
require_once "../../includes/functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_GET['operation']) && $_GET['operation'] == 'publish-result') {

       $regdNo = $_POST['regdNo'];
       $symbolNo = $_POST['symbolNo'];
       $batch = $_POST['batch'];
       $examYear = $_POST['examYear'];
       $semId = $_POST['semId'];                  #Dynamic table selection

       // Collect Subject Marks
       $marks = [];
       foreach ($_POST as $key => $value) {
              if (preg_match('/^(CSIT_\d+(_\d+)?)(_TH|_PR)$/', $key)) {
                     $marks[$key] = $value;
              }
       }

       $tableName = "sem{$semId}result";

       // Check if record exists
       $checkSql = "SELECT * FROM $tableName WHERE regdNo = '$regdNo'";
       $result = $conn->query($checkSql);

       if (!$result) {
              exit("<br> <b>Error:</b> " . $conn->error);
       }

       if ($result->num_rows > 0) {
              // Update Existing Record
              $updateSql = "UPDATE $tableName SET 
                            batch = '$batch',
                            symbolNo = '$symbolNo',
                            examYear = '$examYear'";

              foreach ($marks as $subject => $mark) {
                     $updateSql .= ", $subject = $mark";
              }

              $updateSql .= " WHERE regdNo = '$regdNo'";

              if ($conn->query($updateSql)) {
                     header("location: ../result.php?batch=$batch&semester=$semId&symbolNo=$symbolNo&success= Result Updated Successfully.");
                     exit();
              } else {
                     exit("<br> <b>Error:</b> " . $conn->error);
              }

       } else {
              // Insert New Record
              $columns = "regdNo, batch, symbolNo, examYear";
              $values = "'$regdNo', '$batch', '$symbolNo', '$examYear'";

              foreach ($marks as $subject => $mark) {
                     $columns .= ", $subject";
                     $values .= ", $mark";
              }

              $insertSql = "INSERT INTO $tableName ($columns) VALUES ($values)";

              if ($conn->query($insertSql)) {
                     header("location: ../result.php?batch=$batch&semester=$semId&symbolNo=$symbolNo&success= Result published Successfully.");
                     exit();
              } else {
                     exit("<br> <b>Error:</b> " . $conn->error);
              }
       }
} else {
       header("location: ../result.php?publish-result&error= Direct Access to Processing file not allowed.");
       exit();
}
?>

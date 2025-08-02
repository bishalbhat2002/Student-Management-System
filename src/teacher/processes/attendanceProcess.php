<?php
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $semId = $_POST['semester'];
    $tableName = "sem{$semId}Attendance";
    $currentDate = date('Y-m-d');

    try {

        // Get all regdNo from Attendance Table
        $sql = "SELECT regdNo FROM $tableName";
        $result = $conn->query($sql);
  
        while ($row = $result->fetch_assoc()) {
  
            $regdNo = $row['regdNo'];

            // Check if checkbox was checked (present)
            if (isset($_POST[$regdNo])) {
                // Student is present
                $updateSQL = "UPDATE $tableName 
                              SET Present = Present + 1, 
                                  total = total + 1,
                                  lastAttend = '$currentDate'
                              WHERE regdNo = '$regdNo'";
              } else {
                // Student is absent
                $updateSQL = "UPDATE $tableName 
                              SET total = total + 1,
                                  lastAttend = '$currentDate'
                              WHERE regdNo = '$regdNo'";
              }
              $conn->query($updateSQL);
       }
       header("location: ../attendance.php?view-attendance-sem&semester=$semId");
       exit();
    } catch (Exception $e) {
       die("<br><b>Error:</b>".$e->getMessage());
    }
}
?>

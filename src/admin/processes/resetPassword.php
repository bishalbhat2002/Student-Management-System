<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
       if ($_GET['message'] === 'student') {

              // Check that the registration number is provided
              if (empty($_POST['regdNo'])) {
                     header("Location: ../dashboard.php?password-reset-student&error=Registration number is required");
                     exit();
              }

              // Escape input for output contexts
              $regdNo = htmlspecialchars($_POST['regdNo']);


              // Include DB connection
              // require_once "../../../config/db_connect.php";
              require_once "connection.php";

              try {
                     // Check if the student exists
                     $sql = "SELECT * FROM student WHERE regdNo = '$regdNo'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header('location: ../dashboard.php?password-reset-student&error=No Student Found for provided RegdNo');
                            exit();
                     }
                     $row = $result->fetch_assoc();
                     $newPassword = $row['dob'];

                     // Update the student's password
                     $updateSql = "UPDATE student SET password = '$newPassword' WHERE regdNo = '$regdNo'";
                     $conn->query($updateSql);
                     header("Location: ../dashboard.php?success=Password reset successfully. New password is $newPassword");
                     exit();
              } catch (Exception $e) {
                     header("Location: ../dashboard.php?password-reset-teacher&error=" . $e->getMessage());
                     exit();
              }
       } else if ($_GET['message'] === 'teacher') {
              // Check that tid is provided
              if (empty($_POST['tid'])) {
                     header("Location: ../dashboard.php?password-reset-teacher&error=Teacher ID is required.");
                     exit();
              }

              // Escape input for output contexts
              $tid = htmlspecialchars($_POST['tid']);

              // Include DB connection
              // require_once "../../../config/db_connect.php";
              require_once "connection.php";

              try {
                     // Check if the student exists
                     $sql = "SELECT * FROM teacher WHERE tid = '$tid'";
                     $result = $conn->query($sql);
                     if ($result->num_rows === 0) {
                            header('location: ../dashboard.php?password-reset-teacher&error=No teacher Found for provided Teacher ID.');
                            exit();
                     }
                     $row = $result->fetch_assoc();
                     $newPassword = $row['dob'];

                     // Update the student's password
                     $updateSql = "UPDATE teacher SET password = '$newPassword' WHERE tid = '$tid'";
                     $conn->query($updateSql);
                     header("Location: ../dashboard.php?success=Password reset successfully. New password is $newPassword");
                     exit();
              } catch (Exception $e) {
                     header("Location: ../dashboard.php?password-reset-teacher&error=" . $e->getMessage());
                     exit();
              }
       } else {
              header("Location: ../dashboard.php?password-reset");
              exit();
       }
}

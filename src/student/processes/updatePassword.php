<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check that all required fields exist
    if (empty($_POST['regdNo']) || empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
        header("Location: ../dashboard.php?update-student-password&error=Missing required fields");
        exit();
    }

    // Use htmlspecialchars to escape input values for output contexts.
    $regdNo = htmlspecialchars($_POST['regdNo']);
    $currentPassword = htmlspecialchars($_POST['currentPassword']);
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $confirmNewPassword = htmlspecialchars($_POST['confirmNewPassword']);

    // Check if new password and confirm password match
    if ($newPassword !== $confirmNewPassword) {
        header("Location: ../dashboard.php?update-student-password&error=New passwords do not match");
        exit();
    }

    // Include DB connection
    require_once "../../../config/db_connect.php";
    try {
        // Retrieve current password from student table using a direct query
        $sql = "SELECT password FROM student WHERE regdNo = '$regdNo'";
        $result = $conn->query($sql);
    } catch(Exception $e) {
        die("<b>Error: </b>" . $e->getMessage());
    }

    if ($result->num_rows === 0) {
        header("Location: ../dashboard.php?update-student-password&error=Student not found");
        exit();
    }
    $row = $result->fetch_assoc();

    if ($currentPassword !== $row['password']) {
        header("Location: ../dashboard.php?update-student-password&error=Current password is incorrect");
        exit();
    }

    try {
        // Update the password in the student table
        $updateSql = "UPDATE student SET password = '$newPassword' WHERE regdNo = '$regdNo'";
        $conn->query($updateSql);
        header("Location: ../dashboard.php?success=Password updated successfully");
        exit();
    } catch(Exception $e) {
        header("Location: ../dashboard.php?update-student-password&error=Failed to update password");
        exit();
    }
    
} else {
    header("Location: ../dashboard.php");
    exit();
}
?>
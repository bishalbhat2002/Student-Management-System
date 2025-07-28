<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check that all required fields exist
    if (empty($_POST['aid']) || empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
        header("Location: ../dashboard.php?error=Missing required fields");
        exit();
    }

    // Use htmlspecialchars to escape input values for safety in output contexts.
    $adminId = htmlspecialchars($_POST['aid']);
    $currentPassword = htmlspecialchars($_POST['currentPassword']);
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $confirmNewPassword = htmlspecialchars($_POST['confirmNewPassword']);

    // Check if new password and confirm password match
    if ($newPassword !== $confirmNewPassword) {
        header("Location: ../dashboard.php?error=New passwords do not match");
        exit();
    }

    // Include DB connection
    require_once "../../../config/db_connect.php";

    try{
           // Retrieve current password from admin table using a direct query
           $sql = "SELECT password FROM admin WHERE aid = '$adminId'";
           $result = $conn->query($sql);
       }catch(Exception $e){
              die("<b>Error: </b>". $e->getMessage());
       }

    if ($result->num_rows === 0) {
        header("Location: ..//dashboard.php?error=Admin not found");
        exit();
    }
    $row = $result->fetch_assoc();

    // For demonstration, assuming plain text storage. In production, use password hashing.
    if ($currentPassword !== $row['password']) {
        header("Location: ../dashboard.php?error=Current password is incorrect");
        exit();
    }

    try{
              // Update the password
              $updateSql = "UPDATE admin SET password = '$newPassword' WHERE aid = '$adminId'";
              $conn->query($updateSql);
              header("Location: ../dashboard.php?success=Password updated successfully");
              exit();
       } catch(Exception $e){
              header("Location: ../dashboard.php?error=Failed to update password");
              exit();
       }
        
} else {
    header("Location: ../dashboard.php");
    exit();
}
?>
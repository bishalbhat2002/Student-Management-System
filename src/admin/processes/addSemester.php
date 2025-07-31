<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate that the semester field is not empty
    if (empty($_POST['semesterId'])) {
        header("Location: ../semesters.php?addSemester&error=".urlencode("Semester is required"));
        exit();
    }
    
    // Trim the input
    $semId = trim($_POST['semesterId']);
    
    // Include DB connection
    require_once "connection.php";
    
    try {
        $sql = "INSERT INTO runningSemester (rsid) VALUES ('$semId')";
        $result = $conn->query($sql); 
        header("Location: ../semesters.php?success=" . urlencode("Semester added successfully"));
        exit();
    } catch (Exception $e) {
        exit($e->getMessage());
        header("Location: ../semesters.php?addSemester&error=" . urlencode($e->getMessage()));
        exit();
    }
} else {
    header("Location: ../semesters.php");
    exit();
}
?>
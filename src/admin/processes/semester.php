<?php
session_start();
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_GET['operation']==='add-semester') {
    // Validate that the semester field is not empty
    if (empty($_POST['semesterId'])) {
        header("Location: ../semesters.php?addSemester&error=".urlencode("Semester is required"));
        exit();
    }
    if (empty($_POST['batch'])) {
        header("Location: ../semesters.php?addSemester&error=".urlencode("batch is required"));
        exit();
    }
    
    // Trim the input
    $semId = trim($_POST['semesterId']);
    $batch = trim($_POST['batch']);
    
    // Include DB connection

    
    try {
        $sql = "INSERT INTO runningSemester (rsid, batch) VALUES ('$semId', '$batch')";
        $result = $conn->query($sql); 
        header("Location: ../semesters.php?success=" . urlencode("Semester added successfully"));
        exit();
    } catch (Exception $e) {
        exit($e->getMessage());
        header("Location: ../semesters.php?addSemester&error=" . urlencode($e->getMessage()));
        exit();
    }

}if (isset($_GET['semId']) && $_GET['operation']==='delete-semester') {
    $semId = $_GET['semId'];
     try {
        $sql = "DELETE from runningSemester where rsid = '$semId'";
        $conn->query($sql); 
        header("Location: ../semesters.php?success=" . urlencode("Semester Deleted successfully"));
        exit();
    } catch (Exception $e) {
        exit($e->getMessage());
        header("Location: ../semesters.php?error=" . urlencode($e->getMessage()));
        exit();
    }

}else {
    header("Location: ../semesters.php");
    exit();
}
?>
<?php
require_once "connection.php";
require_once "../../includes/functions.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $regdNo  = trim($_POST['regdNo']);
    $semId   = trim($_POST['semester']);
    $amount  = trim($_POST['amount']);

    $errors = [];

    // Validation
    if (empty($regdNo)) 
        $errors['regdNo'] = "RegdNo is required.";  

    if (empty($semId)) 
        $errors['semester'] = "Semester is required.";

    if (empty($amount)) {
        $errors['amount'] = "Amount is required.";
    } elseif (!is_numeric($amount) || $amount < 0) {
        $errors['amount'] = "Amount must be a number and greater than 0.";
    }
    
    if (!isset($_FILES['voucherPhoto']) || $_FILES['voucherPhoto']['error'] === UPLOAD_ERR_NO_FILE) {
       $errors['voucherPhoto'] = "Voucher Proof is required.";
    }

    $voucherPhotoPath = "";
    // Handle file upload
    if (isset($_FILES['voucherPhoto']) && $_FILES['voucherPhoto']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['voucherPhoto'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'];

        if (!in_array($file['type'], $allowedTypes)) {
            $errors['voucherPhoto'] = "Only JPG, PNG, JPEG, or PDF files allowed.";
        } elseif ($file['size'] > 2 * 1024 * 1024) {
            $errors['voucherPhoto'] = "File size must be less than 2MB.";
        } else {
            $uploadDir = "../../../uploads/Images/";
            $newName = "student_admission_voucher_regdNo-" . $regdNo . "_Sem-" . $semId . "_" . time() . "_" . basename($file['name']);
            $fullPath = $uploadDir . $newName;

            if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                $voucherPhotoPath = BASE_URL . "/uploads/Images/" . $newName;
            } else {
                $errors['voucherPhoto'] = "Photo upload failed.";
            }
        }
    }

    // If errors, redirect back with session
    if (!empty($errors)) {
        $_SESSION['formErrors'] = $errors;
        $_SESSION['oldData'] = $_POST;
        header("Location: ../students.php?add-admission-regdNo=$regdNo");
        exit;
    }

    // Execute insert
    try {
        $sql = "INSERT INTO sem{$semId}Admission (regdNo, admissionAmount, photo) 
                VALUES ('$regdNo', '$amount', '$voucherPhotoPath')";
        $conn->query($sql);

        $sqlFees = "UPDATE fees set sem{$semId} = '$amount' where regdNo = '$regdNo'";
        $conn->query($sqlFees);

        $sql2 = "UPDATE runningSemester set totalStudent = totalStudent + 1 Where rsid = '$semId'";
        $conn->query($sql2);

        header("location: ../students.php?view-admission-semId=$semId&success=Student Admitted successfully to ".getSemName($semId)." Semester");

        exit();
    } catch (Exception $e) {
        header("location: ../students.php?add-admission-regdNo=$regdNo&error=".$e->getMessage());
        exit();
    }

} else {
    header("location: ../students.php?add-admission");
    exit(); 
}

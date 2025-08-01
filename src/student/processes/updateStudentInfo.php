<?php
require_once "connection.php";
require_once "../../includes/functions.php";

session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {

       $regdNo      = trim($_POST['regdNo']);
       $name        = trim($_POST['name']);
       $dob         = trim($_POST['dob']);
       $gender      = trim($_POST['gender']);
       $faculty     = trim($_POST['faculty']);
       $phone       = trim($_POST['phone']);
       $email       = trim($_POST['email']);
       $address     = trim($_POST['address']);
       $parentName  = trim($_POST['parentName']);
       $parentPhone = trim($_POST['parentPhone']);

       if(isset($errors))
              unset($_SESSION['form_errors']);

       $errors = [];

       // Validation
       if (empty($regdNo))
              $errors['regdNo'] = "Registration number is Required.";

       if (empty($name))
              $errors['name'] = "Name is required.";

       if (empty($dob))
              $errors['dob'] = "Date of birth is required.";

       if (empty($gender) || !in_array($gender, ['male', 'female']))
              $errors['gender'] = "Select gender.";

       if (empty($faculty))
              $errors['faculty'] = "Faculty is required.";

       if (empty($phone) || !preg_match('/^[0-9]{10,15}$/', $phone))
              $errors['phone'] = "Enter a valid phone number.";

       if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
              $errors['email'] = "Enter a valid email.";

       if (empty($address))
              $errors['address'] = "Address is required.";

       if (empty($parentName))
               $errors['parentName'] = "Parent Name is required.";

       if (empty($parentPhone))
               $errors['parentPhone'] = "Parent Phone is required.";
       else if(!preg_match('/^[0-9]{7,15}$/', $parentPhone))
              $errors['parentPhone'] = "Enter valid parent phone.";


       # Handle Photo upload
       $photoPath = "";
       if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
              $file = $_FILES['photo'];
              $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['photo'] = "Only JPEG, JPG, or PNG files allowed.";
              } elseif ($file['size'] > 2 * 1024 * 1024) {
                     $errors['photo'] = "Image size must be less than 2MB.";
              } else {
                     $uploadDir = "../../../uploads/Images/";
                     $newName = "student_Photo_RegdNo-".$regdNo."_" .time(). basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $photoPath = BASE_URL . "/uploads/Images/" . $newName;
                     } else {
                            $errors['photo'] = "Photo upload failed.";
                     }
              }
       }

       # Handle SEE Result upload
       $seeResultPath = "";
       if (isset($_FILES['seeResult']) && $_FILES['seeResult']['error'] === UPLOAD_ERR_OK) {
              $file = $_FILES['seeResult'];
              $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['seeResult'] = "Only JPG, PNG, or PDF  files allowed.";
              } elseif ($file['size'] > 2 * 1024 * 1024) {
                     $errors['seeResult'] = "Image size must be less than 2MB.";
              } else {
                     $uploadDir = "../../../uploads/Images/";
                     $newName = "student_SeeResult_RegdNo-".$regdNo."_" .time(). basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $seeResultPath = BASE_URL . "/uploads/Images/" . $newName;
                     } else {
                            $errors['seeResult'] = "SEE Result upload failed.";
                     }
              }
       }

       // Handle NEB Result upload
       $nebResultPath = "";
       if (isset($_FILES['nebResult']) && $_FILES['nebResult']['error'] === UPLOAD_ERR_OK) {
              $file = $_FILES['nebResult'];
              $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['nebResult'] = "Only JPG, PNG, or PDF files allowed.";
              } elseif ($file['size'] > 2 * 1024 * 1024) {
                     $errors['nebResult'] = "Image size must be less than 2MB.";
              } else {
                     $uploadDir = "../../../uploads/Images/";
                     $newName = "student_Neb_RegdNo-".$regdNo."_" .time(). basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $nebResultPath = BASE_URL . "/uploads/Images/" . $newName;
                     } else {
                            $errors['nebResult'] = "NEB Result upload failed.";
                     }
              }
       }

       // If errors, redirect back with session
       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;
              header("Location: ../dashboard.php?update-student-info");
              exit;
       }

       // Build update query
       $sql = "UPDATE student SET 
              name = '$name',
              dob = '$dob',
              gender = '$gender',
              faculty = '$faculty',
              phone = '$phone',
              email = '$email',
              address = '$address',
              parentName = '$parentName',
              parentPhone = '$parentPhone'";

       if ($photoPath !== "") {
              $sql .= ", photo = '$photoPath'";
       }
       if ($seeResultPath !== "") {
              $sql .= ", seeResult = '$seeResultPath'";
       }
       if ($nebResultPath !== "") {
              $sql .= ", nebResult = '$nebResultPath'";
       }

       $sql .= " WHERE regdNo = '$regdNo'";

       // Execute update
       try {
              $row = selectRecord('student', 'regdNo', $regdNo);
              $conn->query($sql);
              if(!empty($row['photo']))
                     deleteData($photoPath, $row['photo']);           # Delete Older Photo ...

              if(!empty($row['seeResult'])) 
                     deleteData($seeResultPath, $row['seeResult']);           # Delete Older SEE Result ...

              if(!empty($row['nebResult'])) 
                     deleteData($nebREsultPath, $row['nebResult']);           # Delete Older NEB Result ...

              header("location: ../dashboard.php?success= Student info updated successfully");
              exit();
       } catch (Exception $e) {
              echo("Error:".$e->getMessage());
              exit();
              header("location: ../dashboard.php?error= Error While Updating Student Info");
       }
} else {
       header("location: ../dashboard.php");
       exit();
}

<?php
require_once "connection.php";
require_once "../../includes/functions.php";

session_start();
if($_SERVER['REQUEST_METHOD'] === "POST"){

       $tid      = trim($_POST['tid']);
       $name     = trim($_POST['name']);
       $dob      = trim($_POST['dob']);
       $gender   = trim($_POST['gender']);
       $faculty  = trim($_POST['faculty']);
       $phone    = trim($_POST['phone']);
       $email    = trim($_POST['email']);
       $address  = trim($_POST['address']);
       $academicQualification = trim($_POST['academicQualification']);

       $errors = [];

       // Validation
       if (empty($name)) 
              $errors['name'] = "Name is required.";

       if (empty($dob)) 
              $errors['dob'] = "Date of birth is required.";

       if (empty($gender) || !in_array($gender, ['male', 'female'])) 
              $errors['gender'] = "Gender is required.";

       if (empty($faculty)) 
              $errors['faculty'] = "Faculty is required.";

       if (empty($phone) || !preg_match('/^[0-9]{10,15}$/', $phone)) 
              $errors['phone'] = "Enter a valid 10–15 digit phone number.";

       if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
              $errors['email'] = "Enter a valid email address.";

       if (empty($address)) 
              $errors['address'] = "Address is required.";
       if (empty($academicQualification)) 
              $errors['academicQualification'] = "Academic Qualification is required.";

       
       $photoPath = "";
       // Handle file upload
       if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
              $file = $_FILES['photo'];
              $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['photo'] = "Only JPEG, JPG or PNG files allowed.";
              } elseif ($file['size'] > 2 * 1024 * 1024) {
                     $errors['photo'] = "Image size must be less than 2MB.";
              } else {
                     $uploadDir = "../../../uploads/Images/";
                     $newName = "teacher_Photo_Tid-".$tid."_" .time(). basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $photoPath = BASE_URL."/uploads/Images/".$newName;
                     } else {
                            $errors['photo'] = "Photo upload failed.";
                     }
              }
       }

       // If errors, redirect back with session
       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;
              header("Location: ../dashboard.php?update-teacher-info");
              exit;
       }

       // Build update query
       $sql = "UPDATE teacher SET 
              name = '$name',
              dob = '$dob',
              gender = '$gender',
              faculty = '$faculty',
              phone = '$phone',
              email = '$email',
              address = '$address',
              academicQualification = '$academicQualification'";

       if ($photoPath !== "") {
              $sql .= ", photo = '$photoPath'";
       }

       $sql .= " WHERE tid = '$tid'";

       // Execute update
       try{
              $row = selectRecord('teacher', 'tid', $tid);
              $conn->query($sql);
              if(!empty($row['photo'])); 
                     deleteData($photoPath, $row['photo']);           # Delete Older Photo...
              header("location: ../dashboard.php?success= Teacher info updated successfully");
              exit();
       }catch(Exception $e){
              exit($e->getMessage());
              header("location: ../dashboard.php?error= Error While Updating Teacher Info");
       }
}else{
       header("location: ../dashboard.php");
       exit(); 
}
?>

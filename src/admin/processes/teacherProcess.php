<?php
require_once "connection.php";
require_once "../../includes/functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_GET['operation'] !== 'delete-teacher') {

       // Read common form fields
       $tid = ($_GET['operation'] === 'update-teacher') ? trim($_POST['tid']) : null;
       $name = trim($_POST['name']);
       $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
       $dob = trim($_POST['dob']);
       $faculty = trim($_POST['faculty']);
       $phone = trim($_POST['phone']);
       $email = trim($_POST['email']);
       $address = trim($_POST['address']);
       $academicQualification = trim($_POST['academicQualification']);

       $errors = [];

       // Validation
       if ($_GET['operation'] === 'update-teacher' && empty($tid))
              $errors['tid'] = "Teacher ID is required.";

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

       if (empty($academicQualification))
              $errors['academicQualification'] = "Academic Qualification is required.";

       // If adding new teacher, photo is required
       if ($_GET['operation'] === 'add-teacher') {
              if (!isset($_FILES['photo']) || $_FILES['photo']['error'] === UPLOAD_ERR_NO_FILE) {
                     $errors['photo'] = "Photo is required.";
              }
       }

       // Photo handling
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
                     $newName = "Teacher_Photo_" . time() . "_" . basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $photoPath = BASE_URL . "/uploads/Images/" . $newName;
                     } else {
                            $errors['photo'] = "Photo upload failed.";
                     }
              }
       }

       // If validation fails
       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;

              if ($_GET['operation'] === 'add-teacher') {
                     header("Location: ../teachers.php?add-teacher");
              } else {
                     header("Location: ../teachers.php?edit-teacher-id=$tid");
              }
              exit();
       }

       // Add teacher
       if ($_GET['operation'] === 'add-teacher') {
              $sql = "INSERT INTO teacher 
            (name, gender, dob, faculty, academicQualification, phone, email, address, password, photo)
            VALUES 
            ('$name', '$gender', '$dob', '$faculty', '$academicQualification', '$phone', '$email', '$address', '$dob', '$photoPath')";

              try {
                     $conn->query($sql);
                     header("Location: ../teachers.php?view-all-teachers&success=Teacher added successfully");
                     exit();
              } catch (Exception $e) {
                     header("Location: ../teachers.php?add-teacher&error=" . $e->getMessage());
                     exit();
              }
       }

       // Update teacher
       if ($_GET['operation'] === 'update-teacher') {

              $updateSQL = "UPDATE teacher SET
                     name = '$name',
                     gender = '$gender',
                     dob = '$dob',
                     faculty = '$faculty',
                     academicQualification = '$academicQualification',
                     phone = '$phone',
                     email = '$email',
                     address = '$address'";

              if (!empty($photoPath)) {
                     $updateSQL .= ", photo = '$photoPath'";
              }

              $updateSQL .= " WHERE tid = '$tid'";

              try {
                     $row = selectRecord('teacher', 'tid', $tid);
                     $conn->query($updateSQL);

                     if (!empty($row['photo']))
                            deleteData($photoPath, $row['photo']);           # Delete Older Photo...
                     
                     header("Location: ../teachers.php?view-teacher-id=$tid&success=Teacher updated successfully");
                     exit();
              } catch (Exception $e) {
                     header("Location: ../teachers.php?edit-teacher-tid=$tid&error=" . $e->getMessage());
                     exit();
              }
       }
}else if ($_SERVER['REQUEST_METHOD'] === "POST" && $_GET['operation'] === 'delete-teacher') {
       $tid = trim($_POST['tid']);
       try {
              $sql = "DELETE FROM teacher tid where  = '$tid'";
              $conn->query($sql);
              header("location: ../teachers.php?view-all-teachers&success= Teacher($tid) Deleted successfully.");
              exit();
       } catch (Exception $e) {
              header("location: ../students.php?delete-teacher-id=$tid&error=" . $e->getMessage());
              exit();
       }
} else {
       header("location: ../teachers.php");
       exit();
}


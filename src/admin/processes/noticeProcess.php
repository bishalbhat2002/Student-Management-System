<?php
session_start();
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_GET['table'])) {
       $title = trim($_POST['title']);
       $noticeBody = trim($_POST['noticeBody']);
       $tableName = $conn->real_escape_string($_GET['table']);
       $errors = [];
       $noticePhotoPath = "";

       // Validate title
       if (empty($title)) {
              $errors['title'] = "Notice title is required.";
       }

       // Validate file if uploaded
       if (isset($_FILES['noticePhoto']) && $_FILES['noticePhoto']['error'] !== UPLOAD_ERR_NO_FILE) {
              $file = $_FILES['noticePhoto'];
              $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['noticePhoto'] = "Allowed file types: JPG, PNG, PDF.";
              } elseif ($file['size'] > 2 * 1024 * 1024) {
                     $errors['noticePhoto'] = "Max file size is 2MB.";
              } else {
                     $uploadDir = "../../../uploads/Images/";
                     $newFileName = "notice_" . time() . "_" . basename($file['name']);
                     $fullPath = $uploadDir . $newFileName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $noticePhotoPath = BASE_URL . "/uploads/Images/" . $newFileName;
                     } else {
                            $errors['noticePhoto'] = "Failed to upload file.";
                     }
              }
       }

       // Check: At least one of body or file is required
       if (empty($noticeBody) && empty($noticePhotoPath)) {
              $errors['noticeBody'] = "Either notice body or file must be provided.";
              $errors['noticePhoto'] = "Either notice body or file must be provided.";
       }
       
       // If errors, store in session and redirect back
       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;
              header("Location: ../notices.php?add-{$tableName}-notice");
              exit();
       }
       try {

              // Insert into database using escaped strings
              $title = $conn->real_escape_string($title);
              $body = $conn->real_escape_string($noticeBody);
              $photo = $conn->real_escape_string($noticePhotoPath);

              $sql = "INSERT INTO {$tableName}Notice (title, nbody, photo) 
                     VALUES ('$title', '$body', '$photo')";
              $conn->query($sql);
              header("location: ../notices.php?success= {$tableName} notice added successfully...");
              exit();
       } catch (Exception $e) {
              header("location: ../notices.php?add-{$tableName}-notice&error:" . $e->getMessage());
       }
}

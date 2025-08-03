<?php
require_once "connection.php";
require_once "../../includes/functions.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_GET['operation'] === 'add-study-material') {

       $semester = trim($_POST['semester']);
       $subject  = isset($_POST['subject']) ? "{$_POST['subject']}" : '';
       $message  = trim($_POST['message']);
       $tid = $_SESSION['tid'];
       $batch = getSemBatch($semester);

       $errors = [];

       // Validation
       if (empty($semester)) {
              $errors['semester'] = "Semester is required.";
       }

       if (empty($subject)) {
              $errors['subject'] = "Subject is required.";
       }

       if (empty($message)) {
              $errors['message'] = "Message is required.";
       }

       // Handle File Upload
       $filePath = "";
       if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

              $file = $_FILES['file'];
              $allowedTypes = [
                     'application/pdf',
                     'image/jpg',
                     'image/jpeg',
                     'image/png',
                     'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                     'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',      // .xlsx
                     'application/vnd.openxmlformats-officedocument.presentationml.presentation' // .pptx
              ];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['file'] = "Invalid file type. Only PDF, JPG, PNG, DOCX, PPTX allowed.";
              } elseif ($file['size'] > 20 * 1024 * 1024) {
                     $errors['file'] = "File size must be less than 20MB.";
              } else {
                     $uploadDir = "../../../uploads/StudyMaterials/";

                     $newName = "StudyMaterial_Subject-".$subject."_" . time() . basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $filePath = BASE_URL . "/uploads/StudyMaterials/" . $newName;
                     } else {
                            $errors['file'] = "Failed to upload file.";
                     }
              }

       } else {
              $errors['file'] = "Please upload a file.";
       }

       // If errors, redirect back with session
       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;

              header("Location: ../study-materials.php?send-study-material-sem&semester=$semester");
              exit;
       }

       try {
              $tableName = "sem{$semester}StudyMaterials";
              $sql = "INSERT INTO $tableName (batch, cid, message, file, tid) VALUES ('$batch','$subject', '$message', '$filePath', '$tid')";
              $conn->query($sql);
              header("Location: ../study-materials.php?view-study-material-sem&semester=$semester&success=Study Material uploaded successfully");
              exit;
       } catch (Exception $e) {
              exit($e->getMessage());
              header("Location: ../study-materials.php?send-study-material-sem&semester=$semester&error=Failed to upload Study Material");
              exit;
       }
} else if($_SERVER['REQUEST_METHOD'] === "POST" && $_GET['operation'] === 'update-study-material'){

       $smid = trim($_POST['smid']);
       $semester = trim($_POST['semester']);
       $subject  = isset($_POST['subject']) ? "{$_POST['subject']}" : '';
       $message  = trim($_POST['message']);
       $tid = $_SESSION['tid'];
       $batch = getSemBatch($semester);

       $errors = [];

       // Validation
       if (empty($semester)) {
              $errors['semester'] = "Semester is required.";
       }

       if (empty($subject)) {
              $errors['subject'] = "Subject is required.";
       }

       if (empty($message)) {
              $errors['message'] = "Message is required.";
       }

       // Handle File Upload
       $filePath = "";
       if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

              $file = $_FILES['file'];
              $allowedTypes = [
                     'application/pdf',
                     'image/jpg',
                     'image/jpeg',
                     'image/png',
                     'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
                     'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',      // .xlsx
                     'application/vnd.openxmlformats-officedocument.presentationml.presentation' // .pptx
              ];

              if (!in_array($file['type'], $allowedTypes)) {
                     $errors['file'] = "Invalid file type. Only PDF, JPG, PNG, DOCX, PPTX allowed.";
              } elseif ($file['size'] > 20 * 1024 * 1024) {
                     $errors['file'] = "File size must be less than 20MB.";
              } else {
                     $uploadDir = "../../../uploads/StudyMaterials/";

                     $newName = "StudyMaterial_Subject-".$subject."_" . time() . basename($file['name']);
                     $fullPath = $uploadDir . $newName;

                     if (move_uploaded_file($file['tmp_name'], $fullPath)) {
                            $filePath = BASE_URL . "/uploads/StudyMaterials/" . $newName;
                     } else {
                            $errors['file'] = "Failed to upload file.";
                     }
              }

       }

       if (!empty($errors)) {
              $_SESSION['formErrors'] = $errors;
              $_SESSION['oldData'] = $_POST;
              header("Location: ../study-materials.php?update-study-material-id&semester=$semester&smid=$smid");
              exit;
       }

       try {
              $tableName = "sem{$semester}StudyMaterials";
              $sql = "UPDATE $tableName SET
                     batch = '$batch',
                     cid = '$subject',
                     message = '$message'";
              if($filePath !== ""){
                     $sql .= ", file = '$filePath'";
              } 
              $sql .= " WHERE smid = '$smid'";
  
              $row = selectRecord("$tableName", 'smid', $smid);
              $conn->query($sql);
              if(!empty($row['file']))
                     deleteData($photoPath, $row['file']);                          # Delete Older Photo..
              header("Location: ../study-materials.php?view-study-material-sem&semester=$semester&success=Study Material uploaded successfully");
              exit;
       } catch (Exception $e) {
              exit($e->getMessage());
              header("Location: ../study-materials.php?send-study-material-sem&semester=$semester&error=Failed to upload Study Material");
              exit;
       }

}else if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete-study-material-id'])){
       $smid = $_GET['delete-study-material-id'] ?? '';
       $semester = $_GET['semester'];

       if(empty($smid) || empty($semester)){
              header("Location: ../study-materials.php?view-study-material-sem&semester=$semester&error='Both SMID and Semester ID are required for Deletion.");
              exit;
       }

       try{
              $tableName = "sem{$semester}studyMaterials";
              $row = selectRecord("$tableName", 'smid', $smid);
              
              $sql = "DELETE from sem{$semester}StudyMaterials WHERE smid = '$smid'";
              $conn->query($sql);
              if(!empty($row['file']))
                     deleteData($photoPath, $row['file']);                          # Delete Older Photo..

              header("Location: ../study-materials.php?view-study-material-sem&semester=$semester&success='Study Material Deleted Successfully.");
              exit;
       }catch (Exception $e) {
              exit($e->getMessage());
              header("Location: ../study-materials.php?iew-study-material-sem&semester=$semester&error=Failed to Delete Study Material");
              exit;
       }
       
}else {
       header("Location: ../study-materials.php?");
       exit;
}

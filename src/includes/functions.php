<?php

function selectRecord($table, $usernameColumn, $username)
{
       $selectSql = "SELECT * from $table
              WHERE $usernameColumn = '$username'";

       global $conn;
       try {
              require_once "connection.php";
              $result = $conn->query($selectSql);
              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
              } else {
                     $row = [];
              }
              return $row;
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }
}

function deleteData($path, $url)
{
       if ($path !== "" && !str_contains($url, '/public')) {         # Check if previously photo field was set in the database table....
              $relative = str_replace(BASE_URL, '', $url);
              $fullPath = $_SERVER['DOCUMENT_ROOT'] . '/student-management-system' . $relative;

              # Check if file exists before trying to delete
              if (file_exists($fullPath)) {
                     unlink($fullPath);          // returns true on success, false on failure
              }
       }
}

function getSemName($semId)
{
       try {
              $sql = "SELECT * from semester
                     WHERE semId = '{$semId}'";

              global $conn;
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     return $row['semName'];
              } else {
                     return "";
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }
}

function getSemBatch($semId){
       try {
              $sql = "SELECT * from runningSemester
                      WHERE rsid = '{$semId}'";

              global $conn;
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                     $row = $result->fetch_assoc();
                     return $row['batch'];
              } else {
                     return "";
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       }
}


function getCourses($semId){
       try {
              $sql = "SELECT * from sem{$semId}courses";
              global $conn;
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                     return $result;
              } else {
                     return "";
              }
       } catch (Exception $e) {
              exit("<br><b>Error:</b>" . $e->getMessage());
       } 
}
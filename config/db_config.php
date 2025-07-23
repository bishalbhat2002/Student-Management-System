<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "SMS";

       #Connecting with MySQL
       try{
              $conn = new mysqli($servername, $username, $password);
              // echo "<br>MySQL connected Successfully..."; 
       }catch(Exception $e){
              die("<b>MySQL connection Failed: </b>".$e->getMessage());
       }

        #Creating and Selecting the Database
       try{
              $sql = "CREATE database if not exists $dbname";
              $conn->query($sql);
              $conn->select_db($dbname);
              // echo "<br>Database Selected Successfully...";
       }catch(Exception $e){
              die("<b>Database Creation Failed: </b>".$e->getMessage());
       }

       #Creating users Table
       try{
              $sql = "CREATE table if not exists users(
                      userid int AUTO_INCREMENT primary key,
                      username varchar(60) not null unique,
                      password varchar(90) not null,
                      role enum('admin', 'student', 'teacher') not null
                     )";
              $conn->query($sql);
              // echo "<br>Table Created Successfully...";
       }catch(Exception $e){
              die("<b>Users Table Creation Failed: </b>".$e->getMessage());
       }       

       #Inserting demo records in users table for Testing...  // Comment this part after executing this file once...
       // try{
       //        $sql = "INSERT into users(username, password, role) values
       //                ('admin', '0000', 'admin'),
       //                ('teacher', '0000', 'teacher'),
       //                ('student', '0000', 'student')";
       //        $conn->query($sql);
       //        echo "<br>Demo Data Inserted Successfully...";
       // }catch(Exception $e){
       //        die("<b>Error while inserting Demo records: </b>".$e->getMessage());
       // }    

?>
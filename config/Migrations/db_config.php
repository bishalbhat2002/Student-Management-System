<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SMS";

#Connecting with MySQL
try {
       $conn = new mysqli($servername, $username, $password);
       // echo "<br>MySQL connected Successfully..."; 
} catch (Exception $e) {
       die("<b>MySQL connection Failed: </b>" . $e->getMessage());
}

#Creating and Selecting the Database
try {
       $sql = "CREATE database if not exists $dbname";
       $conn->query($sql);
       $conn->select_db($dbname);
       // echo "<br>Database Selected Successfully...";
} catch (Exception $e) {
       die("<b>Database Creation Failed: </b>" . $e->getMessage());
}

#Creating users Table
// try{
//        $sql = "CREATE table if not exists users(
//                userid int AUTO_INCREMENT primary key,
//                username varchar(60) not null unique,
//                password varchar(90) not null,
//                role enum('admin', 'student', 'teacher') not null
//               )";
//        $conn->query($sql);
// }catch(Exception $e){
//        die("<b>Users Table Creation Failed: </b>".$e->getMessage());
// }       

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


// Admin Table Creation Code
try {
       $sql = "CREATE TABLE Admin (
              aid VARCHAR(50) PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('Male', 'Female')),
              Dob DATE NOT NULL,
              faculty VARCHAR(100),
              mobile VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address TEXT,
              password VARCHAR(255) NOT NULL,
              photo VARCHAR(255)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Admin Table Creation Failed: </b>" . $e->getMessage());
}


// Teacher Table Creation Code
try {
       $sql = "CREATE TABLE Teacher (
              tid VARCHAR(20) PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('Male', 'Female')),
              dob DATE NOT NULL,
              faculty VARCHAR(100),
              phone VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address TEXT,
              password VARCHAR(255) NOT NULL,
              photo VARCHAR(255)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Teachers Table Creation Failed: </b>" . $e->getMessage());
}


// Student Table Creation Code
try {
       $sql = "CREATE TABLE Student (
              regdNo VARCHAR(20) PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('Male', 'Female')),
              dob DATE NOT NULL,
              faculty VARCHAR(100),
              phone VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address TEXT,
              parentName VARCHAR(100),
              parentPhone VARCHAR(15),
              password VARCHAR(255) NOT NULL,
              batch INT CHECK (batch >= 2057),
              photo VARCHAR(255),
              seeResult VARCHAR(255),    -- Link to SEE result photo
              nebResult VARCHAR(255)     -- Link to NEB result photo
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Student Table Creation Failed: </b>" . $e->getMessage());
}


// Semesters Table Creation Code
try {
       $sql = "CREATE TABLE Semesters (
              semID INT PRIMARY KEY AUTO_INCREMENT,
              semName VARCHAR(20) NOT NULL UNIQUE,
              fees decimal(8, 2) NOT NULL CHECK (fees >= 0)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Semester Table Creation Failed: </b>" . $e->getMessage());
}


// RunningSemesters Table Creation Code
try {
       $sql = "CREATE TABLE RunningSemesters (
              rsid INT PRIMARY KEY AUTO_INCREMENT,
              totalStudent INT DEFAULT 0,
              FOREIGN KEY (rsid) REFERENCES Semesters(semID)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Running Semesters Table Creation Failed: </b>" . $e->getMessage());
}


// Sem(1-8)Admission Table Creation Code
for($i=1; $i<=8; $i++){
       try {
              $sql = "CREATE TABLE sem{$i}Admission (
                     aid INT PRIMARY KEY AUTO_INCREMENT,
                     regdNo VARCHAR(20) UNIQUE NOT NULL,
                     admissionAmount DECIMAL(8, 2) NOT NULL CHECK (admissionAmount >= 0),
                     admission_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                     photo VARCHAR(255),
                     FOREIGN KEY (regdNo) REFERENCES Student(regdNo)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}Admission Table Creation Failed: </b>" . $e->getMessage());
       }
}


// Fees Table Creation Code
try {
       $sql = "CREATE TABLE Fees (
              regdNo VARCHAR(20) PRIMARY KEY,
              sem1 DECIMAL(8, 2) DEFAULT 0 CHECK (sem1 >= 0),
              sem2 DECIMAL(8, 2) DEFAULT 0 CHECK (sem2 >= 0),
              sem3 DECIMAL(8, 2) DEFAULT 0 CHECK (sem3 >= 0),
              sem4 DECIMAL(8, 2) DEFAULT 0 CHECK (sem4 >= 0),
              sem5 DECIMAL(8, 2) DEFAULT 0 CHECK (sem5 >= 0),
              sem6 DECIMAL(8, 2) DEFAULT 0 CHECK (sem6 >= 0),
              sem7 DECIMAL(8, 2) DEFAULT 0 CHECK (sem7 >= 0),
              sem8 DECIMAL(8, 2) DEFAULT 0 CHECK (sem8 >= 0),
              FOREIGN KEY (regdNo) REFERENCES Student(regdNo)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Fees Table Creation Failed: </b>" . $e->getMessage());
}


// Sem(1-8)Courses Table Creation Code
for($i=1; $i<=8; $i++){
       try {
              $sql = "CREATE TABLE sem{$i}Courses (
                     cid VARCHAR(20) PRIMARY KEY,
                     cname VARCHAR(100) NOT NULL,
                     FM INT CHECK (FM >= 0),
                     PM INT CHECK (PM >= 0)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}Courses Table Creation Failed: </b>" . $e->getMessage());
       }
}


// TeacherNotices Table Creation Code
try {
       $sql = "CREATE TABLE teacherNotices (
              tnid INT PRIMARY KEY AUTO_INCREMENT,
              nbody TEXT NOT NULL,
              photo VARCHAR(255),
              date DATE NOT NULL DEFAULT CURRENT_DATE
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>TeacherNotices Table Creation Failed: </b>" . $e->getMessage());
}


// StudentNotices Table Creation Code
try {
       $sql = "CREATE TABLE studentNotice (
              snid INT PRIMARY KEY AUTO_INCREMENT,
              nbody TEXT NOT NULL,
              photo VARCHAR(255),
              date DATE NOT NULL DEFAULT CURRENT_DATE
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>StudentNotices Table Creation Failed: </b>" . $e->getMessage());
}




// sem(1-8)Result Table Creation Code
// try {
//        $sql = "";
//        $conn->query($sql);
// } catch (Exception $e) {
//        die("<b>Sem{$i}Result Table Creation Failed: </b>" . $e->getMessage());
// }


// Attendance Table Creation Code
try {
       $sql = "CREATE TABLE Attendance (
              regdNo VARCHAR(20) PRIMARY KEY,
              sem1 INT CHECK (sem1 > 0 AND sem1 < 60),
              sem2 INT CHECK (sem2 > 0 AND sem2 < 60),
              sem3 INT CHECK (sem3 > 0 AND sem3 < 60),
              sem4 INT CHECK (sem4 > 0 AND sem4 < 60),
              sem5 INT CHECK (sem5 > 0 AND sem5 < 60),
              sem6 INT CHECK (sem6 > 0 AND sem6 < 60),
              sem7 INT CHECK (sem7 > 0 AND sem7 < 60),
              sem8 INT CHECK (sem8 > 0 AND sem8 < 60),
              FOREIGN KEY (regdNo) REFERENCES Student(regdNo)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Fees Table Creation Failed: </b>" . $e->getMessage());
}


// sem(1-8)Attendance Table Creation Code
for($i=1; $i<=8; $i++){
       try {
              $sql = "CREATE TABLE sem{$i}Attendance (
                     regdNo VARCHAR(20) PRIMARY KEY,
                     Present INT CHECK (Present >= 0),
                     total INT CHECK (total > 0),
                     lastAttend DATE DEFAULT CURRENT_DATE,
                     FOREIGN KEY (regdNo) REFERENCES Student(regdNo)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}Attendance Table Creation Failed: </b>" . $e->getMessage());
       }
}


// sem(1-8)StudyMaterials Table Creation Code
for($i=1; $i<=8; $i++){
       try {
              $sql = "CREATE TABLE sem{$i}StudyMaterials (
                     smid INT PRIMARY KEY AUTO_INCREMENT,
                     subject VARCHAR(255) NOT NULL,
                     message TEXT NOT NULL,
                     file VARCHAR(255),
                     tid VARCHAR(20),
                     date DATE DEFAULT CURRENT_DATE,
                     FOREIGN KEY (tid) REFERENCES Teacher(tid)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}StudyMaterials Table Creation Failed: </b>" . $e->getMessage());
       }
}


echo "<b>All tables Created successfully....</b>";


#Inserting demo records in users table for Testing...  // Comment this part after executing this file once...
       try{
              $sql = "INSERT INTO Admin (aid, name, gender, Dob, faculty, mobile, email, address, password, photo) VALUES
                     ('admin', 'Alice Johnson', 'Female', '1980-05-15', 'Science', '9841000001', 'alice@example.com', '123 Admin St, City', '0000', 'alice.jpg'),
                     ('admin2', 'Bob Smith', 'Male', '1975-09-20', 'Engineering', '9841000002', 'bob@example.com', '456 Admin Rd, City', 'password456', 'bob.jpg')";
              $conn->query($sql);
              echo "<br>Demo Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting Admin Demo records: </b>".$e->getMessage());
       }          
       
       try{
              $sql = "INSERT INTO Teacher (tid, name, gender, dob, faculty, phone, email, address, password, photo) VALUES
                     ('teacher', 'Dr. Charles Ray', 'Male', '1970-03-10', 'Mathematics', '9841012345', 'charles@example.com', '789 Teacher Ln, City', '0000', 'charles.jpg'),
                     ('teacher2', 'Ms. Diana Lee', 'Female', '1985-11-22', 'Physics', '9841012346', 'diana@example.com', '101 Teacher Blvd, City', 'teachpass2', 'diana.jpg')";
              $conn->query($sql);
              echo "<br>Demo Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting teacher Demo records: </b>".$e->getMessage());
       }          
       
       try{
              $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, photo, seeResult, nebResult) VALUES
                     ('student', 'Ethan Wright', 'Male', '2005-06-18', 'Science', '9841023456', 'ethan@example.com', '202 Student St, City', 'Linda Wright', '9841098765', '0000', 2060, 'ethan.jpg', 'see_ethan.jpg', 'neb_ethan.jpg'),
                     ('S1002', 'Fiona Patel', 'Female', '2006-08-12', 'Engineering', '9841023457', 'fiona@example.com', '303 Student Rd, City', 'Raj Patel', '9841098766', 'studpass2', 2061, 'fiona.jpg', 'see_fiona.jpg', 'neb_fiona.jpg')";
              $conn->query($sql);
              echo "<br>Demo Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting StudentDemo records: </b>".$e->getMessage());
       }   

   
$conn->close();
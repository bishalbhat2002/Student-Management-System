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


// Admin Table Creation Code
try {
       $sql = "CREATE TABLE Admin (
              aid VARCHAR(50) PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('male', 'female')),
              dob DATE NOT NULL,
              faculty VARCHAR(100),
              phone VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address TEXT,
              password VARCHAR(255) NOT NULL,
              photo VARCHAR(255) DEFAULT '../../public/assets/images/image.jpg'
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Admin Table Creation Failed: </b>" . $e->getMessage());
}


// Teacher Table Creation Code
try {
       $sql = "CREATE TABLE Teacher (
              tid int PRIMARY KEY AUTO_INCREMENT,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('male', 'female')),
              dob DATE NOT NULL,
              faculty VARCHAR(100),
              academicQualification varchar(100) NOT NULL,
              phone VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address varchar(90),
              password VARCHAR(255) NOT NULL,
              photo VARCHAR(255) DEFAULT '../../public/assets/images/image.jpg'
              )";
       $conn->query($sql);
       $conn->query("ALTER TABLE Teacher AUTO_INCREMENT = 1000");
       
} catch (Exception $e) {
       die("<b>Teachers Table Creation Failed: </b>" . $e->getMessage());
}

// Semester Table Creation Code
try {
       $sql = "CREATE TABLE Semester (
              semId INT PRIMARY KEY AUTO_INCREMENT,
              semName VARCHAR(20) NOT NULL UNIQUE,
              fees decimal(8, 2) NOT NULL CHECK (fees >= 0)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Semester Table Creation Failed: </b>" . $e->getMessage());
}

// Student Table Creation Code
try {

       $sql = "CREATE TABLE Student (
              regdNo VARCHAR(20) PRIMARY KEY,
              name VARCHAR(100) NOT NULL,
              gender VARCHAR(10) CHECK (gender IN ('male', 'female')),
              dob DATE NOT NULL,
              faculty VARCHAR(100),
              phone VARCHAR(15) UNIQUE NOT NULL,
              email VARCHAR(100) UNIQUE NOT NULL,
              address TEXT,
              parentName VARCHAR(100),
              parentPhone VARCHAR(15),
              password VARCHAR(255) NOT NULL,
              batch INT CHECK (batch >= 2057),
              semId INT DEFAULT 1,
              photo VARCHAR(255) DEFAULT '../../public/assets/images/image.jpg',
              seeResult VARCHAR(255),    -- Link to SEE result photo
              nebResult VARCHAR(255),     -- Link to NEB result photo
              FOREIGN KEY (semId) REFERENCES semester(semId)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Student Table Creation Failed: </b>" . $e->getMessage());
}

// Inserting semester in semester Table
for ($i = 1; $i <= 8; $i++) {
try {
        // Create semester name like "1st Semester", "2nd Semester", etc.
        if ($i == 1) {
            $semName = "1st";
        } elseif ($i == 2) {
            $semName = "2nd";
        } elseif ($i == 3) {
            $semName = "3rd";
        } else {
            $semName = $i . "th";
        }

        // Set fees
        $fees = ($i == 1) ? 20000 : 18000;

        $sql = "INSERT INTO semester (semName, fees) VALUES ('$semName', $fees)";
        $conn->query($sql);
                
       } catch (Exception $e) {
              die("<b> {$semName} Insert Failed:</b> " . $e->getMessage());
       }
}


// Runningsemester Table Creation Code
try {
       $sql = "CREATE TABLE runningsemester (
              rsid INT PRIMARY KEY,
              totalStudent INT DEFAULT 0,
              batch int,
              FOREIGN KEY (rsid) REFERENCES semester(semId)
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>Running semester Table Creation Failed: </b>" . $e->getMessage());
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
                     TH INT CHECK (TH >= 0),
                     PR INT CHECK (PR >= 0),
                     tid int,
                     from_time varchar(10),
                     to_time varchar(10),
                     FOREIGN KEY(tid) REFERENCES teacher(tid)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}Courses Table Creation Failed: </b>" . $e->getMessage());
       }
}




// TeacherNotices Table Creation Code
try {
       $sql = "CREATE TABLE teacherNotice (
              nid INT PRIMARY KEY AUTO_INCREMENT,
              title varchar(50) NOT NULL,
              nbody TEXT NOT NULL,
              photo VARCHAR(255),
              date DATETIME DEFAULT CURRENT_TIMESTAMP
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>TeacherNotices Table Creation Failed: </b>" . $e->getMessage());
}


// StudentNotices Table Creation Code
try {
       $sql = "CREATE TABLE studentNotice (
              nid INT PRIMARY KEY AUTO_INCREMENT,
              title varchar(50) NOT NULL,
              nbody TEXT NOT NULL,
              photo VARCHAR(255),
              date DATETIME DEFAULT CURRENT_TIMESTAMP
              )";
       $conn->query($sql);
} catch (Exception $e) {
       die("<b>StudentNotices Table Creation Failed: </b>" . $e->getMessage());
}




// sem1Result Table Creation Code
try {
    $sql = "CREATE TABLE sem1result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_111_TH INT CHECK (CSIT_111_TH BETWEEN 0 AND 100),
        CSIT_112_TH INT CHECK (CSIT_112_TH BETWEEN 0 AND 60),
        CSIT_112_PR INT CHECK (CSIT_112_PR BETWEEN 0 AND 40),
        CSIT_113_TH INT CHECK (CSIT_113_TH BETWEEN 0 AND 100),
        CSIT_114_TH INT CHECK (CSIT_114_TH BETWEEN 0 AND 60),
        CSIT_114_PR INT CHECK (CSIT_114_PR BETWEEN 0 AND 40),
        CSIT_115_TH INT CHECK (CSIT_115_TH BETWEEN 0 AND 60),
        CSIT_115_PR INT CHECK (CSIT_115_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem1result Table creation failed: " . $e->getMessage());
}

// sem2Result Table Creation Code
try {
    $sql = "CREATE TABLE sem2result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_121_TH INT CHECK (CSIT_121_TH BETWEEN 0 AND 60),
        CSIT_121_PR INT CHECK (CSIT_121_PR BETWEEN 0 AND 40),
        CSIT_122_TH INT CHECK (CSIT_122_TH BETWEEN 0 AND 60),
        CSIT_122_PR INT CHECK (CSIT_122_PR BETWEEN 0 AND 40),
        CSIT_123_TH INT CHECK (CSIT_123_TH BETWEEN 0 AND 100),
        CSIT_124_TH INT CHECK (CSIT_124_TH BETWEEN 0 AND 60),
        CSIT_124_PR INT CHECK (CSIT_124_PR BETWEEN 0 AND 40),
        CSIT_125_TH INT CHECK (CSIT_125_TH BETWEEN 0 AND 60),
        CSIT_125_PR INT CHECK (CSIT_125_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem2result Table creation failed: " . $e->getMessage());
}

// sem3result Table Creation Code
try {
    $sql = "CREATE TABLE sem3result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_211_TH INT CHECK (CSIT_211_TH BETWEEN 0 AND 60),
        CSIT_211_PR INT CHECK (CSIT_211_PR BETWEEN 0 AND 40),
        CSIT_212_TH INT CHECK (CSIT_212_TH BETWEEN 0 AND 60),
        CSIT_212_PR INT CHECK (CSIT_212_PR BETWEEN 0 AND 40),
        CSIT_213_TH INT CHECK (CSIT_213_TH BETWEEN 0 AND 60),
        CSIT_213_PR INT CHECK (CSIT_213_PR BETWEEN 0 AND 40),
        CSIT_214_TH INT CHECK (CSIT_214_TH BETWEEN 0 AND 60),
        CSIT_214_PR INT CHECK (CSIT_214_PR BETWEEN 0 AND 40),
        CSIT_215_TH INT CHECK (CSIT_215_TH BETWEEN 0 AND 60),
        CSIT_215_PR INT CHECK (CSIT_215_PR BETWEEN 0 AND 40),
        CSIT_216_TH INT CHECK (CSIT_216_TH BETWEEN 0 AND 60),
        CSIT_216_PR INT CHECK (CSIT_216_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem3result Table creation failed: " . $e->getMessage());
}


// sem4result Table Creation Code
try {
    $sql = "CREATE TABLE sem4result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_221_TH INT CHECK (CSIT_221_TH BETWEEN 0 AND 60),
        CSIT_221_PR INT CHECK (CSIT_221_PR BETWEEN 0 AND 40),
        CSIT_222_TH INT CHECK (CSIT_222_TH BETWEEN 0 AND 60),
        CSIT_222_PR INT CHECK (CSIT_222_PR BETWEEN 0 AND 40),
        CSIT_223_TH INT CHECK (CSIT_223_TH BETWEEN 0 AND 60),
        CSIT_223_PR INT CHECK (CSIT_223_PR BETWEEN 0 AND 40),
        CSIT_224_TH INT CHECK (CSIT_224_TH BETWEEN 0 AND 60),
        CSIT_224_PR INT CHECK (CSIT_224_PR BETWEEN 0 AND 40),
        CSIT_225_TH INT CHECK (CSIT_225_TH BETWEEN 0 AND 60),
        CSIT_225_PR INT CHECK (CSIT_225_PR BETWEEN 0 AND 40),
        CSIT_226_TH INT CHECK (CSIT_226_TH BETWEEN 0 AND 60),
        CSIT_226_PR INT CHECK (CSIT_226_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem4result Table creation failed: " . $e->getMessage());
}


// sem5result Table Creation Code
try {
    $sql = "CREATE TABLE sem5result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_311_TH INT CHECK (CSIT_311_TH BETWEEN 0 AND 60),
        CSIT_311_PR INT CHECK (CSIT_311_PR BETWEEN 0 AND 40),
        CSIT_312_TH INT CHECK (CSIT_312_TH BETWEEN 0 AND 60),
        CSIT_312_PR INT CHECK (CSIT_312_PR BETWEEN 0 AND 40),
        CSIT_313_TH INT CHECK (CSIT_313_TH BETWEEN 0 AND 60),
        CSIT_313_PR INT CHECK (CSIT_313_PR BETWEEN 0 AND 40),
        CSIT_314_TH INT CHECK (CSIT_314_TH BETWEEN 0 AND 60),
        CSIT_314_PR INT CHECK (CSIT_314_PR BETWEEN 0 AND 40),
        CSIT_315_TH INT CHECK (CSIT_315_TH BETWEEN 0 AND 60),
        CSIT_315_PR INT CHECK (CSIT_315_PR BETWEEN 0 AND 40),
        CSIT_316_TH INT CHECK (CSIT_316_TH BETWEEN 0 AND 60),
        CSIT_316_PR INT CHECK (CSIT_316_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem5result Table creation failed: " . $e->getMessage());
}


// sem6result Table Creation Code
try {
    $sql = "CREATE TABLE sem6result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_321_TH INT CHECK (CSIT_321_TH BETWEEN 0 AND 60),
        CSIT_321_PR INT CHECK (CSIT_321_PR BETWEEN 0 AND 40),
        CSIT_322_TH INT CHECK (CSIT_322_TH BETWEEN 0 AND 60),
        CSIT_322_PR INT CHECK (CSIT_322_PR BETWEEN 0 AND 40),
        CSIT_323_TH INT CHECK (CSIT_323_TH BETWEEN 0 AND 60),
        CSIT_323_PR INT CHECK (CSIT_323_PR BETWEEN 0 AND 40),
        CSIT_324_TH INT CHECK (CSIT_324_TH BETWEEN 0 AND 60),
        CSIT_324_PR INT CHECK (CSIT_324_PR BETWEEN 0 AND 40),
        CSIT_325_TH INT CHECK (CSIT_325_TH BETWEEN 0 AND 60),
        CSIT_325_PR INT CHECK (CSIT_325_PR BETWEEN 0 AND 40),
        CSIT_326_PR INT CHECK (CSIT_326_PR BETWEEN 0 AND 100),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem6result Table creation failed: " . $e->getMessage());
}


// sem7result Table Creation Code
try {
    $sql = "CREATE TABLE sem7result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_411_TH INT CHECK (CSIT_411_TH BETWEEN 0 AND 60),
        CSIT_411_PR INT CHECK (CSIT_411_PR BETWEEN 0 AND 40),
        CSIT_412_TH INT CHECK (CSIT_412_TH BETWEEN 0 AND 60),
        CSIT_412_PR INT CHECK (CSIT_412_PR BETWEEN 0 AND 40),
        CSIT_413_TH INT CHECK (CSIT_413_TH BETWEEN 0 AND 60),
        CSIT_413_PR INT CHECK (CSIT_413_PR BETWEEN 0 AND 40),
        CSIT_414_PR INT CHECK (CSIT_414_PR BETWEEN 0 AND 100),
        CSIT_415_2_TH INT CHECK (CSIT_415_2_TH BETWEEN 0 AND 60),
        CSIT_415_2_PR INT CHECK (CSIT_415_2_PR BETWEEN 0 AND 40),
        CSIT_416_1_TH INT CHECK (CSIT_416_1_TH BETWEEN 0 AND 60),
        CSIT_416_1_PR INT CHECK (CSIT_416_1_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem7result Table creation failed: " . $e->getMessage());
}


// sem8result Table Creation Code
try {
    $sql = "CREATE TABLE sem8result (
        regdNo VARCHAR(20) PRIMARY KEY,
        symbolNo VARCHAR(20),
        examYear YEAR,
        CSIT_421_TH INT CHECK (CSIT_421_TH BETWEEN 0 AND 60),
        CSIT_421_PR INT CHECK (CSIT_421_PR BETWEEN 0 AND 40),
        CSIT_422_PR INT CHECK (CSIT_422_PR BETWEEN 0 AND 100),
        CSIT_423_2_TH INT CHECK (CSIT_423_2_TH BETWEEN 0 AND 60),
        CSIT_423_2_PR INT CHECK (CSIT_423_2_PR BETWEEN 0 AND 40),
        CSIT_424_2_TH INT CHECK (CSIT_424_2_TH BETWEEN 0 AND 60),
        CSIT_424_2_PR INT CHECK (CSIT_424_2_PR BETWEEN 0 AND 40),
        CSIT_425_3_TH INT CHECK (CSIT_425_3_TH BETWEEN 0 AND 60),
        CSIT_425_3_PR INT CHECK (CSIT_425_3_PR BETWEEN 0 AND 40),
        FOREIGN KEY (regdNo) REFERENCES student(regdNo)
    )";
    $conn->query($sql);
} catch (Exception $e) {
    die("sem8result Table creation failed: " . $e->getMessage());
}


// // Attendance Table Creation Code
// try {
//        $sql = "CREATE TABLE Attendance (
//               regdNo VARCHAR(20) PRIMARY KEY,
//               sem1 INT CHECK (sem1 > 0 AND sem1 < 60),
//               sem2 INT CHECK (sem2 > 0 AND sem2 < 60),
//               sem3 INT CHECK (sem3 > 0 AND sem3 < 60),
//               sem4 INT CHECK (sem4 > 0 AND sem4 < 60),
//               sem5 INT CHECK (sem5 > 0 AND sem5 < 60),
//               sem6 INT CHECK (sem6 > 0 AND sem6 < 60),
//               sem7 INT CHECK (sem7 > 0 AND sem7 < 60),
//               sem8 INT CHECK (sem8 > 0 AND sem8 < 60),
//               FOREIGN KEY (regdNo) REFERENCES Student(regdNo)
//               )";
//        $conn->query($sql);
// } catch (Exception $e) {
//        die("<b>Fees Table Creation Failed: </b>" . $e->getMessage());
// }


// sem(1-8)Attendance Table Creation Code
for($i=1; $i<=8; $i++){
       try {
              $sql = "CREATE TABLE sem{$i}Attendance (
                     regdNo VARCHAR(20) PRIMARY KEY,
                     present INT DEFAULT 0,                       #No of Present Days
                     total INT DEFAULT 0,                            #Total days class was conducted.
                     lastAttend DATE,                   #Last date of attendance taken
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
                     batch YEAR NOT NULL,
                     cid VARCHAR(20) NOT NULL,
                     message TEXT NOT NULL,
                     file VARCHAR(255),
                     tid int NOT NULL,
                     date DATE DEFAULT CURRENT_DATE,
                     FOREIGN KEY (tid) REFERENCES Teacher(tid),
                     FOREIGN KEY (cid) REFERENCES sem{$i}Courses(cid)
                     )";
              $conn->query($sql);
       } catch (Exception $e) {
              die("<b>Sem{$i}StudyMaterials Table Creation Failed: </b>" . $e->getMessage());
       }
}


echo "<b>All tables Created successfully....</b>";

// Filling Course tables Sem(1-8)Course Tables code Start:
// All semester courses in associative array
$semCourses = [
    1 => [
        ['cid' => 'CSIT_111', 'cname' => 'English Grammar and Composition', 'TH' => 100, 'PR' => 0],
        ['cid' => 'CSIT_112', 'cname' => 'Information Technology Fundamentals', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_113', 'cname' => 'Calculus and Analytical Geometry', 'TH' => 100, 'PR' => 0],
        ['cid' => 'CSIT_114', 'cname' => 'Electronic Principles', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_115', 'cname' => 'Programming Fundamentals in C', 'TH' => 60, 'PR' => 40]
    ],
    2 => [
        ['cid' => 'CSIT_121', 'cname' => 'Data Structure and Algorithms', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_122', 'cname' => 'Digital Logic Design', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_123', 'cname' => 'Linear Algebra', 'TH' => 100, 'PR' => 0],
        ['cid' => 'CSIT_124', 'cname' => 'Mechanics and Electrodynamics', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_125', 'cname' => 'Microprocessor System', 'TH' => 60, 'PR' => 40]
    ],
    3 => [
        ['cid' => 'CSIT_211', 'cname' => 'Computer Organization and Architecture', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_212', 'cname' => 'Discrete Structures', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_213', 'cname' => 'Introduction to Management', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_214', 'cname' => 'Object Oriented Programming With C++', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_215', 'cname' => 'Operating System', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_216', 'cname' => 'Statistics and Probability', 'TH' => 60, 'PR' => 40]
    ],
    4 => [
        ['cid' => 'CSIT_221', 'cname' => 'Applied Statistics', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_222', 'cname' => 'Data Communication and Network', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_223', 'cname' => 'Database Management System', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_224', 'cname' => 'Numerical Methods', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_225', 'cname' => 'System Analysis and Design', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_226', 'cname' => 'Theory of Computation', 'TH' => 60, 'PR' => 40]
    ],
    5 => [
        ['cid' => 'CSIT_311', 'cname' => 'Design and Analysis of Algorithm', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_312', 'cname' => 'Artificial Intelligence', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_313', 'cname' => 'Compiler Design', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_314', 'cname' => 'Simulation and Modelling', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_315', 'cname' => 'Graphics and Visual Computing', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_316', 'cname' => 'Web Technology I', 'TH' => 60, 'PR' => 40]
    ],
    6 => [
        ['cid' => 'CSIT_321', 'cname' => 'Introduction to Cryptography', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_322', 'cname' => 'Java Programming I', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_323', 'cname' => 'Research Methodology for Computer Science', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_324', 'cname' => 'Software Engineering', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_325', 'cname' => 'Web Technology II', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_326', 'cname' => 'Minor Project I', 'TH' => 0, 'PR' => 100]
    ],
    7 => [
        ['cid' => 'CSIT_411', 'cname' => 'E-commerce', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_412', 'cname' => 'Advanced Java Programming', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_413', 'cname' => 'Object Oriented Analysis and Design', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_414', 'cname' => 'Minor Project II', 'TH' => 0, 'PR' => 100],
        ['cid' => 'CSIT_415_2', 'cname' => 'Database Admin', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_416_1', 'cname' => 'Data Mining & Warehousing', 'TH' => 60, 'PR' => 40]
    ],
    8 => [
        ['cid' => 'CSIT_421', 'cname' => 'Parallel Computing', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_422', 'cname' => 'Internship', 'TH' => 0, 'PR' => 100],
        ['cid' => 'CSIT_423_2', 'cname' => 'Advanced Database Design', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_424_2', 'cname' => 'Distributed DBMS', 'TH' => 60, 'PR' => 40],
        ['cid' => 'CSIT_425_3', 'cname' => 'E-Governance', 'TH' => 60, 'PR' => 40]
    ]
];


// Insert into DB
foreach ($semCourses as $sem => $courses) {
    foreach ($courses as $course) {
        $cid = $course['cid'];
        $cname = addslashes($course['cname']);
        $th = $course['TH'];
        $pr = $course['PR'];

        try {
            $sql = "INSERT INTO sem{$sem}Courses (cid, cname, TH, PR)
                    VALUES ('$cid', '$cname', $th, $pr)";
            $conn->query($sql);
        } catch (Exception $e) {
            die("<b>Sem{$sem} Courses Insertion Failed:</b> " . $e->getMessage());
        }
    }
}

// Filling Course tables Sem(1-8)Course Tables code End:


require_once "../absolutepath.php";

#Inserting demo records in users table for Testing...  // Comment this part after executing this file once...
       $demoPhoto = BASE_URL.'/public/assets/images/image.jpg';
       $demoSeeResult = BASE_URL.'/public/assets/images/demoSeeResult.png';
       $demoNebResult  = BASE_URL.'/public/assets/images/demoNebResult.png';
       $password = '0000';
       
       try{
              $sql = "INSERT INTO Admin (aid, name, gender, dob, faculty, phone, email, address, password, photo) VALUES
                     ('admin', 'Bishal Bhat', 'male', '2002-12-17', 'Science & Technology', '9841000001', 'bishalbhat2002@gmail.com', 'Mahendranagar, Kanchanpur Nepal', '$password', '$demoPhoto'),
                     ('admin2', 'Bob Smith', 'Male', '1975-09-20', 'Engineering', '9841000002', 'bob@example.com', '456 Admin Rd, City', '$password', '$demoPhoto')";
              $conn->query($sql);
              echo "<br>Demo Admin Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting Admin Demo records: </b>".$e->getMessage());
       }          
       
       try{
              $sql = "INSERT INTO Teacher (name, gender, dob, faculty, academicQualification, phone, email, address, password, photo) VALUES
                     ('Bishal Bhat', 'male', '2002-12-17', 'Science & Technology', 'Masters in IT' ,'9841012345', 'bishalbhat2002@gmail.com', 'Mahendranagar, Kanchanpur', '$password', '$demoPhoto')";
              $conn->query($sql);
              echo "<br>Demo Teacher Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting teacher Demo records: </b>".$e->getMessage());
       }          
       
       try{
              $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, photo, seeResult, nebResult) VALUES
                     ('student', 'Bishal Bhat', 'male', '2002-12-17', 'Science & Technology', '9841023456', 'bishalbhat2002@gmail.com', 'Mahendranagar, Kanchanpur Nepal', 'xyzzz', '9841098765', '$password', 2082,'$demoPhoto', '$demoSeeResult', '$demoNebResult')";
              $conn->query($sql);
              echo "<br>Demo Student Data Inserted Successfully...";
       }catch(Exception $e){
              die("<b>Error while inserting StudentDemo records: </b>".$e->getMessage());
       }   

   
$conn->close();

?>
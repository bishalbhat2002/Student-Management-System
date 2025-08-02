<?php
require_once "../db_connect.php";

try {
       $sql = "INSERT INTO Student 
              (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, seeResult, nebResult) 
              VALUES
              ('SC_32-32-3213-01', 'Aashish Shrestha', 'male', '2005-04-12', 'CSIT', '9801000001', 'aashish.shrestha@gmail.com', 'Bhaktapur, Nepal', 'Ram Shrestha', '9809000001', '0000', 2081, 2, '../../public/assets/results/see1.jpg', '../../public/assets/results/neb1.jpg'),

              ('SC_32-32-3213-02', 'Sita Koirala', 'female', '2004-12-05', 'CSIT', '9801000002', 'sita.koirala@gmail.com', 'Kathmandu, Nepal', 'Hari Koirala', '9809000002', '0000', 2081, 2, '../../public/assets/results/see2.jpg', '../../public/assets/results/neb2.jpg'),

              ('SC_32-32-3213-03', 'Bikash Rai', 'male', '2005-07-22', 'CSIT', '9801000003', 'bikash.rai@gmail.com', 'Lalitpur, Nepal', 'Mani Rai', '9809000003', '0000', 2081, 2, '../../public/assets/results/see3.jpg', '../../public/assets/results/neb3.jpg'),

              ('SC_32-32-3213-04', 'Prerana Sharma', 'female', '2005-01-15', 'CSIT', '9801000004', 'prerana.sharma@gmail.com', 'Pokhara, Nepal', 'Dilip Sharma', '9809000004', '0000', 2081, 2, '../../public/assets/results/see4.jpg', '../../public/assets/results/neb4.jpg'),

              ('SC_32-32-3213-05', 'Nirajan Basnet', 'male', '2005-09-10', 'CSIT', '9801000005', 'nirajan.basnet@gmail.com', 'Dharan, Nepal', 'Gopal Basnet', '9809000005', '0000', 2081, 2, '../../public/assets/results/see5.jpg', '../../public/assets/results/neb5.jpg'),

              ('SC_32-32-3213-06', 'Anushka Poudel', 'female', '2005-06-18', 'CSIT', '9801000006', 'anushka.poudel@gmail.com', 'Butwal, Nepal', 'Narayan Poudel', '9809000006', '0000', 2081, 2, '../../public/assets/results/see6.jpg', '../../public/assets/results/neb6.jpg'),

              ('SC_32-32-3213-07', 'Sujan Thapa', 'male', '2004-11-25', 'CSIT', '9801000007', 'sujan.thapa@gmail.com', 'Chitwan, Nepal', 'Bikram Thapa', '9809000007', '0000', 2081, 2, '../../public/assets/results/see7.jpg', '../../public/assets/results/neb7.jpg'),

              ('SC_32-32-3213-08', 'Pooja Adhikari', 'female', '2005-03-14', 'CSIT', '9801000008', 'pooja.adhikari@gmail.com', 'Bhaktapur, Nepal', 'Ramesh Adhikari', '9809000008', '0000', 2081, 2, '../../public/assets/results/see8.jpg', '../../public/assets/results/neb8.jpg'),

              ('SC_32-32-3213-09', 'Sandeep Bhandari', 'male', '2005-08-06', 'CSIT', '9801000009', 'sandeep.bhandari@gmail.com', 'Kathmandu, Nepal', 'Shankar Bhandari', '9809000009', '0000', 2081, 2, '../../public/assets/results/see9.jpg', '../../public/assets/results/neb9.jpg'),

              ('SC_32-32-3213-10', 'Asmita Dhakal', 'female', '2005-02-20', 'CSIT', '9801000010', 'asmita.dhakal@gmail.com', 'Pokhara, Nepal', 'Dhruba Dhakal', '9809000010', '0000', 2081, 2, '../../public/assets/results/see10.jpg', '../../public/assets/results/neb10.jpg'),

              ('SC_32-32-3213-11', 'Bibek Lama', 'male', '2005-05-17', 'CSIT', '9801000011', 'bibek.lama@gmail.com', 'Lalitpur, Nepal', 'Niranjan Lama', '9809000011', '0000', 2081, 2, '../../public/assets/results/see11.jpg', '../../public/assets/results/neb11.jpg'),

              ('SC_32-32-3213-12', 'Kripa Gautam', 'female', '2005-10-29', 'CSIT', '9801000012', 'kripa.gautam@gmail.com', 'Biratnagar, Nepal', 'Mohan Gautam', '9809000012', '0000', 2081, 2, '../../public/assets/results/see12.jpg', '../../public/assets/results/neb12.jpg'),

              ('SC_32-32-3213-13', 'Rupesh Magar', 'male', '2004-09-13', 'CSIT', '9801000013', 'rupesh.magar@gmail.com', 'Hetauda, Nepal', 'Tara Bahadur Magar', '9809000013', '0000', 2081, 2, '../../public/assets/results/see13.jpg', '../../public/assets/results/neb13.jpg'),

              ('SC_32-32-3213-14', 'Sunita Bhattarai', 'female', '2005-12-02', 'CSIT', '9801000014', 'sunita.bhattarai@gmail.com', 'Chitwan, Nepal', 'Keshav Bhattarai', '9809000014', '0000', 2081, 2, '../../public/assets/results/see14.jpg', '../../public/assets/results/neb14.jpg'),

              ('SC_32-32-3213-15', 'Dipesh Gurung', 'male', '2005-01-11', 'CSIT', '9801000015', 'dipesh.gurung@gmail.com', 'Pokhara, Nepal', 'Krishna Gurung', '9809000015', '0000', 2081, 2, '../../public/assets/results/see15.jpg', '../../public/assets/results/neb15.jpg'),

              ('SC_32-32-3213-16', 'Srijana KC', 'female', '2005-07-07', 'CSIT', '9801000016', 'srijana.kc@gmail.com', 'Kathmandu, Nepal', 'Hari KC', '9809000016', '0000', 2081, 2, '../../public/assets/results/see16.jpg', '../../public/assets/results/neb16.jpg'),

              ('SC_32-32-3213-17', 'Ankit Shakya', 'male', '2005-03-08', 'CSIT', '9801000017', 'ankit.shakya@gmail.com', 'Lalitpur, Nepal', 'Suraj Shakya', '9809000017', '0000', 2081, 2, '../../public/assets/results/see17.jpg', '../../public/assets/results/neb17.jpg'),

              ('SC_32-32-3213-18', 'Rekha Kharel', 'female', '2005-06-30', 'CSIT', '9801000018', 'rekha.kharel@gmail.com', 'Bhaktapur, Nepal', 'Dinesh Kharel', '9809000018', '0000', 2081, 2, '../../public/assets/results/see18.jpg', '../../public/assets/results/neb18.jpg'),

              ('SC_32-32-3213-19', 'Sandesh Panta', 'male', '2005-04-23', 'CSIT', '9801000019', 'sandesh.panta@gmail.com', 'Dharan, Nepal', 'Lokendra Panta', '9809000019', '0000', 2081, 2, '../../public/assets/results/see19.jpg', '../../public/assets/results/neb19.jpg'),

              ('SC_32-32-3213-20', 'Shristi Bista', 'female', '2005-09-19', 'CSIT', '9801000020', 'shristi.bista@gmail.com', 'Butwal, Nepal', 'Madhav Bista', '9809000020', '0000', 2081, 2, '../../public/assets/results/see20.jpg', '../../public/assets/results/neb20.jpg');
              ";
     
     $conn->query($sql);
       echo "<br>Demo Data Inserted Successfully...";
} catch (Exception $e) {
       die("<b>Error while inserting StudentDemo records: </b>" . $e->getMessage());
}

try {
       $sql = "INSERT INTO sem2result 
(regdNo, symbolNo, examYear, 
 CSIT_121_TH, CSIT_121_PR, 
 CSIT_122_TH, CSIT_122_PR, 
 CSIT_123_TH, 
 CSIT_124_TH, CSIT_124_PR, 
 CSIT_125_TH, CSIT_125_PR) 
VALUES
('SC_32-32-3213-01', 'SYM-0001', 2081, 48, 35, 55, 36, 82, 50, 38, 53, 39),
('SC_32-32-3213-02', 'SYM-0002', 2081, 15, 20, 25, 22, 40, 20, 18, 22, 25),
('SC_32-32-3213-03', 'SYM-0003', 2081, 60, 40, 60, 40, 95, 60, 40, 60, 40),
('SC_32-32-3213-04', 'SYM-0004', 2081, 30, 25, 28, 26, 55, 40, 35, 38, 30),
('SC_32-32-3213-05', 'SYM-0005', 2081, 5, 10, 12, 8, 30, 10, 12, 9, 7),
('SC_32-32-3213-06', 'SYM-0006', 2081, 58, 38, 59, 39, 90, 59, 39, 55, 38),
('SC_32-32-3213-07', 'SYM-0007', 2081, 22, 18, 20, 19, 42, 25, 20, 21, 15),
('SC_32-32-3213-08', 'SYM-0008', 2081, 45, 34, 47, 33, 78, 48, 36, 50, 35),
('SC_32-32-3213-09', 'SYM-0009', 2081, 38, 30, 40, 28, 65, 42, 32, 44, 31),
('SC_32-32-3213-10', 'SYM-0010', 2081, 59, 40, 60, 40, 98, 60, 40, 60, 40),
('SC_32-32-3213-11', 'SYM-0011', 2081, 27, 22, 25, 23, 50, 30, 25, 28, 20),
('SC_32-32-3213-12', 'SYM-0012', 2081, 10, 15, 12, 14, 25, 15, 10, 12, 9),
('SC_32-32-3213-13', 'SYM-0013', 2081, 55, 37, 57, 36, 88, 58, 39, 56, 37),
('SC_32-32-3213-14', 'SYM-0014', 2081, 34, 28, 30, 25, 60, 35, 30, 32, 28),
('SC_32-32-3213-15', 'SYM-0015', 2081, 2, 5, 8, 4, 20, 5, 6, 7, 5),
('SC_32-32-3213-16', 'SYM-0016', 2081, 50, 35, 53, 36, 80, 52, 38, 54, 37),
('SC_32-32-3213-17', 'SYM-0017', 2081, 12, 18, 20, 19, 35, 18, 15, 20, 10),
('SC_32-32-3213-18', 'SYM-0018', 2081, 40, 30, 42, 31, 68, 45, 32, 43, 30),
('SC_32-32-3213-19', 'SYM-0019', 2081, 9, 10, 15, 8, 28, 12, 10, 14, 9),
('SC_32-32-3213-20', 'SYM-0020', 2081, 57, 39, 58, 40, 92, 59, 40, 58, 39);
";
     
     $conn->query($sql);
       echo "<br>Demo Data Inserted Successfully...";
} catch (Exception $e) {
       die("<b>Error while inserting StudentDemo records: </b>" . $e->getMessage());
}


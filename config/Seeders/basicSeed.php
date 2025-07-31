<?php
require_once "../db_connect.php";

try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
('SC-3494-434-434', 'Sita Sharma', 'female', '2005-03-15', 'Science', '9801234567', 'sita.sharma@example.com', 'Kathmandu', 'Ramesh Sharma', '9841012345', 'hashed_password1', 2080, 1, '../../public/assets/images/image.jpg', 'see_sita.jpg', 'neb_sita.jpg'),
('SC-3494-434-435', 'Bikash Thapa', 'male', '2004-06-22', 'Management', '9812345678', 'bikash.thapa@example.com', 'Pokhara', 'Kiran Thapa', '9841122334', 'hashed_password2', 2079, 2, '../../public/assets/images/image.jpg', 'see_bikash.jpg', 'neb_bikash.jpg'),
('SC-3494-434-436', 'Puja Bhandari', 'female', '2005-01-10', 'Humanities', '9823456789', 'puja.b@example.com', 'Lalitpur', 'Milan Bhandari', '9841234567', 'hashed_password3', 2080, 1, '../../public/assets/images/image.jpg', 'see_puja.jpg', 'neb_puja.jpg'),
('SC-3494-434-437', 'Aakash Rai', 'male', '2004-11-05', 'Science', '9807654321', 'aakash.rai@example.com', 'Dharan', 'Raju Rai', '9851010101', 'hashed_password4', 2079, 1, '../../public/assets/images/image.jpg', 'see_aakash.jpg', 'neb_aakash.jpg'),
('SC-3494-434-438', 'Niruta KC', 'female', '2005-07-19', 'Education', '9811122334', 'niruta.kc@example.com', 'Bhaktapur', 'Suman KC', '9851022334', 'hashed_password5', 2080, 2, '../../public/assets/images/image.jpg', 'see_niruta.jpg', 'neb_niruta.jpg'),
('SC-3494-434-439', 'Sandesh Poudel', 'male', '2004-02-28', 'Management', '9802345678', 'sandesh.p@example.com', 'Butwal', 'Keshav Poudel', '9841144556', 'hashed_password6', 2079, 2, '../../public/assets/images/image.jpg', 'see_sandesh.jpg', 'neb_sandesh.jpg'),
('SC-3494-434-440', 'Aarati Shrestha', 'female', '2005-09-01', 'Science', '9812233445', 'aarati.sh@example.com', 'Banepa', 'Dinesh Shrestha', '9841155667', 'hashed_password7', 2080, 1, '../../public/assets/images/image.jpg', 'see_aarati.jpg', 'neb_aarati.jpg'),
('SC-3494-434-441', 'Sagar Basnet', 'male', '2004-10-10', 'Humanities', '9822233445', 'sagar.b@example.com', 'Biratnagar', 'Prakash Basnet', '9841166778', 'hashed_password8', 2079, 2, '../../public/assets/images/image.jpg', 'see_sagar.jpg', 'neb_sagar.jpg'),
('SC-3494-434-442', 'Ritika Gurung', 'female', '2005-08-12', 'Education', '9809988776', 'ritika.g@example.com', 'Hetauda', 'Bharat Gurung', '9851033444', 'hashed_password9', 2080, 1, '../../public/assets/images/image.jpg', 'see_ritika.jpg', 'neb_ritika.jpg'),
('SC-3494-434-443', 'Rajan Adhikari', 'male', '2004-04-15', 'Science', '9818899776', 'rajan.a@example.com', 'Dhangadhi', 'Krishna Adhikari', '9841199887', 'hashed_password10', 2079, 1, '../../public/assets/images/image.jpg', 'see_rajan.jpg', 'neb_rajan.jpg'),
('SC-3494-434-444', 'Sangita Neupane', 'female', '2005-12-01', 'Management', '9804455667', 'sangita.n@example.com', 'Birgunj', 'Govinda Neupane', '9851044555', 'hashed_password11', 2080, 2, '../../public/assets/images/image.jpg', 'see_sangita.jpg', 'neb_sangita.jpg'),
('SC-3494-434-445', 'Manoj Maharjan', 'male', '2004-03-17', 'Humanities', '9813344556', 'manoj.m@example.com', 'Kirtipur', 'Bijaya Maharjan', '9841222333', 'hashed_password12', 2079, 2, '../../public/assets/images/image.jpg', 'see_manoj.jpg', 'neb_manoj.jpg'),
('SC-3494-434-446', 'Anu Tamang', 'female', '2005-05-22', 'Science', '9825566778', 'anu.t@example.com', 'Chitwan', 'Jit Bahadur Tamang', '9841231231', 'hashed_password13', 2080, 1, '../../public/assets/images/image.jpg', 'see_anu.jpg', 'neb_anu.jpg'),
('SC-3494-434-447', 'Suraj Khadka', 'male', '2004-07-30', 'Education', '9806677889', 'suraj.k@example.com', 'Nepalgunj', 'Sushil Khadka', '9851067890', 'hashed_password14', 2079, 2, '../../public/assets/images/image.jpg', 'see_suraj.jpg', 'neb_suraj.jpg'),
('SC-3494-434-448', 'Rekha Joshi', 'female', '2005-11-25', 'Management', '9817788990', 'rekha.j@example.com', 'Itahari', 'Narayan Joshi', '9841777888', 'hashed_password15', 2080, 1, '../../public/assets/images/image.jpg', 'see_rekha.jpg', 'neb_rekha.jpg');
";
       $conn->query($sql);
       echo "<br>Demo Data Inserted Successfully...";
} catch (Exception $e) {
       die("<b>Error while inserting StudentDemo records: </b>" . $e->getMessage());
}

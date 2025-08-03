<?php
require_once "../db_connect.php";


# Default Password for all users (Admin, Teacher, Student)
$plainPassword = '0000';
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);


# Code to Insert Dummy Teacher Data ...
try {
       $sql = "INSERT INTO Teacher (name, gender, dob, faculty, academicQualification, phone, email, address, password, photo) VALUES
              ('Ram Prasad Sharma', 'male', '1980-05-14', 'CSIT', 'M.Sc. Computer Science', '9800000001', 'ram.sharma@example.com', 'Kathmandu', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Sita Kumari Bhattarai', 'female', '1985-08-25', 'CSIT', 'M.Sc. Information Technology', '9800000002', 'sita.bhattarai@example.com', 'Lalitpur', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Krishna Bahadur Karki', 'male', '1979-11-12', 'CSIT', 'MCA', '9800000003', 'krishna.karki@example.com', 'Bhaktapur', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Gita Devi Poudel', 'female', '1990-02-03', 'CSIT', 'M.Sc. Computer Science', '9800000004', 'gita.poudel@example.com', 'Pokhara', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Bishnu Raj Joshi', 'male', '1982-07-19', 'CSIT', 'MIT', '9800000005', 'bishnu.joshi@example.com', 'Butwal', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Sunita Koirala', 'female', '1988-09-10', 'CSIT', 'MCA', '9800000006', 'sunita.koirala@example.com', 'Dharan', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Hari Prasad Ghimire', 'male', '1981-03-22', 'CSIT', 'M.Sc. Computer Science', '9800000007', 'hari.ghimire@example.com', 'Chitwan', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Mina Kumari Acharya', 'female', '1992-01-15', 'CSIT', 'MIT', '9800000008', 'mina.acharya@example.com', 'Hetauda', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Nabin Kumar Rijal', 'male', '1983-06-30', 'CSIT', 'M.Sc. IT', '9800000009', 'nabin.rijal@example.com', 'Biratnagar', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Anita Shrestha', 'female', '1987-12-05', 'CSIT', 'MCA', '9800000010', 'anita.shrestha@example.com', 'Nepalgunj', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Dipak Raj Bhandari', 'male', '1980-10-18', 'CSIT', 'M.Sc. Computer Science', '9800000011', 'dipak.bhandari@example.com', 'Dhangadhi', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Rita Kumari Subedi', 'female', '1991-04-08', 'CSIT', 'M.Sc. IT', '9800000012', 'rita.subedi@example.com', 'Janakpur', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Shyam Sundar Adhikari', 'male', '1984-09-25', 'CSIT', 'MIT', '9800000013', 'shyam.adhikari@example.com', 'Gorkha', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Kalpana Devi Neupane', 'female', '1989-11-11', 'CSIT', 'MCA', '9800000014', 'kalpana.neupane@example.com', 'Ilam', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Ramesh Bahadur Thapa', 'male', '1986-07-07', 'CSIT', 'M.Sc. Computer Science', '9800000015', 'ramesh.thapa@example.com', 'Bharatpur', '$hashedPassword', 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert Dummy Student Data 2077 Batch...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
                     ('SC-2077-100-1', 'Aakash Bhatt', 'male', '2001-03-15', 'CSIT', '9811000001', 'aakash.bhatt@example.com', 'Mahendranagar Kanchanpur', 'Ram Bhatt', '9812000001', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-2', 'Bhawana Joshi', 'female', '2001-06-22', 'CSIT', '9811000002', 'bhawana.joshi@example.com', 'Mahendranagar Kanchanpur', 'Keshav Joshi', '9812000002', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-3', 'Suman Shahi', 'male', '2000-12-10', 'CSIT', '9811000003', 'suman.shahi@example.com', 'Mahendranagar Kanchanpur', 'Hari Shahi', '9812000003', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-4', 'Prerana Bista', 'female', '2002-01-05', 'CSIT', '9811000004', 'prerana.bista@example.com', 'Mahendranagar Kanchanpur', 'Mohan Bista', '9812000004', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-5', 'Roshan Saud', 'male', '2001-09-09', 'CSIT', '9811000005', 'roshan.saud@example.com', 'Mahendranagar Kanchanpur', 'Gopal Saud', '9812000005', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-6', 'Samiksha Thapa', 'female', '2002-03-14', 'CSIT', '9811000006', 'samiksha.thapa@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Thapa', '9812000006', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-7', 'Prakash Rokaya', 'male', '2001-02-18', 'CSIT', '9811000007', 'prakash.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Suresh Rokaya', '9812000007', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-8', 'Anjali Singh', 'female', '2002-07-28', 'CSIT', '9811000008', 'anjali.singh@example.com', 'Mahendranagar Kanchanpur', 'Dinesh Singh', '9812000008', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-9', 'Bijay Bhatta', 'male', '2001-08-11', 'CSIT', '9811000009', 'bijay.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Shankar Bhatta', '9812000009', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-10', 'Kripa Mahara', 'female', '2002-05-20', 'CSIT', '9811000010', 'kripa.mahara@example.com', 'Mahendranagar Kanchanpur', 'Birendra Mahara', '9812000010', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-11', 'Santosh Rawal', 'male', '2001-10-30', 'CSIT', '9811000011', 'santosh.rawal@example.com', 'Mahendranagar Kanchanpur', 'Narayan Rawal', '9812000011', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-12', 'Nisha Chand', 'female', '2002-09-14', 'CSIT', '9811000012', 'nisha.chand@example.com', 'Mahendranagar Kanchanpur', 'Surya Chand', '9812000012', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-13', 'Rajan Bista', 'male', '2001-04-07', 'CSIT', '9811000013', 'rajan.bista@example.com', 'Mahendranagar Kanchanpur', 'Tanka Bista', '9812000013', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-14', 'Sneha Joshi', 'female', '2002-12-01', 'CSIT', '9811000014', 'sneha.joshi@example.com', 'Mahendranagar Kanchanpur', 'Krishna Joshi', '9812000014', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-15', 'Yogesh Karki', 'male', '2001-01-11', 'CSIT', '9811000015', 'yogesh.karki@example.com', 'Mahendranagar Kanchanpur', 'Mahesh Karki', '9812000015', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-16', 'Sandhya Saud', 'female', '2002-08-16', 'CSIT', '9811000016', 'sandhya.saud@example.com', 'Mahendranagar Kanchanpur', 'Naresh Saud', '9812000016', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-17', 'Anish Bohora', 'male', '2001-07-19', 'CSIT', '9811000017', 'anish.bohora@example.com', 'Mahendranagar Kanchanpur', 'Govinda Bohora', '9812000017', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-18', 'Prakriti Mahara', 'female', '2002-03-03', 'CSIT', '9811000018', 'prakriti.mahara@example.com', 'Mahendranagar Kanchanpur', 'Prakash Mahara', '9812000018', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-19', 'Suraj Rokaya', 'male', '2001-09-21', 'CSIT', '9811000019', 'suraj.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Rajendra Rokaya', '9812000019', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-20', 'Asmita Bhatta', 'female', '2002-02-27', 'CSIT', '9811000020', 'asmita.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Jeevan Bhatta', '9812000020', '$hashedPassword', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert Dummy Student Data 2078 Batch ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2078-200-1', 'Sagar Bista', 'male', '2002-04-14', 'CSIT', '9813000001', 'sagar.bista@example.com', 'Mahendranagar Kanchanpur', 'Ganesh Bista', '9814000001', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-2', 'Niruta Saud', 'female', '2003-07-09', 'CSIT', '9813000002', 'niruta.saud@example.com', 'Mahendranagar Kanchanpur', 'Laxman Saud', '9814000002', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-3', 'Bikash Rokaya', 'male', '2002-10-22', 'CSIT', '9813000003', 'bikash.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Raju Rokaya', '9814000003', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-4', 'Rachana Joshi', 'female', '2003-03-01', 'CSIT', '9813000004', 'rachana.joshi@example.com', 'Mahendranagar Kanchanpur', 'Prem Joshi', '9814000004', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-5', 'Bibek Shahi', 'male', '2002-06-18', 'CSIT', '9813000005', 'bibek.shahi@example.com', 'Mahendranagar Kanchanpur', 'Shiv Shahi', '9814000005', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-6', 'Pramila Bhatta', 'female', '2003-01-12', 'CSIT', '9813000006', 'pramila.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Bishnu Bhatta', '9814000006', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-7', 'Anish Chand', 'male', '2002-08-05', 'CSIT', '9813000007', 'anish.chand@example.com', 'Mahendranagar Kanchanpur', 'Deepak Chand', '9814000007', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-8', 'Shristi Mahara', 'female', '2003-11-20', 'CSIT', '9813000008', 'shristi.mahara@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Mahara', '9814000008', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-9', 'Pratik Joshi', 'male', '2002-12-03', 'CSIT', '9813000009', 'pratik.joshi@example.com', 'Mahendranagar Kanchanpur', 'Sushil Joshi', '9814000009', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-10', 'Santoshi Bista', 'female', '2003-02-14', 'CSIT', '9813000010', 'santoshi.bista@example.com', 'Mahendranagar Kanchanpur', 'Krishna Bista', '9814000010', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-11', 'Rupesh Saud', 'male', '2002-05-25', 'CSIT', '9813000011', 'rupesh.saud@example.com', 'Mahendranagar Kanchanpur', 'Dipendra Saud', '9814000011', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-12', 'Sajana Rokaya', 'female', '2003-09-29', 'CSIT', '9813000012', 'sajana.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Kamal Rokaya', '9814000012', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-13', 'Lokesh Rawal', 'male', '2002-07-17', 'CSIT', '9813000013', 'lokesh.rawal@example.com', 'Mahendranagar Kanchanpur', 'Hari Rawal', '9814000013', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-14', 'Samjhana Chand', 'female', '2003-06-07', 'CSIT', '9813000014', 'samjhana.chand@example.com', 'Mahendranagar Kanchanpur', 'Dinesh Chand', '9814000014', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-15', 'Utsav Bhatta', 'male', '2002-11-15', 'CSIT', '9813000015', 'utsav.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Gopal Bhatta', '9814000015', '$hashedPassword', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Student Data Batch 2079 ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2079-300-1', 'Pawan Bista', 'male', '2003-03-12', 'CSIT', '9815000001', 'pawan.bista@example.com', 'Mahendranagar Kanchanpur', 'Narayan Bista', '9816000001', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-2', 'Sujata Saud', 'female', '2004-08-18', 'CSIT', '9815000002', 'sujata.saud@example.com', 'Mahendranagar Kanchanpur', 'Mahendra Saud', '9816000002', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-3', 'Suman Rokaya', 'male', '2003-10-25', 'CSIT', '9815000003', 'suman.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Kiran Rokaya', '9816000003', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-4', 'Nikita Joshi', 'female', '2004-01-03', 'CSIT', '9815000004', 'nikita.joshi@example.com', 'Mahendranagar Kanchanpur', 'Prakash Joshi', '9816000004', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-5', 'Bibek Shahi', 'male', '2003-06-30', 'CSIT', '9815000005', 'bibek.shahi@example.com', 'Mahendranagar Kanchanpur', 'Ram Shahi', '9816000005', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-6', 'Pratiksha Bhatta', 'female', '2004-03-20', 'CSIT', '9815000006', 'pratiksha.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Krishna Bhatta', '9816000006', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-7', 'Dipesh Chand', 'male', '2003-05-15', 'CSIT', '9815000007', 'dipesh.chand@example.com', 'Mahendranagar Kanchanpur', 'Hari Chand', '9816000007', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-8', 'Shristi Mahara', 'female', '2004-11-11', 'CSIT', '9815000008', 'shristi.mahara@example.com', 'Mahendranagar Kanchanpur', 'Kamal Mahara', '9816000008', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-9', 'Pravesh Joshi', 'male', '2003-08-05', 'CSIT', '9815000009', 'pravesh.joshi@example.com', 'Mahendranagar Kanchanpur', 'Sanjay Joshi', '9816000009', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-10', 'Alisha Bista', 'female', '2004-04-29', 'CSIT', '9815000010', 'alisha.bista@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Bista', '9816000010', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-11', 'Subash Saud', 'male', '2003-09-14', 'CSIT', '9815000011', 'subash.saud@example.com', 'Mahendranagar Kanchanpur', 'Laxman Saud', '9816000011', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-12', 'Santoshi Rokaya', 'female', '2004-02-07', 'CSIT', '9815000012', 'santoshi.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Naresh Rokaya', '9816000012', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-13', 'Rajan Rawal', 'male', '2003-12-20', 'CSIT', '9815000013', 'rajan.rawal@example.com', 'Mahendranagar Kanchanpur', 'Tanka Rawal', '9816000013', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-14', 'Sabina Chand', 'female', '2004-06-17', 'CSIT', '9815000014', 'sabina.chand@example.com', 'Mahendranagar Kanchanpur', 'Prem Chand', '9816000014', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-15', 'Prashant Bhatta', 'male', '2003-07-23', 'CSIT', '9815000015', 'prashant.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Gopal Bhatta', '9816000015', '$hashedPassword', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Student Data Batch 2080 ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2080-400-1', 'Manoj Bista', 'male', '2004-02-11', 'CSIT', '9817000001', 'manoj.bista@example.com', 'Mahendranagar Kanchanpur', 'Dhan Bahadur Bista', '9818000001', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-2', 'Nisha Saud', 'female', '2005-06-09', 'CSIT', '9817000002', 'nisha.saud@example.com', 'Mahendranagar Kanchanpur', 'Prem Saud', '9818000002', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-3', 'Dipendra Rokaya', 'male', '2004-09-25', 'CSIT', '9817000003', 'dipendra.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Keshav Rokaya', '9818000003', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-4', 'Alisha Joshi', 'female', '2005-01-13', 'CSIT', '9817000004', 'alisha.joshi@example.com', 'Mahendranagar Kanchanpur', 'Suresh Joshi', '9818000004', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-5', 'Sushant Shahi', 'male', '2004-07-30', 'CSIT', '9817000005', 'sushant.shahi@example.com', 'Mahendranagar Kanchanpur', 'Bishnu Shahi', '9818000005', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-6', 'Sajina Bhatta', 'female', '2005-03-05', 'CSIT', '9817000006', 'sajina.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Govinda Bhatta', '9818000006', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-7', 'Ramesh Chand', 'male', '2004-05-19', 'CSIT', '9817000007', 'ramesh.chand@example.com', 'Mahendranagar Kanchanpur', 'Narayan Chand', '9818000007', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-8', 'Samiksha Mahara', 'female', '2005-10-10', 'CSIT', '9817000008', 'samiksha.mahara@example.com', 'Mahendranagar Kanchanpur', 'Rajendra Mahara', '9818000008', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-9', 'Pratik Joshi', 'male', '2004-12-01', 'CSIT', '9817000009', 'pratik.joshi2080@example.com', 'Mahendranagar Kanchanpur', 'Krishna Joshi', '9818000009', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-10', 'Apsara Bista', 'female', '2005-02-22', 'CSIT', '9817000010', 'apsara.bista@example.com', 'Mahendranagar Kanchanpur', 'Bhuwan Bista', '9818000010', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-11', 'Suraj Saud', 'male', '2004-09-15', 'CSIT', '9817000011', 'suraj.saud@example.com', 'Mahendranagar Kanchanpur', 'Hari Saud', '9818000011', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-12', 'Pramila Rokaya', 'female', '2005-06-30', 'CSIT', '9817000012', 'pramila.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Shiva Rokaya', '9818000012', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-13', 'Rupesh Rawal', 'male', '2004-11-18', 'CSIT', '9817000013', 'rupesh.rawal@example.com', 'Mahendranagar Kanchanpur', 'Gopal Rawal', '9818000013', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-14', 'Asmita Chand', 'female', '2005-07-08', 'CSIT', '9817000014', 'asmita.chand@example.com', 'Mahendranagar Kanchanpur', 'Tika Chand', '9818000014', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-15', 'Ujjwal Bhatta', 'male', '2004-08-27', 'CSIT', '9817000015', 'ujjwal.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Sukdev Bhatta', '9818000015', '$hashedPassword', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Student Data Batch 2081 ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}

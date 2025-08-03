<?php
require_once "../db_connect.php";


# Default Password for all users (Admin, Teacher, Student)
$password = '0000';



# Code to Insert Dummy Teacher Data ...
try {
       $sql = "INSERT INTO Teacher (name, gender, dob, faculty, academicQualification, phone, email, address, password, photo) VALUES
              ('Ram Prasad Sharma', 'male', '1980-05-14', 'CSIT', 'M.Sc. Computer Science', '9800000001', 'ram.sharma@example.com', 'Kathmandu', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Sita Kumari Bhattarai', 'female', '1985-08-25', 'CSIT', 'M.Sc. Information Technology', '9800000002', 'sita.bhattarai@example.com', 'Lalitpur', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Krishna Bahadur Karki', 'male', '1979-11-12', 'CSIT', 'MCA', '9800000003', 'krishna.karki@example.com', 'Bhaktapur', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Gita Devi Poudel', 'female', '1990-02-03', 'CSIT', 'M.Sc. Computer Science', '9800000004', 'gita.poudel@example.com', 'Pokhara', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Bishnu Raj Joshi', 'male', '1982-07-19', 'CSIT', 'MIT', '9800000005', 'bishnu.joshi@example.com', 'Butwal', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Sunita Koirala', 'female', '1988-09-10', 'CSIT', 'MCA', '9800000006', 'sunita.koirala@example.com', 'Dharan', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Hari Prasad Ghimire', 'male', '1981-03-22', 'CSIT', 'M.Sc. Computer Science', '9800000007', 'hari.ghimire@example.com', 'Chitwan', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Mina Kumari Acharya', 'female', '1992-01-15', 'CSIT', 'MIT', '9800000008', 'mina.acharya@example.com', 'Hetauda', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Nabin Kumar Rijal', 'male', '1983-06-30', 'CSIT', 'M.Sc. IT', '9800000009', 'nabin.rijal@example.com', 'Biratnagar', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Anita Shrestha', 'female', '1987-12-05', 'CSIT', 'MCA', '9800000010', 'anita.shrestha@example.com', 'Nepalgunj', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Dipak Raj Bhandari', 'male', '1980-10-18', 'CSIT', 'M.Sc. Computer Science', '9800000011', 'dipak.bhandari@example.com', 'Dhangadhi', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Rita Kumari Subedi', 'female', '1991-04-08', 'CSIT', 'M.Sc. IT', '9800000012', 'rita.subedi@example.com', 'Janakpur', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Shyam Sundar Adhikari', 'male', '1984-09-25', 'CSIT', 'MIT', '9800000013', 'shyam.adhikari@example.com', 'Gorkha', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Kalpana Devi Neupane', 'female', '1989-11-11', 'CSIT', 'MCA', '9800000014', 'kalpana.neupane@example.com', 'Ilam', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('Ramesh Bahadur Thapa', 'male', '1986-07-07', 'CSIT', 'M.Sc. Computer Science', '9800000015', 'ramesh.thapa@example.com', 'Bharatpur', '$password', 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert Dummy Student Data 2077 Batch...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
                     ('SC-2077-100-1', 'Aakash Bhatt', 'male', '2001-03-15', 'CSIT', '9811000001', 'aakash.bhatt@example.com', 'Mahendranagar Kanchanpur', 'Ram Bhatt', '9812000001', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-2', 'Bhawana Joshi', 'female', '2001-06-22', 'CSIT', '9811000002', 'bhawana.joshi@example.com', 'Mahendranagar Kanchanpur', 'Keshav Joshi', '9812000002', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-3', 'Suman Shahi', 'male', '2000-12-10', 'CSIT', '9811000003', 'suman.shahi@example.com', 'Mahendranagar Kanchanpur', 'Hari Shahi', '9812000003', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-4', 'Prerana Bista', 'female', '2002-01-05', 'CSIT', '9811000004', 'prerana.bista@example.com', 'Mahendranagar Kanchanpur', 'Mohan Bista', '9812000004', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-5', 'Roshan Saud', 'male', '2001-09-09', 'CSIT', '9811000005', 'roshan.saud@example.com', 'Mahendranagar Kanchanpur', 'Gopal Saud', '9812000005', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-6', 'Samiksha Thapa', 'female', '2002-03-14', 'CSIT', '9811000006', 'samiksha.thapa@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Thapa', '9812000006', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-7', 'Prakash Rokaya', 'male', '2001-02-18', 'CSIT', '9811000007', 'prakash.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Suresh Rokaya', '9812000007', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-8', 'Anjali Singh', 'female', '2002-07-28', 'CSIT', '9811000008', 'anjali.singh@example.com', 'Mahendranagar Kanchanpur', 'Dinesh Singh', '9812000008', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-9', 'Bijay Bhatta', 'male', '2001-08-11', 'CSIT', '9811000009', 'bijay.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Shankar Bhatta', '9812000009', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
                     ('SC-2077-100-10', 'Kripa Mahara', 'female', '2002-05-20', 'CSIT', '9811000010', 'kripa.mahara@example.com', 'Mahendranagar Kanchanpur', 'Birendra Mahara', '9812000010', '$password', 2077, 8, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert Dummy Student Data 2078 Batch ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2078-200-1', 'Sagar Bista', 'male', '2002-04-14', 'CSIT', '9813000001', 'sagar.bista@example.com', 'Mahendranagar Kanchanpur', 'Ganesh Bista', '9814000001', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-2', 'Niruta Saud', 'female', '2003-07-09', 'CSIT', '9813000002', 'niruta.saud@example.com', 'Mahendranagar Kanchanpur', 'Laxman Saud', '9814000002', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-3', 'Bikash Rokaya', 'male', '2002-10-22', 'CSIT', '9813000003', 'bikash.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Raju Rokaya', '9814000003', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-4', 'Rachana Joshi', 'female', '2003-03-01', 'CSIT', '9813000004', 'rachana.joshi@example.com', 'Mahendranagar Kanchanpur', 'Prem Joshi', '9814000004', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-5', 'Bibek Shahi', 'male', '2002-06-18', 'CSIT', '9813000005', 'bibek.shahi@example.com', 'Mahendranagar Kanchanpur', 'Shiv Shahi', '9814000005', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-6', 'Pramila Bhatta', 'female', '2003-01-12', 'CSIT', '9813000006', 'pramila.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Bishnu Bhatta', '9814000006', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-7', 'Anish Chand', 'male', '2002-08-05', 'CSIT', '9813000007', 'anish.chand@example.com', 'Mahendranagar Kanchanpur', 'Deepak Chand', '9814000007', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-8', 'Shristi Mahara', 'female', '2003-11-20', 'CSIT', '9813000008', 'shristi.mahara@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Mahara', '9814000008', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-9', 'Pratik Joshi', 'male', '2002-12-03', 'CSIT', '9813000009', 'pratik.joshi@example.com', 'Mahendranagar Kanchanpur', 'Sushil Joshi', '9814000009', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2078-200-10', 'Santoshi Bista', 'female', '2003-02-14', 'CSIT', '9813000010', 'santoshi.bista@example.com', 'Mahendranagar Kanchanpur', 'Krishna Bista', '9814000010', '$password', 2078, 6, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Student Data Batch 2079 ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2079-300-1', 'Pawan Bista', 'male', '2003-03-12', 'CSIT', '9815000001', 'pawan.bista@example.com', 'Mahendranagar Kanchanpur', 'Narayan Bista', '9816000001', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-2', 'Sujata Saud', 'female', '2004-08-18', 'CSIT', '9815000002', 'sujata.saud@example.com', 'Mahendranagar Kanchanpur', 'Mahendra Saud', '9816000002', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-3', 'Suman Rokaya', 'male', '2003-10-25', 'CSIT', '9815000003', 'suman.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Kiran Rokaya', '9816000003', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-4', 'Nikita Joshi', 'female', '2004-01-03', 'CSIT', '9815000004', 'nikita.joshi@example.com', 'Mahendranagar Kanchanpur', 'Prakash Joshi', '9816000004', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-5', 'Bibek Shahi', 'male', '2003-06-30', 'CSIT', '9815000005', 'bibeks.shahi@example.com', 'Mahendranagar Kanchanpur', 'Ram Shahi', '9816000005', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-6', 'Pratiksha Bhatta', 'female', '2004-03-20', 'CSIT', '9815000006', 'pratiksha.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Krishna Bhatta', '9816000006', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-7', 'Dipesh Chand', 'male', '2003-05-15', 'CSIT', '9815000007', 'dipesh.chand@example.com', 'Mahendranagar Kanchanpur', 'Hari Chand', '9816000007', '$password', 2079, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-8', 'Shanti Mahara', 'female', '2004-11-11', 'CSIT', '9815000008', 'shanti.mahara@example.com', 'Mahendranagar Kanchanpur', 'Kamal Mahara', '9816000008', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-9', 'Pravesh Joshi', 'male', '2003-08-05', 'CSIT', '9815000009', 'pravesh.joshi@example.com', 'Mahendranagar Kanchanpur', 'Sanjay Joshi', '9816000009', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2079-300-10', 'Alisha Bista', 'female', '2004-04-29', 'CSIT', '9815000010', 'alisha.bista@example.com', 'Mahendranagar Kanchanpur', 'Ramesh Bista', '9816000010', '$password', 2079, 5, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Student Data Batch 2080 ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2080-400-1', 'Manoj Bista', 'male', '2004-02-11', 'CSIT', '9817000001', 'manoj.bista@example.com', 'Mahendranagar Kanchanpur', 'Dhan Bahadur Bista', '9818000001', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-2', 'Nisha Saud', 'female', '2005-06-09', 'CSIT', '9817000002', 'nisha.saud@example.com', 'Mahendranagar Kanchanpur', 'Prem Saud', '9818000002', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-3', 'Dipendra Rokaya', 'male', '2004-09-25', 'CSIT', '9817000003', 'dipendra.rokaya@example.com', 'Mahendranagar Kanchanpur', 'Keshav Rokaya', '9818000003', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-4', 'Alisha Joshi', 'female', '2005-01-13', 'CSIT', '9817000004', 'alisha.joshi@example.com', 'Mahendranagar Kanchanpur', 'Suresh Joshi', '9818000004', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-5', 'Sushant Shahi', 'male', '2004-07-30', 'CSIT', '9817000005', 'sushant.shahi@example.com', 'Mahendranagar Kanchanpur', 'Bishnu Shahi', '9818000005', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-6', 'Sajina Bhatta', 'female', '2005-03-05', 'CSIT', '9817000006', 'sajina.bhatta@example.com', 'Mahendranagar Kanchanpur', 'Govinda Bhatta', '9818000006', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-7', 'Ramesh Chand', 'male', '2004-05-19', 'CSIT', '9817000007', 'ramesh.chand@example.com', 'Mahendranagar Kanchanpur', 'Narayan Chand', '9818000007', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-8', 'Samiksha Mahara', 'female', '2005-10-10', 'CSIT', '9817000008', 'samiksha.mahara@example.com', 'Mahendranagar Kanchanpur', 'Rajendra Mahara', '9818000008', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-9', 'Pratik Joshi', 'male', '2004-12-01', 'CSIT', '9817000009', 'pratik.joshi2080@example.com', 'Mahendranagar Kanchanpur', 'Krishna Joshi', '9818000009', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2080-400-10', 'Apsara Bista', 'female', '2005-02-22', 'CSIT', '9817000010', 'apsara.bista@example.com', 'Mahendranagar Kanchanpur', 'Bhuwan Bista', '9818000010', '$password', 2080, 4, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Student Data Batch 2081 ...
try {
       $sql = "INSERT INTO Student (regdNo, name, gender, dob, faculty, phone, email, address, parentName, parentPhone, password, batch, semId, photo, seeResult, nebResult) VALUES
              ('SC-2081-400-1', 'Rabin Joshi', 'male', '2005-01-11', 'CSIT', '9817000101', 'rabin.joshi@example.com', 'Dhangadhi, Kailali', 'Hari Joshi', '9818000101', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-2', 'Anisha Thapa', 'female', '2005-05-22', 'CSIT', '9817000102', 'anisha.thapa@example.com', 'Mahendranagar, Kanchanpur', 'Bishnu Thapa', '9818000102', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-3', 'Kiran Saud', 'male', '2004-09-18', 'CSIT', '9817000103', 'kiran.saud@example.com', 'Attariya, Kailali', 'Ram Saud', '9818000103', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-4', 'Sarita Bista', 'female', '2005-02-07', 'CSIT', '9817000104', 'sarita.bista@example.com', 'Bhimdatta, Kanchanpur', 'Mahendra Bista', '9818000104', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-5', 'Nirajan Rokaya', 'male', '2004-07-19', 'CSIT', '9817000105', 'nirajan.rokaya@example.com', 'Tikapur, Kailali', 'Khem Rokaya', '9818000105', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-6', 'Samjhana Chand', 'female', '2005-03-15', 'CSIT', '9817000106', 'samjhana.chand@example.com', 'Mahendranagar, Kanchanpur', 'Dilli Chand', '9818000106', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-7', 'Rupak Shahi', 'male', '2004-06-11', 'CSIT', '9817000107', 'rupak.shahi@example.com', 'Dhangadhi, Kailali', 'Surendra Shahi', '9818000107', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-8', 'Kabita Bhatta', 'female', '2005-10-03', 'CSIT', '9817000108', 'kabita.bhatta@example.com', 'Bhimdatta, Kanchanpur', 'Prem Bhatta', '9818000108', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-9', 'Bibek Chand', 'male', '2004-11-25', 'CSIT', '9817000109', 'bibek.chand@example.com', 'Mahendranagar, Kanchanpur', 'Rajan Chand', '9818000109', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png'),
              ('SC-2081-400-10', 'Asmita Saud', 'female', '2005-01-30', 'CSIT', '9817000110', 'asmita.saud@example.com', 'Dhangadhi, Kailali', 'Devendra Saud', '9818000110', '$password', 2081, 2, 'http://localhost/student-management-system/public/assets/images/image.jpg', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png', 'http://localhost/student-management-system/public/assets/images/demoSeeResult.png')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Running Semester (2, 4, 5, 6, 8) ...
try {
       $sql = "INSERT INTO runningsemester (rsid, totalStudent, batch) VALUES
              (2, 10, 2081), (4, 10, 2080), (5, 10, 2079), (6, 10, 2078), (8, 10, 2077)";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Sem1Admission Data ...
try {
       $sql = "INSERT INTO sem1Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-1', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-2', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-3', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-4', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-5', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-6', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-7', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-8', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-9', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-10', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-1', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-2', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-3', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-4', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-5', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-6', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-7', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-8', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-9', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-10', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-1', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-2', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-3', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-4', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-5', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-6', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-7', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-8', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-9', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-10', 20000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to insert sem2Admission Data ...
try {
       $sql = "INSERT INTO sem2Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2081-400-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Teacher Data ...
try {
       $sql = "INSERT INTO sem3Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert sem4Admission Data ...
try {
       $sql = "INSERT INTO sem4Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2080-400-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Sem5Admission Data ...
try {
       $sql = "INSERT INTO sem5Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2079-300-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Sem6Admission Data Data ...
try {
       $sql = "INSERT INTO sem6Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2078-200-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert sem7Admission Data ...
try {
       $sql = "INSERT INTO sem7Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert sem8Admission Data ...
try {
       $sql = "INSERT INTO sem8Admission (regdNo, admissionAmount, photo) VALUES
              ('SC-2077-100-1', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-2', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-3', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-4', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-5', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-6', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-7', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-8', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-9', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg'),
              ('SC-2077-100-10', 18000, 'http://localhost/student-management-system/public/assets/images/image.jpg')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert dummy data in fees table ...
try {
       $sql = "INSERT INTO Fees (regdNo, sem1, sem2, sem3, sem4, sem5, sem6, sem7, sem8) VALUES
              -- Batch 2081 (only sem1 and sem2)
              ('SC-2081-400-1', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-2', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-3', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-4', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-5', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-6', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-7', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-8', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-9', 20000, 18000, 0, 0, 0, 0, 0, 0),
              ('SC-2081-400-10', 20000, 18000, 0, 0, 0, 0, 0, 0),
              -- Batch 2080 (sem1 to sem4)
              ('SC-2080-400-1', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-2', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-3', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-4', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-5', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-6', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-7', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-8', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-9', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              ('SC-2080-400-10', 20000, 18000, 18000, 18000, 0, 0, 0, 0),
              -- Batch 2079 (sem1 to sem5)
              ('SC-2079-300-1', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-2', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-3', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-4', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-5', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-6', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-7', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-8', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-9', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              ('SC-2079-300-10', 20000, 18000, 18000, 18000, 18000, 0, 0, 0),
              -- Batch 2078 (sem1 to sem6)
              ('SC-2078-200-1', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-2', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-3', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-4', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-5', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-6', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-7', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-8', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-9', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              ('SC-2078-200-10', 20000, 18000, 18000, 18000, 18000, 18000, 0, 0),
              -- Batch 2077 (sem1 to sem8)
              ('SC-2077-100-1', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-2', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-3', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-4', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-5', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-6', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-7', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-8', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-9', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000),
              ('SC-2077-100-10', 20000, 18000, 18000, 18000, 18000, 18000, 18000, 18000)";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}


# Code to Insert Dummy Data in Sem2Attendance Table ...
try {
       $sql = "INSERT INTO sem2Attendance (regdNo) VALUES
              ('SC-2081-400-1'),
              ('SC-2081-400-2'),
              ('SC-2081-400-3'),
              ('SC-2081-400-4'),
              ('SC-2081-400-5'),
              ('SC-2081-400-6'),
              ('SC-2081-400-7'),
              ('SC-2081-400-8'),
              ('SC-2081-400-9'),
              ('SC-2081-400-10')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert Dummy Data in Sem4Attendance Table ...
try {
       $sql = "INSERT INTO sem4Attendance (regdNo) VALUES
              ('SC-2080-400-1'),
              ('SC-2080-400-2'),
              ('SC-2080-400-3'),
              ('SC-2080-400-4'),
              ('SC-2080-400-5'),
              ('SC-2080-400-6'),
              ('SC-2080-400-7'),
              ('SC-2080-400-8'),
              ('SC-2080-400-9'),
              ('SC-2080-400-10')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Data in Sem5Attendance Table ...
try {
       $sql = "INSERT INTO sem5Attendance (regdNo) VALUES
              ('SC-2079-300-1'),
              ('SC-2079-300-2'),
              ('SC-2079-300-3'),
              ('SC-2079-300-4'),
              ('SC-2079-300-5'),
              ('SC-2079-300-6'),
              ('SC-2079-300-8'),
              ('SC-2079-300-9'),
              ('SC-2079-300-10')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Data in Sem6Attendance Table ...
try {
       $sql = "INSERT INTO sem6Attendance (regdNo) VALUES
              ('SC-2078-200-1'),
              ('SC-2078-200-2'),
              ('SC-2078-200-3'),
              ('SC-2078-200-4'),
              ('SC-2078-200-5'),
              ('SC-2078-200-6'),
              ('SC-2078-200-7'),
              ('SC-2078-200-8'),
              ('SC-2078-200-9'),
              ('SC-2078-200-10')";

       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert Dummy Data in Sem7Attendance Table ...
# Note: No students currently in semester 7, so no attendance data needed
# try {
#        $sql = "INSERT INTO sem7Attendance (regdNo) VALUES
#               ('placeholder')";
#        $conn->query($sql);
# } catch (Exception $e) {
#        exit("<br><b>Error:</b>" . $e->getMessage());
# }





# Code to Insert Dummy Data in Sem8Attendance Table ...
try {
       $sql = "INSERT INTO sem8Attendance (regdNo) VALUES
              ('SC-2077-100-1'),
              ('SC-2077-100-2'),
              ('SC-2077-100-3'),
              ('SC-2077-100-4'),
              ('SC-2077-100-5'),
              ('SC-2077-100-6'),
              ('SC-2077-100-7'),
              ('SC-2077-100-8'),
              ('SC-2077-100-9'),
              ('SC-2077-100-10')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}


# Code to Insert Dummy Teachers Notice ...
try {
       $sql = "INSERT INTO teacherNotice (title, nbody, photo) VALUES
              ('Semester Exam Schedule', 'Dear Teachers, please find the detailed exam schedule for the upcoming semester exams. Make sure to inform students accordingly.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Faculty Meeting', 'All faculty members are requested to attend the meeting on Friday at 10:00 AM in the Conference Hall.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Assignment Submission Reminder', 'Please ensure all students submit their assignments for internal evaluation by the 15th of this month.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Project Proposal Deadline', 'Teachers are advised to collect and review project proposals from students of final semester before the end of this week.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('New Curriculum Orientation', 'An orientation program regarding the updated CSIT curriculum will be conducted on Monday. All teachers must attend.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Student Attendance Review', 'Kindly update and verify student attendance records for the current semester by the 25th.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Lab Equipment Maintenance', 'Lab incharges are requested to prepare a list of equipment that needs maintenance or replacement before the upcoming practical exams.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Seminar Invitation', 'Teachers are encouraged to participate in the National IT Seminar being held on 20th of this month at Kathmandu.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Internal Exam Question Submission', 'All teachers must submit the question papers for internal assessments to the Exam Department by Wednesday.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Teacher Feedback Form', 'Please fill up the Teacher Feedback Form regarding curriculum and teaching methodologies by the end of this semester.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert Dummy Stduents Notice ...
try {
       $sql = "INSERT INTO studentNotice (title, nbody, photo) VALUES
              ('Mid-Term Exam Notice', 'Mid-term exams will start from 15th August. Please prepare accordingly and collect admit cards from the office.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Exam Form Submission', 'Students are informed to submit the semester exam forms before 10th August. Late submission will not be entertained.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Database Class Postponed', 'Today\'s Database Management System class (Section A) has been postponed due to unavoidable circumstances.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Practical Lab Schedule', 'The practical lab sessions for Computer Networks will commence from next Monday. Check the lab schedule on the notice board.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Class Test Announcement', 'A class test for Object-Oriented Programming will be held on Friday during regular class hours.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Workshop on AI', 'Students are invited to attend a workshop on Artificial Intelligence organized by the CSIT Department this Saturday.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Exam Admit Card Distribution', 'Admit cards for the final semester exam can be collected from the exam department starting from 5th August.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Lab Equipment Handling', 'All students are requested to handle lab equipment with care during practical sessions. Any damage must be reported immediately.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Internal Exam Timetable', 'The timetable for the upcoming internal examinations has been published. Please check the official website or notice board.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Python Practical Class Update', 'Python practical classes will now be conducted in Lab 3 starting from next week. Kindly take note.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Class Representative Meeting', 'A meeting with all class representatives will be held tomorrow at 1:00 PM regarding upcoming college events.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Semester Project Guidelines', 'Students of 6th semester must submit project proposals following the new guidelines provided by the Department.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Holiday Notice', 'The college will remain closed on 15th August due to a public holiday. Classes will resume as per schedule.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Networking Lab Assessment', 'Networking practical assessments will begin from next Tuesday. Ensure all lab assignments are completed.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg'),
              ('Fee Payment Reminder', 'Students who have not yet cleared their tuition fees are requested to do so before the examination form submission deadline.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg')";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}






# Code to Insert sem1StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem1StudyMaterials (batch, cid, message, file, tid) VALUES
              (2077, 'CSIT_111', 'English Grammar basics: Parts of Speech overview.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1000),
              (2077, 'CSIT_112', 'Introduction to Information Technology fundamentals.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2077, 'CSIT_113', 'Calculus: Limits and Continuity.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2077, 'CSIT_114', 'Electronic Principles: Basic circuit laws.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2077, 'CSIT_115', 'Programming Fundamentals: Variables and Data Types.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2078, 'CSIT_111', 'English Grammar: Sentence Structure.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2078, 'CSIT_112', 'Information Technology: Hardware and Software basics.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2078, 'CSIT_113', 'Calculus: Derivatives introduction.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2078, 'CSIT_114', 'Electronic Principles: Diodes and transistors.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2078, 'CSIT_115', 'Programming Fundamentals: Control Structures.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2079, 'CSIT_111', 'English Grammar: Tenses and their uses.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2079, 'CSIT_112', 'IT Fundamentals: Networking Basics.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2079, 'CSIT_113', 'Calculus: Integration techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2079, 'CSIT_114', 'Electronic Principles: Amplifiers.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2079, 'CSIT_115', 'Programming Fundamentals: Functions and Arrays.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}




# Code to Insert sem2StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem2StudyMaterials (batch, cid, message, file, tid) VALUES
              (2077, 'CSIT_121', 'Data Structure basics: Arrays and Linked Lists.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1000),
              (2077, 'CSIT_122', 'Digital Logic: Boolean Algebra.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2077, 'CSIT_123', 'Linear Algebra: Matrix operations.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2077, 'CSIT_124', 'Mechanics: Laws of Motion.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2077, 'CSIT_125', 'Microprocessor Systems: Architecture Overview.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2078, 'CSIT_121', 'Data Structures: Stacks and Queues.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2078, 'CSIT_122', 'Digital Logic: Combinational Circuits.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2078, 'CSIT_123', 'Linear Algebra: Vector Spaces.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2078, 'CSIT_124', 'Electrodynamics: Maxwell’s Equations.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2078, 'CSIT_125', 'Microprocessor Systems: Programming Basics.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2079, 'CSIT_121', 'Algorithms: Sorting and Searching.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2079, 'CSIT_122', 'Digital Logic: Sequential Circuits.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2079, 'CSIT_123', 'Linear Algebra: Eigenvalues and Eigenvectors.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2079, 'CSIT_124', 'Mechanics: Work and Energy.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2079, 'CSIT_125', 'Microprocessor Systems: Interrupts and Timers.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem3StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem3StudyMaterials (batch, cid, message, file, tid) VALUES
              (2081, 'CSIT_211', 'Notes on Computer Architecture: CPU Pipeline & Cache.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2081, 'CSIT_212', 'Discrete Structures: Logic Gates and Proof Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2081, 'CSIT_213', 'Management Principles: Planning and Decision Making.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2080, 'CSIT_214', 'OOP in C++: Class, Object, Encapsulation Example Code.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2080, 'CSIT_215', 'Operating System: Process Scheduling Algorithms.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2080, 'CSIT_216', 'Statistics: Probability Distribution Cheat Sheet.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2079, 'CSIT_211', 'Detailed Notes on Bus Architecture and Memory Hierarchy.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2079, 'CSIT_212', 'Discrete Mathematics: Set Theory & Relations.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2079, 'CSIT_213', 'Management Case Study on Business Strategy.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2078, 'CSIT_214', 'C++ OOPs: Inheritance & Polymorphism Tutorial Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2078, 'CSIT_215', 'Operating System Lab Manual: Deadlock Detection.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2078, 'CSIT_216', 'Solved Numerical Problems on Probability & Statistics.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2077, 'CSIT_211', 'Detailed CPU Organization Chart.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2077, 'CSIT_212', 'Graph Theory Notes - BFS & DFS Algorithms.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014),
              (2077, 'CSIT_213', 'Management Functions & Organizational Structure.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1015)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem4StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem4StudyMaterials (batch, cid, message, file, tid) VALUES
              (2081, 'CSIT_221', 'Applied Statistics Notes: Hypothesis Testing Methods.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2081, 'CSIT_222', 'Data Communication: OSI Model Detailed Explanation.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2081, 'CSIT_223', 'DBMS ER Diagram and Normalization Guide.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2081, 'CSIT_224', 'Numerical Methods: Newton-Raphson Method Example.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2080, 'CSIT_225', 'System Analysis: Software Development Life Cycle (SDLC).', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2080, 'CSIT_226', 'Theory of Computation: Finite Automata Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2080, 'CSIT_221', 'Applied Statistics: Chi-Square Test Summary.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2079, 'CSIT_222', 'Computer Networks: TCP/IP Model & Protocols.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2079, 'CSIT_223', 'DBMS: SQL Joins and Queries Sample Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2079, 'CSIT_224', 'Numerical Methods Lab Manual: Gauss Elimination.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2078, 'CSIT_225', 'System Analysis & Design: Case Study on Banking System.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2078, 'CSIT_226', 'Theory of Computation: Regular Expressions Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2078, 'CSIT_221', 'Statistics Notes on Regression Analysis.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2077, 'CSIT_222', 'Data Communication: Error Detection Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014),
              (2077, 'CSIT_223', 'DBMS Transactions & Concurrency Control Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1015)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem5StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem5StudyMaterials (batch, cid, message, file, tid) VALUES
              (2080, 'CSIT_311', 'Design and Analysis of Algorithms Notes: Greedy Method.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2080, 'CSIT_312', 'Artificial Intelligence: Introduction to Search Algorithms.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2080, 'CSIT_313', 'Compiler Design: Lexical Analysis and Parsing Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2080, 'CSIT_314', 'Simulation and Modelling: Discrete Event Simulation Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2080, 'CSIT_315', 'Graphics and Visual Computing: Transformation Matrices.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2080, 'CSIT_316', 'Web Technology I: HTML & CSS Basics.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2079, 'CSIT_311', 'Algorithm Design: Dynamic Programming Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2079, 'CSIT_312', 'AI: Neural Networks and Backpropagation Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2079, 'CSIT_313', 'Compiler Phases: Intermediate Code Generation.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2079, 'CSIT_314', 'Simulation Techniques: Monte Carlo Methods.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2078, 'CSIT_315', 'Graphics Lab: 2D & 3D Transformations Practice.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2078, 'CSIT_316', 'Web Technology I: JavaScript Basics and DOM Manipulation.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2078, 'CSIT_311', 'Algorithm Design: Divide and Conquer Approach.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2077, 'CSIT_312', 'AI: Knowledge Representation and Reasoning Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014),
              (2077, 'CSIT_313', 'Compiler Design: Syntax-Directed Translation.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1015)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem6StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem6StudyMaterials (batch, cid, message, file, tid) VALUES
              (2080, 'CSIT_321', 'Introduction to Cryptography: Symmetric and Asymmetric Encryption Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2080, 'CSIT_322', 'Java Programming I: OOP Concepts and Interfaces.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2080, 'CSIT_323', 'Research Methodology: Research Design & Hypothesis.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2080, 'CSIT_324', 'Software Engineering: SDLC Models & Agile Methodology.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2080, 'CSIT_325', 'Web Technology II: Advanced JavaScript & AJAX.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2080, 'CSIT_326', 'Minor Project I: Guidelines & Report Format.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2079, 'CSIT_321', 'Cryptography: Digital Signatures and Certificates.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2079, 'CSIT_322', 'Java Programming: Exception Handling & File I/O.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2079, 'CSIT_323', 'Research: Literature Review Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2079, 'CSIT_324', 'Software Engineering: Use Case Diagrams & UML.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2078, 'CSIT_325', 'Web Technology II: PHP and MySQL Integration.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2078, 'CSIT_326', 'Minor Project I: Topic Selection Guidelines.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2078, 'CSIT_321', 'Cryptography: Hash Functions and Applications.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2077, 'CSIT_322', 'Java Programming: GUI Development with Swing.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014),
              (2077, 'CSIT_323', 'Research Methodology: Data Collection Methods.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1015)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem7StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem7StudyMaterials (batch, cid, message, file, tid) VALUES
              (2079, 'CSIT_411', 'E-commerce: Business Models and Payment Systems.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2079, 'CSIT_412', 'Advanced Java Programming: Multithreading Concepts.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2079, 'CSIT_413', 'OOAD: Class Diagrams and Object Modeling.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2079, 'CSIT_414', 'Minor Project II: Proposal Submission Format.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2079, 'CSIT_415_2', 'Database Administration: Backup and Recovery Procedures.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2079, 'CSIT_416_1', 'Data Mining: Association Rules and Clustering.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2078, 'CSIT_411', 'E-commerce: Security Issues and Solutions.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2078, 'CSIT_412', 'Advanced Java: JDBC and Servlets Notes.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2078, 'CSIT_413', 'OOAD: Sequence Diagrams and Use Case Scenarios.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2078, 'CSIT_414', 'Minor Project II: Presentation Guidelines.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010),
              (2078, 'CSIT_415_2', 'DBA: User Management and Role Assignments.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1011),
              (2077, 'CSIT_416_1', 'Data Warehousing: ETL Processes Explained.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1012),
              (2077, 'CSIT_411', 'E-commerce: Mobile Commerce Applications.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1013),
              (2077, 'CSIT_412', 'Advanced Java: Networking and RMI Overview.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1014),
              (2077, 'CSIT_413', 'OOAD: Design Patterns and Best Practices.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1015)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem8StudyMaterial Data ...
try {
       $sql = "INSERT INTO sem8StudyMaterials (batch, cid, message, file, tid) VALUES
              (2078, 'CSIT_421', 'Parallel Computing: Introduction to Parallel Architectures.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1001),
              (2078, 'CSIT_422', 'Internship: Submission Guidelines for Internship Report.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1002),
              (2078, 'CSIT_423_2', 'Advanced Database Design: Normalization to 5NF.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1003),
              (2078, 'CSIT_424_2', 'Distributed DBMS: Replication Techniques.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1004),
              (2078, 'CSIT_425_3', 'E-Governance: Implementation Strategies in Nepal.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1005),
              (2077, 'CSIT_421', 'Parallel Computing: SIMD and MIMD Architectures.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1006),
              (2077, 'CSIT_422', 'Internship: Daily Logbook Format and Evaluation Criteria.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1007),
              (2077, 'CSIT_423_2', 'Advanced Database Design: ER to Relational Mapping.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1008),
              (2077, 'CSIT_424_2', 'Distributed DBMS: Fragmentation and Allocation Strategies.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1009),
              (2077, 'CSIT_425_3', 'E-Governance: Digital Signature and Authentication.', 'http://localhost/student-management-system/public/assets/images/notice.jpeg', 1010)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}







# Code to Insert sem1Result Data ...
try {
       $sql = "INSERT INTO sem1result
              (regdNo, symbolNo, examYear, CSIT_111_TH, CSIT_112_TH, CSIT_112_PR, CSIT_113_TH, CSIT_114_TH, CSIT_114_PR, CSIT_115_TH, CSIT_115_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 85, 50, 35, 78, 45, 38, 55, 37),
              ('SC-2077-100-2', 'SYM20771002', 2077, 82, 52, 33, 74, 48, 35, 58, 39),
              ('SC-2077-100-3', 'SYM20771003', 2077, 79, 49, 36, 80, 50, 40, 53, 35),
              ('SC-2077-100-4', 'SYM20771004', 2077, 88, 55, 38, 77, 46, 37, 56, 38),
              ('SC-2077-100-5', 'SYM20771005', 2077, 84, 51, 34, 75, 47, 36, 57, 37),
              ('SC-2077-100-6', 'SYM20771006', 2077, 81, 48, 35, 79, 49, 39, 54, 36),
              ('SC-2077-100-7', 'SYM20771007', 2077, 86, 53, 37, 76, 44, 38, 59, 38),
              ('SC-2077-100-8', 'SYM20771008', 2077, 83, 50, 34, 73, 45, 35, 55, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 80, 49, 36, 78, 48, 37, 52, 36),
              ('SC-2077-100-10', 'SYM20771010', 2077, 85, 52, 35, 74, 50, 40, 56, 39),
              ('SC-2078-200-1', 'SYM20782001', 2078, 87, 54, 37, 79, 49, 38, 58, 39),
              ('SC-2078-200-2', 'SYM20782002', 2078, 82, 50, 34, 75, 46, 35, 55, 37),
              ('SC-2078-200-3', 'SYM20782003', 2078, 84, 51, 36, 77, 48, 39, 57, 38),
              ('SC-2078-200-4', 'SYM20782004', 2078, 79, 48, 33, 73, 45, 36, 54, 36),
              ('SC-2078-200-5', 'SYM20782005', 2078, 85, 53, 38, 78, 49, 40, 56, 39),
              ('SC-2078-200-6', 'SYM20782006', 2078, 81, 49, 35, 74, 46, 37, 55, 38),
              ('SC-2078-200-7', 'SYM20782007', 2078, 83, 52, 34, 76, 47, 36, 57, 37),
              ('SC-2078-200-8', 'SYM20782008', 2078, 80, 50, 33, 72, 44, 35, 53, 35),
              ('SC-2078-200-9', 'SYM20782009', 2078, 84, 51, 37, 79, 49, 39, 56, 38),
              ('SC-2078-200-10', 'SYM20782010', 2078, 82, 48, 34, 75, 46, 38, 55, 36),
              ('SC-2079-300-1', 'SYM20793001', 2079, 86, 54, 36, 78, 48, 37, 58, 39),
              ('SC-2079-300-2', 'SYM20793002', 2079, 80, 49, 33, 73, 45, 35, 54, 36),
              ('SC-2079-300-3', 'SYM20793003', 2079, 85, 52, 37, 79, 50, 40, 57, 39),
              ('SC-2079-300-4', 'SYM20793004', 2079, 83, 51, 34, 75, 47, 36, 56, 37),
              ('SC-2079-300-5', 'SYM20793005', 2079, 81, 48, 35, 74, 45, 38, 55, 36),
              ('SC-2079-300-6', 'SYM20793006', 2079, 84, 53, 38, 78, 49, 39, 58, 38),
              ('SC-2079-300-7', 'SYM20793007', 2079, 79, 50, 33, 72, 46, 35, 53, 35),
              ('SC-2079-300-8', 'SYM20793008', 2079, 82, 51, 34, 77, 48, 37, 57, 37),
              ('SC-2079-300-9', 'SYM20793009', 2079, 85, 54, 36, 79, 49, 38, 58, 39),
              ('SC-2079-300-10', 'SYM20793010', 2079, 81, 49, 35, 75, 46, 37, 55, 36),
              ('SC-2080-400-1', 'SYM20804001', 2080, 88, 55, 38, 80, 50, 40, 59, 39),
              ('SC-2080-400-2', 'SYM20804002', 2080, 83, 50, 35, 75, 48, 37, 56, 38),
              ('SC-2080-400-3', 'SYM20804003', 2080, 85, 52, 36, 78, 47, 38, 58, 39),
              ('SC-2080-400-4', 'SYM20804004', 2080, 79, 49, 34, 74, 45, 35, 54, 37),
              ('SC-2080-400-5', 'SYM20804005', 2080, 81, 48, 33, 76, 46, 36, 55, 36),
              ('SC-2080-400-6', 'SYM20804006', 2080, 84, 53, 37, 79, 49, 39, 57, 38),
              ('SC-2080-400-7', 'SYM20804007', 2080, 82, 50, 35, 75, 47, 38, 56, 37),
              ('SC-2080-400-8', 'SYM20804008', 2080, 85, 51, 36, 78, 49, 40, 58, 39),
              ('SC-2080-400-9', 'SYM20804009', 2080, 80, 49, 34, 73, 45, 36, 55, 36),
              ('SC-2080-400-10', 'SYM20804010', 2080, 83, 52, 37, 77, 48, 39, 57, 38),
              ('SC-2081-400-1', 'SYM20814001', 2081, 87, 53, 38, 79, 49, 37, 56, 38),
              ('SC-2081-400-2', 'SYM20814002', 2081, 81, 50, 35, 74, 46, 36, 55, 37),
              ('SC-2081-400-3', 'SYM20814003', 2081, 84, 52, 34, 77, 48, 38, 57, 39),
              ('SC-2081-400-4', 'SYM20814004', 2081, 79, 49, 33, 73, 45, 35, 54, 36),
              ('SC-2081-400-5', 'SYM20814005', 2081, 83, 51, 37, 78, 49, 39, 58, 38),
              ('SC-2081-400-6', 'SYM20814006', 2081, 82, 48, 35, 75, 46, 37, 56, 37),
              ('SC-2081-400-7', 'SYM20814007', 2081, 85, 53, 36, 79, 49, 40, 59, 39),
              ('SC-2081-400-8', 'SYM20814008', 2081, 80, 50, 34, 74, 45, 36, 55, 37),
              ('SC-2081-400-9', 'SYM20814009', 2081, 84, 51, 35, 77, 48, 38, 57, 38),
              ('SC-2081-400-10', 'SYM20814010', 2081, 81, 49, 33, 75, 46, 35, 54, 36)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem2Result Data ...
try {
       $sql = "INSERT INTO sem2result
              (regdNo, symbolNo, examYear, CSIT_121_TH, CSIT_121_PR, CSIT_122_TH, CSIT_122_PR, CSIT_123_TH, CSIT_124_TH, CSIT_124_PR, CSIT_125_TH, CSIT_125_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 50, 35, 55, 38, 80, 50, 40, 58, 39),
              ('SC-2077-100-2', 'SYM20771002', 2077, 48, 33, 53, 37, 75, 48, 36, 55, 37),
              ('SC-2077-100-3', 'SYM20771003', 2077, 52, 36, 56, 39, 78, 49, 38, 57, 38),
              ('SC-2077-100-4', 'SYM20771004', 2077, 49, 34, 54, 38, 79, 50, 39, 56, 38),
              ('SC-2077-100-5', 'SYM20771005', 2077, 51, 35, 55, 40, 77, 48, 37, 58, 39),
              ('SC-2077-100-6', 'SYM20771006', 2077, 50, 36, 53, 38, 76, 49, 35, 55, 37),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 37, 56, 39, 79, 50, 40, 57, 38),
              ('SC-2077-100-8', 'SYM20771008', 2077, 48, 34, 54, 38, 75, 47, 36, 56, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 52, 35, 55, 39, 78, 49, 37, 58, 39),
              ('SC-2077-100-10', 'SYM20771010', 2077, 50, 36, 54, 38, 76, 48, 35, 55, 36),
              ('SC-2078-200-1', 'SYM20782001', 2078, 49, 33, 53, 37, 77, 47, 36, 56, 38),
              ('SC-2078-200-2', 'SYM20782002', 2078, 51, 35, 55, 39, 79, 50, 38, 58, 39),
              ('SC-2078-200-3', 'SYM20782003', 2078, 50, 36, 54, 38, 76, 48, 37, 55, 37),
              ('SC-2078-200-4', 'SYM20782004', 2078, 52, 35, 56, 39, 78, 49, 39, 57, 38),
              ('SC-2078-200-5', 'SYM20782005', 2078, 48, 34, 53, 38, 75, 47, 35, 54, 36),
              ('SC-2078-200-6', 'SYM20782006', 2078, 50, 36, 54, 39, 77, 48, 37, 56, 38),
              ('SC-2078-200-7', 'SYM20782007', 2078, 51, 35, 55, 38, 79, 50, 40, 58, 39),
              ('SC-2078-200-8', 'SYM20782008', 2078, 49, 33, 53, 37, 76, 47, 36, 55, 37),
              ('SC-2078-200-9', 'SYM20782009', 2078, 52, 36, 56, 39, 78, 49, 38, 57, 38),
              ('SC-2078-200-10', 'SYM20782010', 2078, 50, 35, 54, 38, 75, 46, 35, 56, 37),
              ('SC-2079-300-1', 'SYM20793001', 2079, 53, 37, 56, 39, 79, 50, 39, 58, 39),
              ('SC-2079-300-2', 'SYM20793002', 2079, 49, 34, 53, 37, 75, 47, 35, 55, 37),
              ('SC-2079-300-3', 'SYM20793003', 2079, 50, 36, 54, 38, 77, 48, 37, 57, 38),
              ('SC-2079-300-4', 'SYM20793004', 2079, 51, 35, 55, 39, 78, 49, 38, 56, 38),
              ('SC-2079-300-5', 'SYM20793005', 2079, 52, 36, 56, 39, 79, 50, 40, 58, 39),
              ('SC-2079-300-6', 'SYM20793006', 2079, 48, 33, 53, 37, 75, 46, 35, 54, 36),
              ('SC-2079-300-7', 'SYM20793007', 2079, 50, 35, 54, 38, 76, 47, 36, 55, 37),
              ('SC-2079-300-8', 'SYM20793008', 2079, 51, 36, 55, 39, 78, 49, 38, 57, 38),
              ('SC-2079-300-9', 'SYM20793009', 2079, 49, 34, 53, 37, 75, 46, 36, 55, 37),
              ('SC-2079-300-10', 'SYM20793010', 2079, 52, 35, 56, 39, 79, 49, 39, 58, 39),
              ('SC-2080-400-1', 'SYM20804001', 2080, 50, 36, 54, 38, 76, 48, 37, 56, 38),
              ('SC-2080-400-2', 'SYM20804002', 2080, 51, 35, 55, 39, 79, 50, 40, 57, 39),
              ('SC-2080-400-3', 'SYM20804003', 2080, 49, 34, 53, 37, 75, 47, 35, 55, 37),
              ('SC-2080-400-4', 'SYM20804004', 2080, 52, 36, 56, 39, 78, 49, 38, 58, 39),
              ('SC-2080-400-5', 'SYM20804005', 2080, 50, 35, 54, 38, 76, 46, 36, 55, 37),
              ('SC-2080-400-6', 'SYM20804006', 2080, 51, 36, 55, 39, 77, 48, 37, 56, 38),
              ('SC-2080-400-7', 'SYM20804007', 2080, 49, 33, 53, 37, 75, 47, 36, 54, 36),
              ('SC-2080-400-8', 'SYM20804008', 2080, 50, 35, 54, 38, 76, 48, 37, 55, 37),
              ('SC-2080-400-9', 'SYM20804009', 2080, 51, 36, 55, 39, 78, 49, 38, 56, 38),
              ('SC-2080-400-10', 'SYM20804010', 2080, 49, 34, 53, 37, 75, 47, 35, 55, 37),
              ('SC-2081-400-1', 'SYM20814001', 2081, 52, 35, 56, 39, 79, 50, 39, 57, 38),
              ('SC-2081-400-2', 'SYM20814002', 2081, 50, 36, 54, 38, 77, 48, 37, 56, 38),
              ('SC-2081-400-3', 'SYM20814003', 2081, 51, 35, 55, 39, 78, 49, 38, 57, 39),
              ('SC-2081-400-4', 'SYM20814004', 2081, 49, 33, 53, 37, 75, 46, 36, 55, 37),
              ('SC-2081-400-5', 'SYM20814005', 2081, 52, 36, 56, 39, 79, 49, 39, 58, 38),
              ('SC-2081-400-6', 'SYM20814006', 2081, 50, 35, 54, 38, 76, 47, 36, 56, 37),
              ('SC-2081-400-7', 'SYM20814007', 2081, 51, 36, 55, 39, 78, 49, 38, 57, 39),
              ('SC-2081-400-8', 'SYM20814008', 2081, 49, 34, 53, 37, 75, 46, 35, 55, 36),
              ('SC-2081-400-9', 'SYM20814009', 2081, 50, 35, 54, 38, 76, 47, 37, 56, 37),
              ('SC-2081-400-10', 'SYM20814010', 2081, 51, 36, 55, 39, 78, 49, 39, 57, 38)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}


# Code to Insert sem3Result Data ...
try {
       $sql = "INSERT INTO sem3result
              (regdNo, symbolNo, examYear, 
              CSIT_211_TH, CSIT_211_PR,
              CSIT_212_TH, CSIT_212_PR,
              CSIT_213_TH, CSIT_213_PR,
              CSIT_214_TH, CSIT_214_PR,
              CSIT_215_TH, CSIT_215_PR,
              CSIT_216_TH, CSIT_216_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 55, 35, 50, 30, 58, 35, 54, 38, 56, 37, 59, 39),
              ('SC-2077-100-2', 'SYM20771002', 2077, 53, 34, 52, 32, 55, 33, 56, 37, 58, 38, 57, 37),
              ('SC-2077-100-3', 'SYM20771003', 2077, 54, 36, 51, 31, 57, 35, 55, 36, 59, 39, 56, 38),
              ('SC-2077-100-4', 'SYM20771004', 2077, 56, 35, 53, 30, 56, 34, 57, 38, 55, 37, 58, 39),
              ('SC-2077-100-5', 'SYM20771005', 2077, 52, 33, 50, 31, 54, 32, 56, 37, 57, 38, 55, 36),
              ('SC-2077-100-6', 'SYM20771006', 2077, 55, 35, 54, 33, 58, 36, 53, 34, 59, 38, 56, 37),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 34, 52, 31, 55, 33, 55, 36, 57, 37, 54, 36),
              ('SC-2077-100-8', 'SYM20771008', 2077, 54, 35, 50, 30, 56, 34, 57, 38, 55, 36, 56, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 55, 36, 53, 32, 58, 35, 56, 37, 59, 39, 57, 38),
              ('SC-2077-100-10', 'SYM20771010', 2077, 52, 34, 51, 31, 54, 33, 55, 35, 57, 37, 55, 36),
              ('SC-2078-200-1', 'SYM20782001', 2078, 54, 35, 53, 33, 56, 34, 57, 36, 55, 35, 56, 37),
              ('SC-2078-200-2', 'SYM20782002', 2078, 55, 36, 50, 32, 58, 35, 56, 37, 59, 38, 57, 39),
              ('SC-2078-200-3', 'SYM20782003', 2078, 53, 34, 52, 30, 54, 33, 55, 35, 57, 37, 56, 38),
              ('SC-2078-200-4', 'SYM20782004', 2078, 54, 35, 53, 31, 56, 34, 56, 36, 58, 38, 55, 37),
              ('SC-2078-200-5', 'SYM20782005', 2078, 55, 36, 51, 32, 57, 35, 57, 37, 59, 39, 57, 38),
              ('SC-2078-200-6', 'SYM20782006', 2078, 52, 33, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-7', 'SYM20782007', 2078, 54, 35, 52, 32, 56, 34, 57, 37, 58, 38, 56, 37),
              ('SC-2078-200-8', 'SYM20782008', 2078, 55, 36, 53, 33, 58, 35, 56, 36, 59, 39, 57, 38),
              ('SC-2078-200-9', 'SYM20782009', 2078, 52, 34, 50, 31, 54, 33, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-10', 'SYM20782010', 2078, 54, 35, 52, 32, 56, 34, 57, 36, 58, 38, 56, 37),
              ('SC-2079-300-1', 'SYM20793001', 2079, 55, 35, 51, 31, 57, 34, 56, 37, 58, 38, 57, 39),
              ('SC-2079-300-2', 'SYM20793002', 2079, 53, 34, 53, 30, 55, 33, 55, 36, 57, 37, 55, 36),
              ('SC-2079-300-3', 'SYM20793003', 2079, 54, 35, 50, 32, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-4', 'SYM20793004', 2079, 55, 36, 52, 31, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-5', 'SYM20793005', 2079, 52, 33, 53, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-6', 'SYM20793006', 2079, 54, 35, 51, 31, 57, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-7', 'SYM20793007', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-8', 'SYM20793008', 2079, 53, 34, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-9', 'SYM20793009', 2079, 54, 35, 52, 31, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-10', 'SYM20793010', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2080-400-1', 'SYM20804001', 2080, 52, 33, 51, 30, 56, 34, 55, 37, 57, 38, 56, 37),
              ('SC-2080-400-2', 'SYM20804002', 2080, 54, 35, 53, 32, 58, 36, 57, 38, 59, 39, 57, 38),
              ('SC-2080-400-3', 'SYM20804003', 2080, 55, 36, 50, 31, 55, 33, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-4', 'SYM20804004', 2080, 53, 34, 52, 30, 57, 35, 55, 36, 58, 38, 56, 37),
              ('SC-2080-400-5', 'SYM20804005', 2080, 54, 35, 53, 32, 56, 34, 57, 37, 59, 39, 57, 38),
              ('SC-2080-400-6', 'SYM20804006', 2080, 55, 36, 51, 31, 58, 35, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-7', 'SYM20804007', 2080, 52, 33, 50, 30, 55, 33, 55, 36, 56, 37, 55, 36),
              ('SC-2080-400-8', 'SYM20804008', 2080, 54, 35, 53, 32, 57, 34, 57, 37, 58, 38, 56, 37),
              ('SC-2080-400-9', 'SYM20804009', 2080, 55, 36, 52, 31, 56, 34, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-10', 'SYM20804010', 2080, 53, 34, 50, 30, 55, 33, 55, 36, 56, 37, 55, 36)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem4Result Data ...
try {
       $sql = "INSERT INTO sem4result
              (regdNo, symbolNo, examYear,
              CSIT_221_TH, CSIT_221_PR,
              CSIT_222_TH, CSIT_222_PR,
              CSIT_223_TH, CSIT_223_PR,
              CSIT_224_TH, CSIT_224_PR,
              CSIT_225_TH, CSIT_225_PR,
              CSIT_226_TH, CSIT_226_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 55, 35, 50, 30, 58, 35, 54, 38, 56, 37, 59, 39),
              ('SC-2077-100-2', 'SYM20771002', 2077, 53, 34, 52, 32, 55, 33, 56, 37, 58, 38, 57, 37),
              ('SC-2077-100-3', 'SYM20771003', 2077, 54, 36, 51, 31, 57, 35, 55, 36, 59, 39, 56, 38),
              ('SC-2077-100-4', 'SYM20771004', 2077, 56, 35, 53, 30, 56, 34, 57, 38, 55, 37, 58, 39),
              ('SC-2077-100-5', 'SYM20771005', 2077, 52, 33, 50, 31, 54, 32, 56, 37, 57, 38, 55, 36),
              ('SC-2077-100-6', 'SYM20771006', 2077, 55, 35, 54, 33, 58, 36, 53, 34, 59, 38, 56, 37),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 34, 52, 31, 55, 33, 55, 36, 57, 37, 54, 36),
              ('SC-2077-100-8', 'SYM20771008', 2077, 54, 35, 50, 30, 56, 34, 57, 38, 55, 36, 56, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 55, 36, 53, 32, 58, 35, 56, 37, 59, 39, 57, 38),
              ('SC-2077-100-10', 'SYM20771010', 2077, 52, 34, 51, 31, 54, 33, 55, 35, 57, 37, 55, 36),
              ('SC-2078-200-1', 'SYM20782001', 2078, 54, 35, 53, 33, 56, 34, 57, 36, 55, 35, 56, 37),
              ('SC-2078-200-2', 'SYM20782002', 2078, 55, 36, 50, 32, 58, 35, 56, 37, 59, 38, 57, 39),
              ('SC-2078-200-3', 'SYM20782003', 2078, 53, 34, 52, 30, 54, 33, 55, 35, 57, 37, 56, 38),
              ('SC-2078-200-4', 'SYM20782004', 2078, 54, 35, 53, 31, 56, 34, 56, 36, 58, 38, 55, 37),
              ('SC-2078-200-5', 'SYM20782005', 2078, 55, 36, 51, 32, 57, 35, 57, 37, 59, 39, 57, 38),
              ('SC-2078-200-6', 'SYM20782006', 2078, 52, 33, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-7', 'SYM20782007', 2078, 54, 35, 52, 32, 56, 34, 57, 37, 58, 38, 56, 37),
              ('SC-2078-200-8', 'SYM20782008', 2078, 55, 36, 53, 33, 58, 35, 56, 36, 59, 39, 57, 38),
              ('SC-2078-200-9', 'SYM20782009', 2078, 52, 34, 50, 31, 54, 33, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-10', 'SYM20782010', 2078, 54, 35, 52, 32, 56, 34, 57, 36, 58, 38, 56, 37),
              ('SC-2079-300-1', 'SYM20793001', 2079, 55, 35, 51, 31, 57, 34, 56, 37, 58, 38, 57, 39),
              ('SC-2079-300-2', 'SYM20793002', 2079, 53, 34, 53, 30, 55, 33, 55, 36, 57, 37, 55, 36),
              ('SC-2079-300-3', 'SYM20793003', 2079, 54, 35, 50, 32, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-4', 'SYM20793004', 2079, 55, 36, 52, 31, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-5', 'SYM20793005', 2079, 52, 33, 53, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-6', 'SYM20793006', 2079, 54, 35, 51, 31, 57, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-7', 'SYM20793007', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-8', 'SYM20793008', 2079, 53, 34, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-9', 'SYM20793009', 2079, 54, 35, 52, 31, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-10', 'SYM20793010', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2080-400-1', 'SYM20804001', 2080, 52, 33, 51, 30, 56, 34, 55, 37, 57, 38, 56, 37),
              ('SC-2080-400-2', 'SYM20804002', 2080, 54, 35, 53, 32, 58, 36, 57, 38, 59, 39, 57, 38),
              ('SC-2080-400-3', 'SYM20804003', 2080, 55, 36, 50, 31, 55, 33, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-4', 'SYM20804004', 2080, 53, 34, 52, 30, 57, 35, 55, 36, 58, 38, 56, 37),
              ('SC-2080-400-5', 'SYM20804005', 2080, 54, 35, 53, 32, 56, 34, 57, 37, 59, 39, 57, 38),
              ('SC-2080-400-6', 'SYM20804006', 2080, 55, 36, 51, 31, 58, 35, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-7', 'SYM20804007', 2080, 52, 33, 50, 30, 55, 33, 55, 36, 56, 37, 55, 36),
              ('SC-2080-400-8', 'SYM20804008', 2080, 54, 35, 53, 32, 57, 34, 57, 37, 58, 38, 56, 37),
              ('SC-2080-400-9', 'SYM20804009', 2080, 55, 36, 52, 31, 56, 34, 56, 37, 57, 38, 56, 37),
              ('SC-2080-400-10', 'SYM20804010', 2080, 53, 34, 50, 30, 55, 33, 55, 36, 56, 37, 55, 36)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem5Result Data ...
try {
       $sql = "INSERT INTO sem5result
              (regdNo, symbolNo, examYear,
              CSIT_311_TH, CSIT_311_PR,
              CSIT_312_TH, CSIT_312_PR,
              CSIT_313_TH, CSIT_313_PR,
              CSIT_314_TH, CSIT_314_PR,
              CSIT_315_TH, CSIT_315_PR,
              CSIT_316_TH, CSIT_316_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 55, 35, 50, 30, 58, 35, 54, 38, 56, 37, 59, 39),
              ('SC-2077-100-2', 'SYM20771002', 2077, 53, 34, 52, 32, 55, 33, 56, 37, 58, 38, 57, 37),
              ('SC-2077-100-3', 'SYM20771003', 2077, 54, 36, 51, 31, 57, 35, 55, 36, 59, 39, 56, 38),
              ('SC-2077-100-4', 'SYM20771004', 2077, 56, 35, 53, 30, 56, 34, 57, 38, 55, 37, 58, 39),
              ('SC-2077-100-5', 'SYM20771005', 2077, 52, 33, 50, 31, 54, 32, 56, 37, 57, 38, 55, 36),
              ('SC-2077-100-6', 'SYM20771006', 2077, 55, 35, 54, 33, 58, 36, 53, 34, 59, 38, 56, 37),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 34, 52, 31, 55, 33, 55, 36, 57, 37, 54, 36),
              ('SC-2077-100-8', 'SYM20771008', 2077, 54, 35, 50, 30, 56, 34, 57, 38, 55, 36, 56, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 55, 36, 53, 32, 58, 35, 56, 37, 59, 39, 57, 38),
              ('SC-2077-100-10', 'SYM20771010', 2077, 52, 34, 51, 31, 54, 33, 55, 35, 57, 37, 55, 36),
              ('SC-2078-200-1', 'SYM20782001', 2078, 54, 35, 53, 33, 56, 34, 57, 36, 55, 35, 56, 37),
              ('SC-2078-200-2', 'SYM20782002', 2078, 55, 36, 50, 32, 58, 35, 56, 37, 59, 38, 57, 39),
              ('SC-2078-200-3', 'SYM20782003', 2078, 53, 34, 52, 30, 54, 33, 55, 35, 57, 37, 56, 38),
              ('SC-2078-200-4', 'SYM20782004', 2078, 54, 35, 53, 31, 56, 34, 56, 36, 58, 38, 55, 37),
              ('SC-2078-200-5', 'SYM20782005', 2078, 55, 36, 51, 32, 57, 35, 57, 37, 59, 39, 57, 38),
              ('SC-2078-200-6', 'SYM20782006', 2078, 52, 33, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-7', 'SYM20782007', 2078, 54, 35, 52, 32, 56, 34, 57, 37, 58, 38, 56, 37),
              ('SC-2078-200-8', 'SYM20782008', 2078, 55, 36, 53, 33, 58, 35, 56, 36, 59, 39, 57, 38),
              ('SC-2078-200-9', 'SYM20782009', 2078, 52, 34, 50, 31, 54, 33, 55, 35, 56, 37, 55, 36),
              ('SC-2078-200-10', 'SYM20782010', 2078, 54, 35, 52, 32, 56, 34, 57, 36, 58, 38, 56, 37),
              ('SC-2079-300-1', 'SYM20793001', 2079, 55, 35, 51, 31, 57, 34, 56, 37, 58, 38, 57, 39),
              ('SC-2079-300-2', 'SYM20793002', 2079, 53, 34, 53, 30, 55, 33, 55, 36, 57, 37, 55, 36),
              ('SC-2079-300-3', 'SYM20793003', 2079, 54, 35, 50, 32, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-4', 'SYM20793004', 2079, 55, 36, 52, 31, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-5', 'SYM20793005', 2079, 52, 33, 53, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-6', 'SYM20793006', 2079, 54, 35, 51, 31, 57, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-7', 'SYM20793007', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38),
              ('SC-2079-300-8', 'SYM20793008', 2079, 53, 34, 50, 30, 54, 32, 55, 35, 56, 37, 55, 36),
              ('SC-2079-300-9', 'SYM20793009', 2079, 54, 35, 52, 31, 56, 34, 56, 37, 58, 38, 56, 37),
              ('SC-2079-300-10', 'SYM20793010', 2079, 55, 36, 53, 32, 58, 35, 57, 38, 59, 39, 57, 38)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem6Result Data ...
try {
       $sql = "INSERT INTO sem6result
              (regdNo, symbolNo, examYear,
              CSIT_321_TH, CSIT_321_PR,
              CSIT_322_TH, CSIT_322_PR,
              CSIT_323_TH, CSIT_323_PR,
              CSIT_324_TH, CSIT_324_PR,
              CSIT_325_TH, CSIT_325_PR,
              CSIT_326_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 55, 35, 50, 30, 58, 35, 54, 38, 56, 37, 95),
              ('SC-2077-100-2', 'SYM20771002', 2077, 53, 34, 52, 32, 55, 33, 56, 37, 58, 38, 90),
              ('SC-2077-100-3', 'SYM20771003', 2077, 54, 36, 51, 31, 57, 35, 55, 36, 59, 39, 92),
              ('SC-2077-100-4', 'SYM20771004', 2077, 56, 35, 53, 30, 56, 34, 57, 38, 55, 37, 88),
              ('SC-2077-100-5', 'SYM20771005', 2077, 52, 33, 50, 31, 54, 32, 56, 37, 57, 38, 85),
              ('SC-2077-100-6', 'SYM20771006', 2077, 55, 35, 54, 33, 58, 36, 53, 34, 59, 38, 94),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 34, 52, 31, 55, 33, 55, 36, 57, 37, 91),
              ('SC-2077-100-8', 'SYM20771008', 2077, 54, 35, 50, 30, 56, 34, 57, 38, 55, 36, 89),
              ('SC-2077-100-9', 'SYM20771009', 2077, 55, 36, 53, 32, 58, 35, 56, 37, 59, 39, 93),
              ('SC-2077-100-10', 'SYM20771010', 2077, 52, 34, 51, 31, 54, 33, 55, 35, 57, 37, 90),
              ('SC-2078-200-1', 'SYM20782001', 2078, 54, 35, 53, 33, 56, 34, 57, 36, 55, 35, 87),
              ('SC-2078-200-2', 'SYM20782002', 2078, 55, 36, 50, 32, 58, 35, 56, 37, 59, 38, 90),
              ('SC-2078-200-3', 'SYM20782003', 2078, 53, 34, 52, 30, 54, 33, 55, 35, 57, 37, 88),
              ('SC-2078-200-4', 'SYM20782004', 2078, 54, 35, 53, 31, 56, 34, 56, 36, 58, 38, 85),
              ('SC-2078-200-5', 'SYM20782005', 2078, 55, 36, 51, 32, 57, 35, 57, 37, 59, 39, 92),
              ('SC-2078-200-6', 'SYM20782006', 2078, 52, 33, 50, 30, 54, 32, 55, 35, 56, 37, 91),
              ('SC-2078-200-7', 'SYM20782007', 2078, 54, 35, 52, 32, 56, 34, 57, 37, 58, 38, 89),
              ('SC-2078-200-8', 'SYM20782008', 2078, 55, 36, 53, 33, 58, 35, 56, 36, 59, 39, 90),
              ('SC-2078-200-9', 'SYM20782009', 2078, 52, 34, 50, 31, 54, 33, 55, 35, 56, 37, 87),
              ('SC-2078-200-10', 'SYM20782010', 2078, 54, 35, 52, 32, 56, 34, 57, 36, 58, 38, 88)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem7Result Data ...
try {
       $sql = "INSERT INTO sem7result
              (regdNo, symbolNo, examYear,
              CSIT_411_TH, CSIT_411_PR,
              CSIT_412_TH, CSIT_412_PR,
              CSIT_413_TH, CSIT_413_PR,
              CSIT_414_PR,
              CSIT_415_2_TH, CSIT_415_2_PR,
              CSIT_416_1_TH, CSIT_416_1_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20771001', 2077, 55, 35, 50, 30, 58, 35, 95, 54, 38, 56, 37),
              ('SC-2077-100-2', 'SYM20771002', 2077, 53, 34, 52, 32, 55, 33, 90, 56, 37, 58, 38),
              ('SC-2077-100-3', 'SYM20771003', 2077, 54, 36, 51, 31, 57, 35, 92, 55, 36, 59, 39),
              ('SC-2077-100-4', 'SYM20771004', 2077, 56, 35, 53, 30, 56, 34, 88, 53, 34, 57, 37),
              ('SC-2077-100-5', 'SYM20771005', 2077, 52, 33, 50, 31, 54, 32, 85, 54, 35, 56, 37),
              ('SC-2077-100-6', 'SYM20771006', 2077, 55, 35, 54, 33, 58, 36, 94, 56, 37, 59, 38),
              ('SC-2077-100-7', 'SYM20771007', 2077, 53, 34, 52, 31, 55, 33, 91, 55, 36, 58, 38),
              ('SC-2077-100-8', 'SYM20771008', 2077, 54, 35, 50, 30, 56, 34, 89, 54, 35, 57, 37),
              ('SC-2077-100-9', 'SYM20771009', 2077, 55, 36, 53, 32, 58, 35, 93, 56, 37, 59, 39),
              ('SC-2077-100-10', 'SYM20771010', 2077, 52, 34, 51, 31, 54, 33, 90, 55, 36, 56, 37)";
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}





# Code to Insert sem8Result Data ...
try {
       $sql = "INSERT INTO sem8result
              (regdNo, symbolNo, examYear,
              CSIT_421_TH, CSIT_421_PR,
              CSIT_422_PR,
              CSIT_423_2_TH, CSIT_423_2_PR,
              CSIT_424_2_TH, CSIT_424_2_PR,
              CSIT_425_3_TH, CSIT_425_3_PR)
              VALUES
              ('SC-2077-100-1', 'SYM20810001', 2077, 55, 35, 90, 54, 38, 56, 37, 50, 30),
              ('SC-2077-100-2', 'SYM20810002', 2077, 53, 34, 92, 56, 37, 58, 38, 52, 32),
              ('SC-2077-100-3', 'SYM20810003', 2077, 54, 36, 88, 55, 36, 59, 39, 51, 31),
              ('SC-2077-100-4', 'SYM20810004', 2077, 56, 35, 89, 53, 34, 57, 37, 53, 33),
              ('SC-2077-100-5', 'SYM20810005', 2077, 52, 33, 85, 54, 35, 56, 37, 54, 34),
              ('SC-2077-100-6', 'SYM20810006', 2077, 55, 35, 91, 56, 37, 59, 38, 56, 36),
              ('SC-2077-100-7', 'SYM20810007', 2077, 53, 34, 90, 55, 36, 58, 38, 55, 35),
              ('SC-2077-100-8', 'SYM20810008', 2077, 54, 35, 92, 54, 35, 57, 37, 53, 33),
              ('SC-2077-100-9', 'SYM20810009', 2077, 55, 36, 88, 56, 37, 59, 39, 52, 32),
              ('SC-2077-100-10', 'SYM20810010', 2077, 52, 34, 89, 55, 36, 56, 37, 51, 31)";
       
       $conn->query($sql);
} catch (Exception $e) {
       exit("<br><b>Error:</b>" . $e->getMessage());
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seed Data</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgb(58, 58, 58);
        }

        .container {
            background-color: #d5d4d4;
            padding: 3rem 4rem;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeInUp 0.8s ease forwards;
        }

        h1 {
            font-size: 2.5rem;
            color: #333333;
            margin-bottom: 1rem;
        }

        h3 {
            font-size: 1.3rem;
            color: #555555;
            margin-bottom: 2rem;
        }

        a {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 2rem;
            }

            h1 {
                font-size: 2rem;
            }

            h3 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Seeded Successfully!</h1>
        <h3>To Use The System...</h3>
        <a href='../../login.php'>Click Here</a>
    </div>
</body>
</html>

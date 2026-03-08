# Student Management System 🎓

**Student Management System** is a web-based academic management platform developed for educational institutions to efficiently manage student-related activities such as admissions, courses, attendance, results, fees, notices, and study materials.

The system simplifies communication and academic management between **administrators, teachers, and students** by providing dedicated dashboards for each role.

This project was developed as **Minor Project I for the 6th Semester of BSc CSIT**.

---

## Project Demo

Since the project is not deployed online, a **video demonstration is available on YouTube.**

### Watch Project Demo Video  
https://youtu.be/k1pUgNJp3Is

---

# 📌 Project Overview

The **Student Management System** is designed to help educational institutions digitally manage their academic operations.

The system is built using:

- **PHP**
- **MySQL**
- **JavaScript**
- **HTML**
- **CSS**

It follows a **modular structure** with three main user roles:

• **Admin** – Full system control  
• **Teacher** – Academic management and student interaction  
• **Student** – Access to academic information and resources

Each user role has its own dashboard and specific permissions.

---

# 🚀 Features

## 🔐 Authentication & Security

- Secure login system
- Role-based authentication
- Users cannot access the system without logging in
- Session-based access control
- Proper input validation across forms

---

# 👨‍💼 Admin Features

Admins have full control over the system and can manage all academic operations.

Admin can:

- Add, update, and delete **students**
- Add, update, and delete **teachers**
- Manage **student admission records**
- Manage **student fee records**
- Manage **courses for each semester**
- Assign **teachers to courses**
- Manage **student results**
- Send **notices to teachers and students**
- View system dashboards and academic records

---

# 👨‍🏫 Teacher Features

Teachers can manage academic activities related to students.

Teachers can:

- Take and manage **student attendance**
- Upload **study materials**
- Update or delete study materials
- View assigned **courses**
- Send **notices to students**
- Manage their profile and password

---

# 👨‍🎓 Student Features

Students can access their academic information through their dashboard.

Students can:

- View their **courses**
- See **which teacher teaches each course**
- View their **attendance records**
- View their **results**
- View **fee details**
- Download **study materials**
- View **notices from teachers and admin**
- Update their profile information
- Change their password

---

# 📱 Responsive Design

The system is designed with a **responsive interface** so it can be used on different screen sizes.

Frontend technologies used:

- HTML
- CSS
- JavaScript

---

# 🧠 Technology Stack

### Frontend

- HTML
- CSS
- JavaScript

### Backend

- PHP

### Database

- MySQL

### Development Environment

- XAMPP (Apache + MySQL)

---

# ⚙️ Running the Project Locally

Follow these steps to run the project on your local machine.

---

# 1️⃣ Install XAMPP

Download and install **XAMPP**.

Start the following services:

- Apache
- MySQL

---

# 2️⃣ Place Project in htdocs

Move the project folder into the **htdocs directory** inside XAMPP.

Example path:

```
C:/xampp/htdocs/student-management-system

```
Note: The folder name must be "student-management-system".

---

# 3️⃣ Configure Database

Open your browser and visit:

```
http://localhost/student-management-system/config/db_config.php
```

This script will automatically:

- Create the database
- Create all required tables
- Configure the system database structure with 3 default users [1 admin, 1 teacher & 1 student]

---

# 4️⃣ Access the Website

Now open the website in your browser:

```
http://localhost/student-management-system/
```

---

# 🔑 Default Login Credentials

Initially the system contains **three default users**.

### Admin Login

```
username = admin
password = 0000
```

### Teacher Login

```
username = 1000
password = 0000
```

### Student Login

```
username = student
password = 0000
```

---

# 🧪 Adding Dummy Data (Recommended for Testing)

For testing purposes, the system includes a **database seeder** to generate dummy records.

Open this URL in your browser:

```
http://localhost/student-management-system/config/Seeders/seedDatabase.php
```

This will automatically add:

- Multiple students
- Multiple teachers
- Courses
- Attendance records
- Study materials
- Other academic data

---

# 🔓 Login After Seeding

After adding dummy data, you can login using:

### Admin

```
username = admin
password = 0000
```

### Teacher

```
username = 1000
password = 0000
```

### Student

```
username = student
password = 0000
```

All users currently use the **default password:**

```
0000
```

You can find additional **student or teacher usernames from the system dashboard pages.**

---

# 🎯 Purpose of the Project

The goal of this system is to:

- Digitize academic management
- Reduce manual record keeping
- Improve communication between teachers and students
- Centralize academic information
- Provide an efficient management platform for educational institutions

---

# 📚 Academic Context

This project was developed as part of:

**Minor Project I**  
**6th Semester – BSc CSIT**  
**Far-Western University**  
**Mahendranagar, Kanchanpur, Nepal**

---

# ⭐ Support

If you find this project useful, consider giving it a ⭐ on GitHub.



---

# 📁 Project Structure

```
Student-Management-System/
    ├── config/
    │   ├── Seeders/
    │   │   ├── seedDatabase.php
    │   ├── absolutepath.php
    │   ├── db_config.php
    │   ├── db_connect.php
    ├── Public/
    │   ├── assets/
    │   │   ├── images/
    │   │   │   ├── demoNebResult.png
    │   │   │   ├── DemoNotice.png
    │   │   │   ├── demoSeeResult.png
    │   │   │   ├── demoVoucher.png
    │   │   │   ├── fwu-logo.jpg
    │   │   │   ├── hambuger.png
    │   │   │   ├── hat.png
    │   │   │   ├── image.jpg
    │   │   │   ├── notice.jpeg
    │   │   │   ├── result.png
    │   │   │   ├── student.png
    │   ├── CSS/
    │   │   ├── loginstyle.css
    │   │   ├── mediaqueries.css
    │   │   ├── style.css
    │   │   ├── utilityClasses.css
    │   ├── JS/
    │   │   ├── script.js
    ├── src/
    │   ├── admin/
    │   │   ├── processes/
    │   │   │   ├── addAdmission.php
    │   │   │   ├── connection.php
    │   │   │   ├── coursesProcess.php
    │   │   │   ├── index.php
    │   │   │   ├── noticeProcess.php
    │   │   │   ├── resetPassword.php
    │   │   │   ├── resultProcess.php
    │   │   │   ├── semester.php
    │   │   │   ├── studentProcess.php
    │   │   │   ├── teacherProcess.php
    │   │   │   ├── updateAdminInfo.php
    │   │   │   ├── updatePassword.php
    │   │   ├── courses.php
    │   │   ├── dashboard.php
    │   │   ├── index.php
    │   │   ├── notices.php
    │   │   ├── result.php
    │   │   ├── semesters.php
    │   │   ├── students.php
    │   │   ├── teachers.php
    │   ├── includes/
    │   │   ├── footer.php
    │   │   ├── forbidden_page.php
    │   │   ├── functions.php
    │   │   ├── header.php
    │   │   ├── index.php
    │   │   ├── show_message.php
    │   │   ├── showNonRunningSemester.php
    │   │   ├── showRunningSemester.php
    │   │   ├── showSemester.php
    │   │   ├── showTeacher.php
    │   ├── student/
    │   │   ├── processes/
    │   │   │   ├── connection.php
    │   │   │   ├── index.php
    │   │   │   ├── updatePassword.php
    │   │   │   ├── updateStudentInfo.php
    │   │   ├── courses.php
    │   │   ├── dashboard.php
    │   │   ├── index.php
    │   │   ├── notices.php
    │   │   ├── result.php
    │   │   ├── study-materials.php
    │   │   ├── view-fees.php
    │   ├── teacher/
    │   │   ├── processes/
    │   │   │   ├── attendanceProcess.php
    │   │   │   ├── connection.php
    │   │   │   ├── studyMaterialProcess.php
    │   │   │   ├── updatePassword.php
    │   │   │   └── updateTeacherInfo.php
    │   │   ├── attendance.php
    │   │   ├── courses.php
    │   │   ├── dashboard.php
    │   │   ├── index.php
    │   │   ├── notices.php
    │   │   ├── study-materials.php
    │   ├── index.php
    ├── uploads/
    │   ├── StudyMaterials/
    │   │   └── index.php
    │   └── index.php
    ├── index.php
    ├── login.php
    ├── loginProcess.php
    └── usernamesPasswords.txt


```
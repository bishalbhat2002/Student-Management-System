// JS code to indicate active page START here
document.addEventListener("DOMContentLoaded", () => {
       const links = document.querySelectorAll("nav a");
       const currentUrl = window.location.href.split('?');
       links.forEach(link => {
           if (link.href === currentUrl[0]) {
               link.classList.add("active");
           }
       });
   });
// JS code to indicate active page END here


// JS code for hambuger Menu Slider START here
function menuToggle(){       
       const navBar = document.querySelector('nav');
       const body = document.body;
       const mainContent = document.querySelector('.main');

       navBar.classList.toggle('disabled');
       body.classList.toggle('allfit');
       if(innerWidth <= 600)
              mainContent.classList.toggle('main-disable');
}

const hambuger = document.getElementById('hambuger-icon');
hambuger.addEventListener('click', menuToggle);      

if(innerWidth <= 575){       
       const navLinks = document.querySelectorAll('nav a');
       navLinks.forEach(element => {
              element.addEventListener('click', menuToggle);       
       }); 
}
// JS code for hambuger Menu Slider END here


// Code to download Result as PDF START here 
function downloadResultPDF() {
    const result = document.getElementById("result");
    if (result) {
        html2pdf().from(result).save("Result.pdf");
    }       
}
// Code to download Result as PDF END here



// UpdatePassword Form Validation Code Start 
function validatePasswordChange(){
    // Get form input values
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmNewPassword = document.getElementById('confirmNewPassword').value;
    
    // Get error display elements
    const currentPasswordError = document.getElementById('currentPasswordError');
    const newPasswordError = document.getElementById('newPasswordError');
    const confirmNewPasswordError = document.getElementById('confirmNewPasswordError');

    // Reset error messages
    currentPasswordError.textContent = "";
    newPasswordError.textContent = "";
    confirmNewPasswordError.textContent = "";

    // Validate current password field
    if (!currentPassword) {
        currentPasswordError.textContent = "Current password field is required.";
        return false;
    }

    // Validate new password field
    if (!newPassword) {
        newPasswordError.textContent = "New password field is required.";
        return false;
    }

    // Validate confirm new password field
    if (!confirmNewPassword) {
        confirmNewPasswordError.textContent = "Confirm new password field is required.";
        return false;
    }

    // Check new password length
    if (newPassword.length < 8) {
        newPasswordError.textContent = "New password must be at least 8 characters long.";
        return false;
    }

    // Ensure new password is not the same as the current password
    if (currentPassword === newPassword) {
        newPasswordError.textContent = "New password must be different from current password.";
        return false;
    }

    // Check if new password and confirmation match
    if (newPassword !== confirmNewPassword) {
        confirmNewPasswordError.textContent = "New passwords do not match.";
        return false;
    }
    return true;
}
// UpdatePassword Form Validation Code End



// UpdateAdmin Info Form Validation Code Start
function validateAdminInfo() {
    let isValid = true; // Assume valid until a check fails

    // Get error display elements (assumed to exist)
    const usernameError = document.getElementById('usernameError');
    const nameError = document.getElementById('nameError');
    const dobError = document.getElementById('dobError');
    const genderError = document.getElementById('genderError');
    const facultyError = document.getElementById('facultyError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const addressError = document.getElementById('addressError');
    const photoError = document.getElementById('photoError');

    // Reset error messages
    usernameError.textContent = "";
    nameError.textContent = "";
    dobError.textContent = "";
    genderError.textContent = "";
    facultyError.textContent = "";
    phoneError.textContent = "";
    emailError.textContent = "";
    addressError.textContent = "";
    photoError.textContent = "";

    // Get field values (trim to remove extra spaces)
    const username = document.getElementById('username').value.trim();
    const name = document.getElementById('name').value.trim();
    const dob = document.getElementById('dob').value;
    // For gender, assuming a radio button group; check if one is selected.
    const gender = document.querySelector('input[name="gender"]:checked');
    const faculty = document.getElementById('faculty').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('address').value.trim();

    // Check required fields without checking for error element existence
    if (!username) {
        usernameError.textContent = "Username is required.";
        isValid = false;
    }
    if (!name) {
        nameError.textContent = "Name is required.";
        isValid = false;
    }
    if (!dob) {
        dobError.textContent = "DOB is required.";
        isValid = false;
    }
    if (!gender) {
        genderError.textContent = "Gender is required.";
        isValid = false;
    }    
    if (!faculty) {
        facultyError.textContent = "Faculty is required.";
        isValid = false;
    }
    if (!phone) {
        phoneError.textContent = "Mobile number is required.";
        isValid = false;
    } 
    if (!email) {
        emailError.textContent = "Email is required.";
        isValid = false;
    }
    if (!address) {
        addressError.textContent = "Address is required.";
        isValid = false;
    }

    // Validate mobile number: allow only digits and require between 10 and 15 digits
    const phoneRegex = /^\d{10,15}$/;
    if (phone && !phoneRegex.test(phone)) {
        phoneError.textContent = "Please enter a valid mobile number (10 to 15 digits).";
        isValid = false;
    }

    // Validate email format using a simple regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    // Validate photo file if a file is selected
    const photoInput = document.getElementById('photo');
    if (photoInput && photoInput.files.length > 0) {
        const file = photoInput.files[0];
        // Allowed MIME types
        const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!allowedTypes.includes(file.type)) {
            photoError.textContent = "Only JPEG, PNG, or JPG file formats are allowed.";
            isValid = false;
        }
        // Check file size: 2MB max
        const maxSizeInBytes = 2 * 1024 * 1024;
        if (file.size > maxSizeInBytes) {
            photoError.textContent = "File size must be less than 2MB.";
            isValid = false;
        }
    }
    return isValid;
}
document.addEventListener("DOMContentLoaded", () => {
    const adminInfoForm = document.getElementById('adminInfoUpdateForm');
    if (adminInfoForm){
         adminInfoForm.addEventListener("submit", function(event) {
             if (!validateAdminInfo()) {
                 event.preventDefault();
             }
         });
    }
});

// UpdateAdmin Info Form Validation Code End


// UpdateTeacher Info Form Validation Code Start
function validateTeacherInfo() {
    let isValid = true; // Assume valid until a check fails

    // Get error display elements
    const nameError = document.getElementById('nameError');
    const dobError = document.getElementById('dobError');
    const genderError = document.getElementById('genderError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const academicQualificationError = document.getElementById('academicQualificationError');
    const addressError = document.getElementById('addressError');
    const photoError = document.getElementById('photoError');

    // Reset error messages
    nameError.textContent = "";
    dobError.textContent = "";
    genderError.textContent = "";
    phoneError.textContent = "";
    emailError.textContent = "";
    academicQualificationError.textContent = "";
    addressError.textContent = "";
    photoError.textContent = "";

    // Get field values 
    const name = document.getElementById('name').value.trim();
    const dob = document.getElementById('dob').value;
    const genderElem = document.querySelector('input[name="gender"]:checked');
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const academicQualification = document.getElementById('academicQualification').value.trim();
    const address = document.getElementById('address').value.trim();
    
    // Validate required fields
    if (!name) {
        nameError.textContent = "Name is required.";
        isValid = false;
    }
    if (!dob) {
        dobError.textContent = "DOB is required.";
        isValid = false;
    }
    if (!genderElem) {
        genderError.textContent = "Gender is required.";
        isValid = false;
    }
    if (!phone) {
        phoneError.textContent = "Phone is required.";
        isValid = false;
    }
    if (!email) {
        emailError.textContent = "Email is required.";
        isValid = false;
    }
    if (!academicQualification) {
        academicQualificationError.textContent = "Academic Qualifications are required.";
        isValid = false;
    }
    if (!address) {
        addressError.textContent = "Address is required.";
        isValid = false;
    }

    // Validate mobile number: allow only digits and require between 10 and 15 digits.
    const phoneRegex = /^\d{10,15}$/;
    if (phone && !phoneRegex.test(phone)) {
        phoneError.textContent = "Please enter a valid phone number (10 to 15 digits).";
        isValid = false;
    }

    // Validate email format using a simple regex.
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    // Validate photo file if one is selected.
    const photoInput = document.getElementById('photo');
    if (photoInput && photoInput.files.length > 0) {
        const file = photoInput.files[0];
        // Allowed MIME types
        const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!allowedTypes.includes(file.type)) {
            photoError.textContent = "Only JPEG, PNG, or JPG file formats are allowed.";
            isValid = false;
        }
        // Check file size: 2MB maximum.
        const maxSizeInBytes = 2 * 1024 * 1024;
        if (file.size > maxSizeInBytes) {
            photoError.textContent = "File size must be less than 2MB.";
            isValid = false;
        }
    }   
    return isValid;
}
document.addEventListener("DOMContentLoaded", () => {
    const teacherForm = document.getElementById('updateTeacherForm');
    if (teacherForm){
         teacherForm.addEventListener("submit", function(event) {
             if (!validateTeacherInfo()) {
                 event.preventDefault();
             }
         });
    }
});
// UpdateTeacher Info Form Validation Code End



// UpdateStudent Info Form Validation Code Start
function validateStudentInfo() {
    let isValid = true; // Assume the form is valid

    // Get error display elements
    const nameError = document.getElementById('nameError');
    const dobError = document.getElementById('dobError');
    const genderError = document.getElementById('genderError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const addressError = document.getElementById('addressError');
    const parentNameError = document.getElementById('parentNameError');
    const parentPhoneError = document.getElementById('parentPhoneError');
    const photoError = document.getElementById('photoError');
    const seeResultError = document.getElementById('seeResultError');
    const nebResultError = document.getElementById('nebResultError');

    // Reset error messages
    nameError.textContent = "";
    dobError.textContent = "";
    genderError.textContent = "";
    phoneError.textContent = "";
    emailError.textContent = "";
    addressError.textContent = "";
    parentNameError.textContent = "";
    parentPhoneError.textContent = "";
    photoError.textContent = "";
    seeResultError.textContent = "";
    nebResultError.textContent = "";

    // Get field values directly (all elements are assumed to exist)
    const name = document.getElementById('name').value.trim();
    const dob = document.getElementById('dob').value;
    // For gender, check if one is selected in the radio group
    const genderElem = document.querySelector('input[name="gender"]:checked');
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('address').value.trim();
    const parentName = document.getElementById('parentName').value.trim();
    const parentPhone = document.getElementById('parentPhone').value.trim();

    // Get file inputs
    const photoInput = document.getElementById('photo');
    const seeResultInput = document.getElementById('seeResult');
    const nebResultInput = document.getElementById('nebResult');

    // Validate required text fields
    if (!name) {
        nameError.textContent = "Name is required.";
        isValid = false;
    }
    if (!dob) {
        dobError.textContent = "DOB is required.";
        isValid = false;
    }
    if (!genderElem) {
        genderError.textContent = "Gender is required.";
        isValid = false;
    }
    if (!phone) {
        phoneError.textContent = "Phone is required.";
        isValid = false;
    }
    if (!email) {
        emailError.textContent = "Email is required.";
        isValid = false;
    }
    if (!address) {
        addressError.textContent = "Address is required.";
        isValid = false;
    }
    if (!parentName) {
        parentNameError.textContent = "Parent Name is required.";
        isValid = false;
    }
    if (!parentPhone) {
        parentPhoneError.textContent = "Parent Phone is required.";
        isValid = false;
    }   

    // Validate phone number format (allow only digits, 10 to 15 characters)
    const phoneRegex = /^\d{10,15}$/;
    if (phone && !phoneRegex.test(phone)) {
        phoneError.textContent = "Enter a valid phone number (10 to 15 digits).";
        isValid = false;
    }
    if (parentPhone && !phoneRegex.test(parentPhone)) {
        parentPhoneError.textContent = "Enter a valid parent phone number (10 to 15 digits).";
        isValid = false;
    }

    // Validate email format using a simple regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailRegex.test(email)) {
        emailError.textContent = "Enter a valid email address.";
        isValid = false;
    }

    // Validate file inputs if a file is selected
    const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
    const maxSize = 2 * 1024 * 1024; // 2MB

    if (photoInput && photoInput.files.length > 0) {
        const file = photoInput.files[0];
        if (!allowedTypes.includes(file.type)) {
            photoError.textContent = "Only JPEG, PNG, or JPG formats are allowed.";
            isValid = false;
        }
        if (file.size > maxSize) {
            photoError.textContent = "Photo file size must be less than 2MB.";
            isValid = false;
        }
    }

    if (seeResultInput && seeResultInput.files.length > 0) {
        const file = seeResultInput.files[0];
        if (!allowedTypes.includes(file.type)) {
            seeResultError.textContent = "Only JPEG, PNG, or JPG formats are allowed.";
            isValid = false;
        }
        if (file.size > maxSize) {
            seeResultError.textContent = "SEE Result file size must be less than 2MB.";
            isValid = false;
        }
    }

    if (nebResultInput && nebResultInput.files.length > 0) {
        const file = nebResultInput.files[0];
        if (!allowedTypes.includes(file.type)) {
            nebResultError.textContent = "Only JPEG, PNG, or JPG formats are allowed.";
            isValid = false;
        }
        if (file.size > maxSize) {
            nebResultError.textContent = "NEB Result file size must be less than 2MB.";
            isValid = false;
        }
    }

    return isValid;
}

document.addEventListener("DOMContentLoaded", () => {
    const studentForm = document.getElementById("studentValidateForm");
    if (studentForm) {
         studentForm.addEventListener("submit", function(event) {
             if (!validateStudentInfo()) {
                 event.preventDefault();
             }
         });
    }
});
// UpdateStudent Info Form Validation Code End








// Attach event listener to the form when the DO
const form = document.getElementById("updatePasswordForm");
form.addEventListener("submit", (event)=>{
    // If validation fails, prevent form submission
    if (!validatePasswordChange()) {
        event.preventDefault();
    }
});

// Code to Validate Forms END here












































































// Code to confirm Attendance Form SUbmit START here
function attendanceSubmitConfirm(){
       return confirm("Are You sure, You want to Submit Attendance Form? Editing Attendance Is not Allowed after Submit..");
}
// Code to confirm Attendance Form SUbmit END here


// Code to confirm Delete START here
function confirmDelete(id='1001'){
      return confirm(`Are you sure, You Want to delete Record with id : ${id}`);
}
// Code to confirm Delete END here

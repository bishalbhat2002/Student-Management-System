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
// Attach event listener to the form 
const updatePasswordForm = document.getElementById("updatePasswordForm");
if(updatePasswordForm){
    updatePasswordForm.addEventListener("submit", (event)=>{
        // If validation fails, prevent form submission
        if (!validatePasswordChange()) {
            event.preventDefault();
        }
    });
}

// UpdatePassword Form Validation Code End



// UpdateAdmin Info Form Validation Code Start
function validateAdminInfo() {
    let isValid = true; // Assume valid until a check fails

    // Get error display elements (assumed to exist)
    const aidError = document.getElementById('aidError');
    const nameError = document.getElementById('nameError');
    const dobError = document.getElementById('dobError');
    const genderError = document.getElementById('genderError');
    const facultyError = document.getElementById('facultyError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const addressError = document.getElementById('addressError');
    const photoError = document.getElementById('photoError');

    // Reset error messages
    aidError.textContent = "";
    nameError.textContent = "";
    dobError.textContent = "";
    genderError.textContent = "";
    facultyError.textContent = "";
    phoneError.textContent = "";
    emailError.textContent = "";
    addressError.textContent = "";
    photoError.textContent = "";

    // Get field values (trim to remove extra spaces)
    const aid = document.getElementById('aid').value.trim();
    const name = document.getElementById('name').value.trim();
    const dob = document.getElementById('dob').value;
    // For gender, assuming a radio button group; check if one is selected.
    const gender = document.querySelector('input[name="gender"]:checked');
    const faculty = document.getElementById('faculty').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('address').value.trim();

    // Check required fields without checking for error element existence
    if (!aid) {
        aidError.textContent = "Username is required.";
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
    // Check file size: 2MB max
    const maxSizeInBytes = 2 * 1024 * 1024;
    
    if (photoInput && photoInput.files.length > 0) {
        const file = photoInput.files[0];
        // Allowed MIME types
        const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

        if (!allowedTypes.includes(file.type)) {
            photoError.textContent = "Only JPEG, PNG, or JPG file formats are allowed.";
            isValid = false;
        }else if (file.size > maxSizeInBytes) {
            photoError.textContent = "File size must be less than 2MB.";
            isValid = false;
        }
    }
    return isValid;
}

const updateAdminForm = document.getElementById('updateAdminForm');
if (updateAdminForm){
    updateAdminForm.addEventListener("submit", function(event) {
        if (!validateAdminInfo()) {
            event.preventDefault();
            }
    });
}

// UpdateAdmin Info Form Validation Code End


// UpdateTeacher Info Form Validation Code Start
function validateTeacherInfo() {
    let isValid = true; // Assume valid until a check fails

    // Get error display elements
    const nameError = document.getElementById('nameError');
    const dobError = document.getElementById('dobError');
    const genderError = document.getElementById('genderError');
    const facultyError = document.getElementById('facultyError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const academicQualificationError = document.getElementById('academicQualificationError');
    const addressError = document.getElementById('addressError');
    const photoError = document.getElementById('photoError');

    // Reset error messages
    nameError.textContent = "";
    dobError.textContent = "";
    genderError.textContent = "";
    facultyError.textContent = "";
    phoneError.textContent = "";
    emailError.textContent = "";
    academicQualificationError.textContent = "";
    addressError.textContent = "";
    photoError.textContent = "";

    // Get field values 
    const name = document.getElementById('name').value.trim();
    const dob = document.getElementById('dob').value;
    const genderElem = document.querySelector('input[name="gender"]:checked');
    const faculty = document.getElementById('faculty').value.trim();
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
    if (!faculty) {
        facultyError.textContent = "Faculty is required.";
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
    // Check file size: 2MB maximum.
    const maxSizeInBytes = 2 * 1024 * 1024;

    if (photoInput && photoInput.files.length > 0) {
        const file = photoInput.files[0];
        // Allowed MIME types
        const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
        if (!allowedTypes.includes(file.type)) {
            photoError.textContent = "Only JPEG, PNG, or JPG file formats are allowed.";
            isValid = false;
        }else if (file.size > maxSizeInBytes) {
            photoError.textContent = "File size must be less than 2MB.";
            isValid = false;
        }
    }   
    return isValid;
}
const updateTeacherForm = document.getElementById('updateTeacherForm');
if (updateTeacherForm){
    updateTeacherForm.addEventListener("submit", function(event) {
    if (!validateTeacherInfo()) {
        event.preventDefault();
    }
    });
}
const addTeacherForm = document.getElementById('addTeacherForm');
if (addTeacherForm){
    addTeacherForm.addEventListener("submit", function(event) {
    if (!validateTeacherInfo()) {
        event.preventDefault();
    }
    });
}
// UpdateTeacher Info Form Validation Code End



// UpdateStudent Info Form Validation Code Start
function validateStudentInfo() {
    let isValid = true; // Assume the form is valid

    // Get error display elements
    const batchError = document.getElementById('batchError');
    const nameError = document.getElementById('nameError');
    const facultyError = document.getElementById('facultyError');
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
    batchError.textContent = "";
    nameError.textContent = "";
    if(facultyError){
        facultyError.textContent = "";
    }
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
    const batch = document.getElementById('batch').value.trim();
    const faculty = document.getElementById('faculty').value.trim();
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
    if (!batch) {
        batchError.textContent = "Batch is required.";
        isValid = false;
    }    
    if (!name) {
        nameError.textContent = "Name is required.";
        isValid = false;
    }     
    if (!faculty) {
        facultyError.textContent = "faculty is required.";
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
        } else if (file.size > maxSize) {
            photoError.textContent = "Photo file size must be less than 2MB.";
            isValid = false;
        }
    }

    const resultAllowedTypes = ["image/jpeg", "image/png", "image/jpg", "application/pdf"];

    if (seeResultInput && seeResultInput.files.length > 0) {
        const file = seeResultInput.files[0];
        if (!resultAllowedTypes.includes(file.type)) {
            seeResultError.textContent = "Only JPEG, PNG, JPG, or PDF formats are allowed.";
            isValid = false;
        }else if (file.size > maxSize) {
            seeResultError.textContent = "SEE Result file size must be less than 2MB.";
            isValid = false;
        }
    }

    if (nebResultInput && nebResultInput.files.length > 0) {
        const file = nebResultInput.files[0];
        if (!resultAllowedTypes.includes(file.type)) {
            nebResultError.textContent = "Only JPEG, PNG, or JPG formats are allowed.";
            isValid = false;
        }else if (file.size > maxSize) {
            nebResultError.textContent = "NEB Result file size must be less than 2MB.";
            isValid = false;
        }
    }

    return isValid;
}
const updateStudentForm = document.getElementById("updateStudentForm");
if (updateStudentForm) {
    updateStudentForm.addEventListener("submit", function(event) {
    if (!validateStudentInfo()) {
        event.preventDefault();
    }
    });
}

function validateResults() {
    let isValid = true;
    
    // Get file input elements and error display elements
    const seeResultInput = document.getElementById("seeResult");
    const nebResultInput = document.getElementById("nebResult");
    const seeResultError = document.getElementById("seeResultError");
    const nebResultError = document.getElementById("nebResultError");
    
    // Reset error messages
    seeResultError.textContent = "";
    nebResultError.textContent = "";
    
    // Validate SEE Result: required field
    if (!seeResultInput || seeResultInput.files.length === 0) {
        seeResultError.textContent = "SEE Result is required.";
        isValid = false;
    }
    
    // Validate NEB Result: required field
    if (!nebResultInput || nebResultInput.files.length === 0) {
        nebResultError.textContent = "NEB Result is required.";
        isValid = false;
    }
    
    return isValid;
}

const addStudentForm = document.getElementById("addStudentForm");
if (addStudentForm) {
    addStudentForm.addEventListener("submit", function(event) {
        if (!validateStudentInfo() || !validateResults()) {
            event.preventDefault();
        }
    });
}

// UpdateStudent Info Form Validation Code End
function validateStudyMaterialForm() {
    let isValid = true;

    // Get field values
    const subject = document.getElementById("subject").value;
    const message = document.getElementById("Message").value.trim();
    const fileInput = document.getElementById("file");

    // Get error display elements
    const subjectError = document.getElementById("subjectError");
    const messageError = document.getElementById("messageError");
    const fileError = document.getElementById("fileError");

    // Reset error messages
    subjectError.textContent = "";
    messageError.textContent = "";
    fileError.textContent = "";

    // Check required field: subject
    if (!subject) {
        subjectError.textContent = "Subject is required.";
        isValid = false;
    }

    // Check required field: message and its max length
    if (!message) {
        messageError.textContent = "Message is required.";
        isValid = false;
    } else if (message.length > 3000) {
        messageError.textContent = "Message must not exceed 3000 characters.";
        isValid = false;
    }

    // Check required field: file
    if (!fileInput || fileInput.files.length === 0) {
        fileError.textContent = "File is required.";
        isValid = false;
    } else {
        const file = fileInput.files[0];
        // Allowed MIME types: Word, Excel, Image (JPEG, PNG), PDF
        const allowedTypes = [
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "image/jpeg",
            "image/png",
            "application/pdf"
        ];
        const maxSizeInBytes = 20 * 1024 * 1024;    // 20MB
        if (!allowedTypes.includes(file.type)) {
            fileError.textContent = "File must be a Word, Excel, Image, or PDF document.";
            isValid = false;
        } else if (file.size > maxSizeInBytes) {
            fileError.textContent = "File size must be less than 20MB.";
            isValid = false;
        }
    }

    return isValid;
}
const studyMaterialForm = document.getElementById("studyMaterialForm"); 
if (studyMaterialForm) {
    studyMaterialForm.addEventListener("submit", (event) => {
        if (!validateStudyMaterialForm()) {
            event.preventDefault();
        }
    });
}
// Study Material Form Validation Code Start

// Update Study Material Validation Code Start
function validateUpdateStudyMaterialForm() {
    let isValid = true;

    // Get field values
    const subject = document.getElementById("subject").value;
    const message = document.getElementById("Message").value.trim();
    const fileInput = document.getElementById("file");

    // Get error display elements
    const subjectError = document.getElementById("subjectError");
    const messageError = document.getElementById("messageError");
    const fileError = document.getElementById("fileError");

    // Reset error messages
    subjectError.textContent = "";
    messageError.textContent = "";
    fileError.textContent = "";

    // Check required field: subject
    if (!subject) {
        subjectError.textContent = "Subject is required.";
        isValid = false;
    }

    // Check required field: message and its max length
    if (!message) {
        messageError.textContent = "Message is required.";
        isValid = false;
    } else if (message.length > 3000) {
        messageError.textContent = "Message must not exceed 3000 characters.";
        isValid = false;
    }

    // Check required field: file
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        // Allowed MIME types: Word, Excel, Image (JPEG, PNG), PDF
        const allowedTypes = [
            "application/msword",
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "image/jpeg",
            "image/png",
            "application/pdf"
        ];
        const maxSizeInBytes = 20 * 1024 * 1024;     // 20MB
        if (!allowedTypes.includes(file.type)) {
            fileError.textContent = "File must be a Word, Excel, Image, or PDF document.";
            isValid = false;
        } else if (file.size > maxSizeInBytes) {
            fileError.textContent = "File size must be less than 20MB.";
            isValid = false;
        }
    }
    return isValid;
}
const updateStudyMaterialForm = document.getElementById("updateStudyMaterialForm"); 
if (updateStudyMaterialForm) {
    updateStudyMaterialForm.addEventListener("submit", (event) => {
        if (!validateUpdateStudyMaterialForm()) {
            event.preventDefault();
        }
    });
}
// Update Study Material Validation Code Start

// Study Material Form Validation Code End




// Notice Form Validation Code Start
function validateNoticeForm() {
    let isValid = true;
    
    // Get field values
    const title = document.getElementById("title").value.trim();
    const noticeBodyElement = document.getElementById("noticeBody");
    const noticeBody = noticeBodyElement ? noticeBodyElement.value.trim(): "";
    const noticePhotoInput = document.getElementById("noticePhoto");
    
    // Get error display elements
    const titleError = document.getElementById("titleError");
    const noticeBodyError = document.getElementById("noticeBodyError");
    const noticePhotoError = document.getElementById("noticePhotoError");
    
    // Reset error messages
    titleError.textContent = "";
    noticeBodyError.textContent = "";
    noticePhotoError.textContent = "";
    
    // Validate title: required
    if (!title) {
        titleError.textContent = "Title is required.";
        isValid = false;
    }
    
    // Check that at least one of notice body or notice photo is provided
    const photoProvided = (noticePhotoInput.files && noticePhotoInput.files.length > 0);
    if (!noticeBody && !photoProvided) {
        noticeBodyError.textContent = "Please provide either a Notice Body or upload Photo.";
        noticePhotoError.textContent = "Please provide either a Notice Photo or Notice Body.";
        isValid = false;
    }
    if (noticeBody.length > 3000) {
        noticeBodyError.textContent = "Notice Body must not exceed 3000 characters.";
        isValid = false;
    }
    
    // If a photo is provided then validate its type and size
    if (photoProvided) {
        const file = noticePhotoInput.files[0];
        // Allowed file types: PDF, JPEG, or PNG
        const allowedTypes = ["application/pdf", "image/jpeg", "image/png"];
        const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
        if (!allowedTypes.includes(file.type)) {
            noticePhotoError.textContent = "Notice Photo must be a PDF, JPEG, or PNG file.";
            isValid = false;
        } else if (file.size > maxSizeInBytes) {
            noticePhotoError.textContent = "Notice Photo file size must be less than 2MB.";
            isValid = false;
        }
    }
    
    return isValid;
}

const noticeFormTeacher = document.getElementById('addTeacherNotice');
if (noticeFormTeacher) {
    noticeFormTeacher.addEventListener("submit", function(event) {
        if (!validateNoticeForm()) {
            event.preventDefault();
        }
    });
}
const noticeFormStudent = document.getElementById('addStudentNotice');
if (noticeFormStudent) {
    noticeFormStudent.addEventListener("submit", function(event) {
        if (!validateNoticeForm()) {
            event.preventDefault();
        }
    });
}
// Notice Form Validation Code End
 


// Add Admission Form Validation Code Start
function validateAdmissionForm() {
    let isValid = true;
    
    // Get field values
    const semester = document.getElementById("semester").value;
    const amountValue = document.getElementById("amount").value.trim();
    const voucherPhotoInput = document.getElementById("voucherPhoto");
    
    // Get error display elements
    const semesterError = document.getElementById("semesterError");
    const amountError = document.getElementById("amountError");
    const voucherError = document.getElementById("voucherError");
    
    // Reset error messages
    semesterError.textContent = "";
    amountError.textContent = "";
    voucherError.textContent = "";
    
    // Validate semester: must be selected
    if (!semester) {
        semesterError.textContent = "Please select a Semester.";
        isValid = false;
    }
    
    // Validate amount: must be provided and greater than 0
    const amount = Number(amountValue);
    if (!amountValue || isNaN(amount) || amount <= 0) {
        amountError.textContent = "Enter a valid amount greater than 0.";
        isValid = false;
    }
    
    // Validate voucher: required, must be PDF or JPEG/PNG and less than or equal to 2MB
    if (!voucherPhotoInput.files || voucherPhotoInput.files.length === 0) {
        voucherError.textContent = "Voucher photo is required.";
        isValid = false;
    } else {
        const file = voucherPhotoInput.files[0];
        const allowedTypes = ["application/pdf", "image/jpeg", "image/png"];
        const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
        
        if (!allowedTypes.includes(file.type)) {
            voucherError.textContent = "Voucher must be a PDF, JPEG, or PNG file.";
            isValid = false;
        } else if (file.size > maxSizeInBytes) {
            voucherError.textContent = "Voucher file size must be 2MB or less.";
            isValid = false;
        }
    }
    
    return isValid;
}

const addAdmissionForm = document.getElementById("addAdmissionForm");
if (addAdmissionForm) {
    addAdmissionForm.addEventListener("submit", (event) => {
        if (!validateAdmissionForm()) {
            event.preventDefault();
        }
    });
}

// Add Admission Form Validation Code End














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

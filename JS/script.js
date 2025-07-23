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

<<<<<<< HEAD
=======

>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
if(innerWidth <= 575){       
       const navLinks = document.querySelectorAll('nav a');
       navLinks.forEach(element => {
              element.addEventListener('click', menuToggle);       
       }); 
}
<<<<<<< HEAD
=======

>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
// JS code for hambuger Menu Slider END here


// Code to download Result as PDF START here 
<<<<<<< HEAD
function downloadResultPDF() {
    const result = document.getElementById("result");
    if (result) {
        html2pdf().from(result).save("Result.pdf");
    }       
=======
function downloadPDF() {
       const result = document.querySelector(".result"); // change to your result class
       html2pdf().from(result).save('result.pdf');
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
}
// Code to download Result as PDF END here


<<<<<<< HEAD
=======

>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
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
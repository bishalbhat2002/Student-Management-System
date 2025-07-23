<?php
<<<<<<< HEAD
require_once "../../includes/show_message.php";
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../../js/script.js"></script>
<script>
       window.onload = function hide() {
              const error = document.getElementById('error-message'); // Fetches Error Element
              const success = document.getElementById('success-message'); // Fetches Success Element
              if (error) {
                     setTimeout(() => { // Hides Error Element after 3 Seconds
                            error.style.display = "none";
                     }, 3000);
              }
              if (success) {
                     setTimeout(() => { // Hides Success Element after 3 Seconds
                            success.style.display = "none";
                     }, 3000);
              }

       }
</script>

=======
       if(isset($_GET['error'])){
              echo "<div id='error' class='position-bottom'>Error: {$_GET['error']}</div>";
       }
?>
<?php
       if(isset($_GET['success'])){
              echo "<div id='success' class='position-bottom'>Success: {$_GET['success']}</div>";
       }
?>
</body>
<script src="../../js/script.js"></script>
<script>
       // JS code to Show Errors
       window.onload = function hide(){
       let errorElement =  document.getElementById('error');
              if(errorElement){
                     setTimeout(()=>{
                            errorElement.classList.add('hide');
                     }, 3000);
              }       
       
       let successElement =  document.getElementById('success');
              
              if(successElement){
                     setTimeout(()=>{
                            successElement.classList.add('hide');
                     }, 3000);
              }
       }

</script>
>>>>>>> b3f5f87acc16104466d1bde0405f7c746e780acb
</html>
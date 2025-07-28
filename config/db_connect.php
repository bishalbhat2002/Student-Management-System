<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "sms";

       #Connecting with MySQL
       try{
              $conn = new mysqli($servername, $username, $password, $dbname);
       }catch(Exception $e){
              die("<b>Database connection Failed: </b>".$e->getMessage());
       }

?>
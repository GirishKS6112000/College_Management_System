<?php
   session_start();
   
   if(session_destroy()) {
        header("Location: http://localhost/SAMS/SRMS/login.php");
        echo '<script language="javascript">';
        echo 'alert("Logout successful")';
        echo '</script>';

   }
?>
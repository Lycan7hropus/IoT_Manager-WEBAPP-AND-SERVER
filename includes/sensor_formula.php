<?php 
    session_start();
    $_SESSION['sensor_name'] = $_POST['mysubmitbutton'];


    header('Location: ../readings_page.php');
    

?>
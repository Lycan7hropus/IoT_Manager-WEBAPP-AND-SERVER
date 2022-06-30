<?php 
    session_start();
    $_SESSION['sensor_name'] = $_POST['mysubmitbutton'];

    if($_SESSION['sensor_name'] == "new_sensor"){
        header('Location: ../add_sensor.php');
    }else{
        header('Location: ../readings_page.php');
    }

?>
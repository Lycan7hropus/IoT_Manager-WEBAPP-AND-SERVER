<?php


$q = $_GET['q'];

$sensor_to_delte_id = 0;


session_start();
include("../../config/dbconfig.php");

$sql =  "SELECT sensor_id FROM sensors WHERE sensor_name='$q';";

if ($sqlResult = $conn->query($sql)) {
    $rows = $sqlResult->num_rows;
    if ($rows > 0) {
        $wiersz = mysqli_fetch_assoc($sqlResult);
    
        

        $sensor_to_delte_id = $wiersz['sensor_id'];
        echo $sensor_to_delte_id;


        $sqlResult->free();
    } else {
        echo "0 wierszy";
            
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   
}

$sql =  "DELETE FROM sensors WHERE sensor_name='$q';";

if ($sqlResult = $conn->query($sql)) {
    echo "usunieto z sensorow
     ";
    
} else {
    echo "Error: " . $sql . " " . $conn->error;
    
}

$sql = "DROP TABLE `$sensor_to_delte_id`";
if ($sqlResult = $conn->query($sql)) {
    echo "usunieto tebele
     ";
    
} else {
    echo "Error: " . $sql . " " . $conn->error;
}



exit();

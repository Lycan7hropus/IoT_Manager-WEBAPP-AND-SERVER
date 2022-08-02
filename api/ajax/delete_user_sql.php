<?php


$q = $_GET['q'];
$user_login = $_GET['user_login'];


$sensor_to_delte_id = 0;
$is_user_a_owner = 0;


session_start();
include("../../config/dbconfig.php");



$sql =  "SELECT sensor_id, is_owner FROM sensors WHERE sensor_name='$q' AND user_login='$user_login';";

if ($sqlResult = $conn->query($sql)) {
    $rows = $sqlResult->num_rows;
    if ($rows > 0) {
        $wiersz = mysqli_fetch_assoc($sqlResult);


        $is_user_a_owner = $wiersz['is_owner'];
        $sensor_to_delte_id = $wiersz['sensor_id'];
        //echo $sensor_to_delte_id;
        echo $is_user_a_owner;


        $sqlResult->free();
    } else {
        echo "0 wierszy";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





if ($is_user_a_owner) {

    $sql =  "DELETE FROM sensors WHERE sensor_id='$sensor_to_delte_id';";

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
} else {
    $sql =  "DELETE FROM sensors WHERE sensor_id='$sensor_to_delte_id' AND user_login = '$user_login';";

    if ($sqlResult = $conn->query($sql)) {
        echo "usunieto z sensorow
     ";
    } else {
        echo "Error: " . $sql . " " . $conn->error;
    }
}





exit();

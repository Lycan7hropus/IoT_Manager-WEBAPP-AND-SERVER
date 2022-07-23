<?php


include("../config/dbconfig.php");
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');



/// ---------------------------- do wywalenia ----------------------------\\\
session_start();

//SELECT SENSOR ID
$sql = 'SELECT sensor_id FROM sensors WHERE sensor_name = "' . $_SESSION["sensor_name"] . '" AND user_login = "' . $_SESSION['user_login'] . '"';

if ($sqlResult = $conn->query($sql)) {
    $rows = $sqlResult->num_rows;
    if ($rows > 0) {
        //echo "$rows wierszy";
        $wiersz = mysqli_fetch_assoc($sqlResult);
        //print_r($wiersz);
        //exit();
        $sensor_id = $wiersz["sensor_id"];


        $sqlResult->free();
    } else {
        //echo "zero wierszy";
        //print_r($sqlResult);
        //exit();
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}
/// ---------------------------- do wywalenia ----------------------------\\\


$sql = "SELECT DATE(date_time), HOUR(date_time), MIN(date_time), id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), MINUTE(date_time) DIV 4;";
$sql = "SELECT temp,hum,pres,date_time FROM `$sensor_id`";

if ($res = @$conn->query($sql)) {

    $readings_arr = array();

    while ($row = $res->fetch_assoc()) {
        extract($row);
        
        $read_item = array(
            'id' => $id,
            'temp' => $temp,
            'hum' => $hum,
            'pres' => $pres,
            'date_time' => $date_time
        );

        //echo $read_item;
        
        array_push($readings_arr, $read_item);
    }

    echo json_encode($readings_arr);
    
} else {
    echo json_encode(
        array('message' => 'No Posts Found')
      );
}
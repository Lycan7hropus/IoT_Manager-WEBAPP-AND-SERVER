<?php


$q = $_GET['q'];
$type = $_GET['type'];
$perioid = $_GET['perioid'];
$readings_type = $_GET['readings_type'];

session_start();
include("../config/dbconfig.php");
$json_array = array();


$sql = "SELECT DATE(date_time), HOUR(date_time), MIN(date_time), $readings_type, date_time FROM `$q` GROUP BY DATE(date_time), $perioid(date_time);";

//SELECT ALL RECORDS
$res = @$conn->query($sql);

if ($res) {
    

    while ($row = $res->fetch_assoc()) {

        extract($row);

       
        array_push($json_array, array("x" => $row['date_time'], "y" => $row[$readings_type]));


    }

    //echo $res->num_rows;
} else {
    echo "0.. results";
}

echo json_encode($json_array,JSON_NUMERIC_CHECK);
//echo json_encode($res->num_rows);

?>

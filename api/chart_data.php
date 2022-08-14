<?php


$table_name = $_GET['q'];
$type = $_GET['type'];
$perioid = $_GET['perioid'];
$readings_type = $_GET['readings_type'];

//echo "q = " . $table_name. " type = " . $type . " perioid = " . $perioid . " rt = " . $readings_type;


session_start();
include("../config/dbconfig.php");
$json_array = array();

// $sql = "SELECT $readings_type, date_time FROM `$table_name` ORDER BY date_time DESC LIMIT 720;";
// $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 6";
// $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) ORDER BY date_time DESC LIMIT 60";
// $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), $perioid(date_time);";

//$sql = "SELECT id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), HOUR(date_time);";
switch ($perioid) {
    case "HOUR":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 360";
        break;
    case "DAY":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
        break;
    case "WEEK":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 30 ORDER BY date_time DESC LIMIT 336";
        break;
    case "MONTH":
        $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time) DIV 2 ORDER BY date_time DESC LIMIT 360";
        break;
    default:
        $sql = "SELECT id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
        break;
}




//SELECT ALL RECORDS


if ($res = @$conn->query($sql)) {


    while ($row = $res->fetch_assoc()) {

        extract($row);


        array_push($json_array, array("x" => $row['date_time'], "y" => $row[$readings_type]));
    }

    //echo $res->num_rows;
} else {
    echo "0.. results";
}

echo json_encode($json_array, JSON_NUMERIC_CHECK);
//echo json_encode($res->num_rows);




// <?php


// $table_name = $_GET['q'];
// $type = $_GET['type'];
// $perioid = $_GET['perioid'];
// $readings_type = $_GET['readings_type'];

// session_start();
// include("../config/dbconfig.php");
// $json_array = array();

// // $sql = "SELECT $readings_type, date_time FROM `$table_name` ORDER BY date_time DESC LIMIT 720;";
// // $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 6";
// // $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) ORDER BY date_time DESC LIMIT 60";
// // $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), $perioid(date_time);";

// //$sql = "SELECT id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), HOUR(date_time);";
// switch ($perioid) {
//     case "HOUR":
//         $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 360";
//         break;
//     case "DAY":
//         $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
//         break;
//     case "WEEK":
//         $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 30 ORDER BY date_time DESC LIMIT 336";
//         break;
//     case "MONTH":
//         $sql = "SELECT $readings_type, date_time FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time) DIV 2 ORDER BY date_time DESC LIMIT 360";
//         break;
//     default:
//         $sql = "SELECT id, temp, hum, pres, date_time FROM `$sensor_id` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
//         break;
// }




// //SELECT ALL RECORDS


// if ($res = @$conn->query($sql)) {


//     while ($row = $res->fetch_assoc()) {

//         extract($row);


//         array_push($json_array, array("x" => $row['date_time'], "y" => $row[$readings_type]));
//     }

//     //echo $res->num_rows;
// } else {
//     echo "0.. results";
// }

// echo json_encode($json_array, JSON_NUMERIC_CHECK);
// //echo json_encode($res->num_rows);

<?php


include("../../config/dbconfig.php");
require_once 'jwt_utils.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");



$data = json_decode(file_get_contents("php://input", true));

if (isset($data)) {

	$perioid = mysqli_real_escape_string($conn, $data->perioid);
	$table_name = mysqli_real_escape_string($conn, $data->id);
	$type = mysqli_real_escape_string($conn, $data->type);
	$bearer_token = get_bearer_token();

	//echo json_encode($data);
} else {

	if (isset($_GET['perioid']) && isset($_GET['id']) && isset($_GET['type'])) {
		$perioid = filter_var($_GET['perioid'], FILTER_DEFAULT, ['options' => ['default' => 'DAY', 'min_range' => 1]]);
		$table_name = filter_var($_GET['id'], FILTER_VALIDATE_INT, ['options' => ['default' => 'DAY', 'min_range' => 1]]);
		$type = filter_var($_GET['type'], FILTER_DEFAULT, ['options' => ['default' => 'all', 'min_range' => 1]]);
	}
	$bearer_token = get_bearer_token();
}



$json_array = array();

if ($type == "all") {
	$type = "temp,hum,pres";
}



//------DATE BETWEEN-----------

$currentDate = date('Y-m-d h:i:sa', strtotime("now"));
$oldDate = date('Y-m-d h:i:sa', strtotime("-1 hour"));

//------DATE BETWEEN-----------


switch ($perioid) {
	case "HOUR":
		$sql = "SELECT $type ,date_time  FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time), SECOND(date_time) DIV 10 ORDER BY date_time DESC LIMIT 360";
		break;
	case "DAY":
		$sql = "SELECT $type ,date_time  FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
		break;
	case "WEEK":
		$sql = "SELECT $type ,date_time  FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 30 ORDER BY date_time DESC LIMIT 336";
		break;
	case "MONTH":
		$sql = "SELECT $type ,date_time  FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time) DIV 2 ORDER BY date_time DESC LIMIT 360";
		break;
		case "LAST":
		$sql = "SELECT $type ,date_time  FROM `$table_name` ORDER BY date_time DESC LIMIT 1";
		break;
	default:
		//$sql = "SELECT $type ,date_time  FROM `$table_name` GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time DESC LIMIT 360";
		$sql = "SELECT $type ,date_time  FROM `$table_name` WHERE date_time BETWEEN '$oldDate' AND '$currentDate'"; // GROUP BY DATE(date_time), HOUR(date_time), MINUTE(date_time) DIV 4 ORDER BY date_time ";
		break;
}






#echo $bearer_token;

$is_jwt_valid = is_jwt_valid($bearer_token);
$user_login = null;

if ($is_jwt_valid) {


	if ($res = @$conn->query("SELECT user_login FROM users WHERE user_api_key = '$bearer_token'")) {


		while ($row = $res->fetch_assoc()) {
			$user_login = $row['user_login'];
			//echo $user_login;
		}

		if ($res = @$conn->query("SELECT sensor_name FROM sensors WHERE user_login = '$user_login' AND sensor_id = '$table_name'")) {

			while ($row = $res->fetch_assoc()) {
				//print_r($row['sensor_name']);
			}

			if ($res = @$conn->query($sql)) {


				while ($row = $res->fetch_assoc()) {

					extract($row);

					//print_r($row);
					array_push($json_array, $row);
				}

				echo json_encode($json_array, JSON_NUMERIC_CHECK);
			} else {
				echo "0.. results!";
			}
		} else {
			echo "no sensor with that name";
		}
	} else {
		echo "no user with that token";
	}
} else {
	echo json_encode(array('error' => 'invalid token'));
}

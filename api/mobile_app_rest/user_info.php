<?php
include("../mobile_app_rest/Sensor.php");

include("../../config/dbconfig.php");
require_once 'jwt_utils.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$array = array();
$array2 = array();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // get posted data
    $bearer_token = get_bearer_token();

   

    //  $sensor1 = new Sensor(0,0,"name","name","true");
    //  $sensor2 = new Sensor(1,1,"name","name","true");

    // array_push($array2,$sensor1);
    // array_push($array2,$sensor2);
    // $array +=  ['sensors' => $array2];


    $is_jwt_valid = is_jwt_valid($bearer_token);
    $user_login = null;

    if ($is_jwt_valid) {

        
        if ($res = @$conn->query("SELECT user_login FROM users WHERE user_api_key = '$bearer_token'")) {

          
            while ($row = $res->fetch_assoc()) {
                $user_login = $row['user_login'];
            
            }

    

            if ($res = @$conn->query("SELECT id, sensor_id, sensor_name, user_login, is_owner FROM sensors WHERE user_login = '$user_login'")) {
                
                while ($row = $res->fetch_assoc()) {
                    //$array += ['sensor' => $row];
                    array_push($array2,$row);
                    
                }
                $array +=  ['sensors' => $array2];

                // if ($res = @$conn->query($sql)) {


                // 	while ($row = $res->fetch_assoc()) {

                // 		extract($row);

                // 		//print_r($row);
                // 		array_push($json_array, $row);
                // 	}

                // 	echo json_encode($json_array, JSON_NUMERIC_CHECK);
                // } else {
                // 	echo "0.. results!";
                // }
            } else {
                echo "no sensor with that name";
            }
        } else {
            echo "no user with that token";
        }
    } else {
        echo json_encode(array('error' => 'invalid token'));
    }
}else{
    echo "use get";
}

echo json_encode($array);

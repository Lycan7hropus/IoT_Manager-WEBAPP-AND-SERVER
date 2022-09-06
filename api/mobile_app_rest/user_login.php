<?php


include("../../config/dbconfig.php");
require_once 'jwt_utils.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

$array = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get posted data
    $data = json_decode(file_get_contents("php://input", true));
    $login = mysqli_real_escape_string($conn, $data->login);
    $pass = mysqli_real_escape_string($conn, $data->password);


    //$sql = "SELECT * FROM user WHERE username = '" . mysqli_real_escape_string($dbConn, $data->username) . "' AND password = '" . mysqli_real_escape_string($dbConn, $data->password) . "' LIMIT 1";
    $sql = "SELECT user_password FROM users WHERE user_login='$login'";

    $sqlResult = $conn->query($sql);

    if ($sqlResult->num_rows > 0) {

        while ($row = $sqlResult->fetch_assoc()) {


            if (password_verify($pass, $row['user_password'])) {

                $headers = array('alg' => 'HS256', 'typ' => 'JWT');
                $payload = array('username' => $login, 'exp' => (time() + 64000000));
        
                $jwt = generate_jwt($headers, $payload);

                $sql = "UPDATE users SET user_api_key = '$jwt' WHERE user_login='$login'";
               

                if($conn->query($sql)){
                    $array +=  ['status' => 'success'];
                }else{
                    $array +=  ['status' => 'SQL failed'];
                }

                $array +=  ['token' => $jwt];
                
                


            } else {
                $array += ['status' => 'wrong passworrd'];
                
            }
        }
    } else {
        $array += ['status' => $login . $pass .  ' is invalid user'];
    }

}else{
    $array += ['status' => 'wrong method, post required'];
}


echo json_encode($array);
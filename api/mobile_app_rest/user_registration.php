<?php

include("../../config/dbconfig.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
$messages = array();
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // get posted data
    $data = json_decode(file_get_contents("php://input", true));
    $email = mysqli_real_escape_string($conn, $data->email);
    $login = mysqli_real_escape_string($conn,  $data->login);;
    $pass = mysqli_real_escape_string($conn, $data->password);
    $repass = mysqli_real_escape_string($conn, $data->repassword);

    //     if ($result) {
    //         echo json_encode(array('success' => 'You registered successfully'));
    //     } else {
    //         echo json_encode(array('error' => 'Something went wrong, please contact administrator'));
    //     }


    $is_all_good = true;


    // VALIDATION PART
    if (isset($data)) {

        //EMAIL VALIDATION
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $is_all_good = false;
            array_push($messages, "invalid email");
        }
        $conn_email_response = $conn->query("SELECT user_id FROM users WHERE user_email='$email'");
        if ($conn_email_response) {
            $emails_count = $conn_email_response->num_rows;
            if ($emails_count > 0) {
                $is_all_good = false;
                array_push($messages, "email arleady used");
            }
        } else {
            $is_all_good = false;
            array_push($messages, "conn email response failed");
        }

        //LOGIN VALIDATION
        if (ctype_alnum($login) == false) {
            $is_all_good = false;
            //echo "Login can contain only alphanumeric characters";
            array_push($messages, "Login can contain only alphanumeric characters");
        }

        if (strlen($login) < 5 || strlen($login) > 20) {
            $is_all_good = false;
            //echo "Please use a minimum of 5 characters and a maximum of 20";
            array_push($messages, "Please use a minimum of 5 characters and a maximum of 20 in login");
        }

        $conn_login_response = $conn->query("SELECT user_id FROM users WHERE user_login='$login'");
        if ($conn_login_response) {
            $logins_count = $conn_login_response->num_rows;
            if ($logins_count > 0) {
                $is_all_good = false;
                //echo "Login is arleady used";
                array_push($messages, "Login is arleady used");
            }
        } else {
            $is_all_good = false;
            array_push($messages, "conn login response failed");
        }

        //PASSWORD VALIDATION
        if (strlen($pass) < 5 || strlen($pass) > 20) {
            $is_all_good = false;
            //echo "Please use a minimum of 5 characters and a maximum of 20";
            array_push($messages, "Please use a minimum of 5 characters and a maximum of 20 in password");
        }

        if ($pass != $repass) {
            $is_all_good = false;
            //echo "Passwords are diffrent!";
            array_push($messages, "Passwords are diffrent!");
        }

        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);


        //ADDING USER TO DATABASE
        if ($is_all_good == true) {

            $sql = "INSERT INTO users (user_id, user_email , user_login, user_password , user_api_key)
                    VALUES (null, '$email', '$login', '$pass_hashed', 999)";

            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
                array_push($messages, "New record created successfully");
                $response +=  ['success' => true];
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                array_push($messages, "Error: " . $sql . "<br>" . $conn->error);
                $response +=  ['success' => false];
            }
        } else {
            //echo "Something is wrong";
            array_push($messages, "You have to meet all requirements to register your account");
            $response +=  ['success' => false];
        }
    } else {
        array_push($messages, "unset data");
        $response +=  ['success' => "false"];
    }
} else {
    //echo "POST is required!";
    array_push($messages, "POST is required!");
    $response +=  ['success' => false];
}
$response +=  ['messages' => $messages];
$conn->close();
echo json_encode($response);

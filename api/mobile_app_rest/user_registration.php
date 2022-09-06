<?php

include("../../config/dbconfig.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

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
            echo "Invalid email!";
        }


        $conn_email_response = $conn->query("SELECT user_id FROM users WHERE user_email='$email'");
        if ($conn_email_response) {
            $emails_count = $conn_email_response->num_rows;
            if ($emails_count > 0) {
                $is_all_good = false;
                echo "Email is arleady used";
            }
        }

        //LOGIN VALIDATION
        if (ctype_alnum($login) == false) {
            $is_all_good = false;
            echo "Login can contain only alphanumeric characters";
        }

        if (strlen($login) < 5 || strlen($login) > 20) {
            $is_all_good = false;
            echo "Please use a minimum of 5 characters and a maximum of 20";
        }

        $conn_login_response = $conn->query("SELECT user_id FROM users WHERE user_login='$login'");
        if ($conn_login_response) {
            $logins_count = $conn_login_response->num_rows;
            if ($logins_count > 0) {
                $is_all_good = false;
                echo "Login is arleady used";
            }
        }

        //PASSWORD VALIDATION
        if (strlen($pass) < 5 || strlen($pass) > 20) {
            $is_all_good = false;
            echo "Please use a minimum of 5 characters and a maximum of 20";
        }

        if ($pass != $repass) {
            $is_all_good = false;
            echo "Passwords are diffrent!";
        }

        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);


        //ADDING USER TO DATABASE
        if ($is_all_good == true) {

            $sql = "INSERT INTO users (user_id, user_email , user_login, user_password , user_api_key)
                VALUES (null, '$email', '$login', '$pass_hashed', 999)";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Something is wrong";
          
        }
    }
    $conn->close();
} else {
    echo "POST is required!";
}

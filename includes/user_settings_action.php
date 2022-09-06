<?php
session_start();

include("../config/dbconfig.php");





$result = $_POST;

$is_all_good = true;

$email = mysqli_real_escape_string($conn, $result['email']);
$login_session = $_SESSION["user_login"];
$pass = mysqli_real_escape_string($conn, $result['pass']);
$repass = mysqli_real_escape_string($conn, $result['repass']);
$terms = $result['terms'];


// VALIDATION PART
if (isset($result)) {

    //EMAIL VALIDATION
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $is_all_good = false;
        $_SESSION['e_email'] = "Invalid email!";
    }


    $conn_email_response = $conn->query("SELECT user_login FROM users WHERE user_email='$email'");
    if ($conn_email_response) {

        $emails_count = $conn_email_response->num_rows;
        if ($emails_count > 0) {

            while ($row = $conn_email_response->fetch_assoc()) {

                if ($row['user_login'] != $_SESSION['user_login']) {
                    $is_all_good = false;


                    $_SESSION['e_email'] = "Email is arleady used";
                }
            }
        }
    }



    //PASSWORD VALIDATION
    if (strlen($pass) < 5 || strlen($pass) > 20) {
        $is_all_good = false;
        $_SESSION['e_pass'] = "Please use a minimum of 5 characters and a maximum of 20";
    }

    if ($pass != $repass) {
        $is_all_good = false;
        $_SESSION['e_pass'] = "Passwords are diffrent!";
    }

    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);



    //UPDATE USER IN DATABASE
    if ($is_all_good == true) {
    
        $sql = "UPDATE users SET user_email = '$email', user_password = '$pass_hashed' WHERE user_login = '$login_session';";
        $sqlResult = $conn->query($sql);
        echo $sql;
        if($sqlResult){
            echo "zmieniony email i haslo";
        }else{
            $_SESSION['e_email'] = "Email not changed";
        }
    
    }
}

$conn->close();
header("Location: ../user_settings.php");



<?php
session_start();

include("../config/dbconfig.php");


$result = $_POST;

$is_all_good = true;

$email = mysqli_real_escape_string($conn, $result['email']);
$login = mysqli_real_escape_string($conn, $result['login']);;
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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $is_all_good = false;
        $_SESSION['e_email'] = "Invalid email!";
    }

    $conn_email_response = $conn->query("SELECT user_id FROM users WHERE user_email='$email'");
    if($conn_email_response){
        $emails_count = $conn_email_response->num_rows;
        if ($emails_count > 0) {
            $is_all_good = false;
            $_SESSION['e_email'] = "Email is arleady used";
        }
    }

    //LOGIN VALIDATION
    if (ctype_alnum($login) == false) {
        $is_all_good = false;
        $_SESSION['e_login'] = "Login can contain only alphanumeric characters";
    }

    if (strlen($login) < 5 || strlen($login) > 20) {
        $is_all_good = false;
        $_SESSION['e_login'] = "Please use a minimum of 5 characters and a maximum of 20";
    }
    
    $conn_login_response = $conn->query("SELECT user_id FROM users WHERE user_login='$login'");
    if($conn_login_response){
        $logins_count = $conn_login_response->num_rows;
        if ($logins_count > 0) {
            $is_all_good = false;
            $_SESSION['e_login'] = "Login is arleady used";
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

    //POLICY TERMS ACCEPTATION VALIDATION
    if (!isset($terms)) {
        $is_all_good = false;
        $_SESSION["e_terms"] = "You have to accept terms of policy!";
    }
    

    //ADDING USER TO DATABASE
    if ($is_all_good == true) {

        $sql = "INSERT INTO users (user_id, user_email , user_login, user_password , user_api_key)
                VALUES (null, '$email', '$login', '$pass_hashed', 999)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        
    }
    else{
        echo "Something is wrong";
        if (!isset($terms)) {
            echo "unset";
        }else{
            echo " set";
        }
    }
}
$conn->close();
//header("Location: ../register.php");

<?php
session_start();

include("../config/dbconfig.php");


$result = $_POST;

$login = mysqli_real_escape_string($conn, $result['login']);
$pass = mysqli_real_escape_string($conn, $result['pass']);


if (isset($result)) {

    $sql = "SELECT user_password FROM users WHERE user_login='$login'";

    $sqlResult = $conn->query($sql);

    if ($sqlResult->num_rows > 0) {
  
        while($row = $sqlResult->fetch_assoc()) {
     
            
            if(password_verify($pass, $row['user_password'])){
                
                echo "dane poprawne";
                $_SESSION['logged_in'] = true;
                $_SESSION['user_login'] = $login;
                header("Location: ../main.php");
                exit();
                            
            }
            else{
                //header("Location: index.php?mess=Wrong");
                echo "dane nie poprawne";
                exit();
                
            }
        }
      
    } else {
      echo "0 results";
      
    }


}

$conn->close();
header("Location: ../login.php");
exit();



?>
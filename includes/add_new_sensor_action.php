<?php
session_start();
include("../config/dbconfig.php");

$result = $_POST;

print_r($result);

if (isset($result)) {

    $sql = "CREATE TABLE `bootstrapsandbox`.`$result[sensor_id]` ( `sensor_id` INT NOT NULL AUTO_INCREMENT , `temp` INT NOT NULL , `pres` INT NOT NULL , `hum` INT NOT NULL , `date_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `sensor_password` TEXT NOT NULL , PRIMARY KEY (`sensor_id`)) ENGINE = InnoDB;";

    $sqlResult = $conn->query($sql);

    if($sqlResult){
        echo "table created successfully";
    }

    $sql = "INSERT INTO `sensors` (`id`, `sensor_id`, `sensor_name`, `user_login`, `sensor_password`) VALUES (NULL, '$result[sensor_id]', '$result[sensor_name]', '$_SESSION[user_login]', '$result[sensor_password]')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}

$conn->close();
header("Location: ../main.php");
exit();


?>

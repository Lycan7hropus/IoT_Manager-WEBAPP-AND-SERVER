<?php
session_start();
include("../config/dbconfig.php");

$result = $_POST;

print_r($result);

if (isset($result)) {
    $sql = "CREATE TABLE `m27957_sandbox`.`$result[sensor_id]` ( `id` INT NOT NULL AUTO_INCREMENT , `temp` FLOAT NOT NULL , `hum` FLOAT NOT NULL , `pres` FLOAT NOT NULL , `date_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";

    $sqlResult = $conn->query($sql);

    if($sqlResult){
        echo "table created successfully";
    }

    // $sql = "CREATE TABLE `m27957_sandbox`.`single_$result[sensor_id]` ( `id` INT NOT NULL AUTO_INCREMENT , `temp` FLOAT NOT NULL , `hum` FLOAT NOT NULL , `pres` FLOAT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

    // $sqlResult = $conn->query($sql);

    // if($sqlResult){
    //     echo "single table created successfully";
    // }

    $sql = "INSERT INTO `sensors` (`id`, `sensor_id`, `sensor_name`, `user_login`, `sensor_password`) VALUES (NULL, '$result[sensor_id]', '$result[sensor_name]', '$_SESSION[user_login]', '$result[sensor_password]')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $sql = "INSERT INTO single_$result[sensor_id] (id, temp, hum, pres) VALUES (null,'0', '0', '0')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Record updated created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    
}

$conn->close();
header("Location: ../main.php");
exit();


?>
esp
<?php
session_start();
include("../config/dbconfig.php");

$result = $_POST;
$sensor_id = $result["sensor_id"];
$user_login = $_SESSION["user_login"];
$sensor_password = $result["sensor_password"];
$is_all_good = true;



// print_r($result);
// // echo "$sensor_id";
// echo $user_login;

if (isset($result)) {



    //checks if the user has arleady added this sensor before
    $sql = "SELECT 1 FROM sensors WHERE sensor_id='$sensor_id' AND user_login='$user_login'";
    $sensor_check = sqlQueryExecutor($sql);

    if ($sensor_check) {
        $_SESSION["ans_action"] = "User have this sensor arleady added";
        $conn->close();
        header("Location: ../main.php");
        exit();
    } else {
        //checks if there is sensor with that id arleady in db
        $sql = "SELECT 1 FROM sensors WHERE sensor_id='$sensor_id' ";
        $sensor_check = sqlQueryExecutor($sql);

        if ($sensor_check) {
            //checks if sensor password is correct
            $sql = "SELECT 1 FROM sensors WHERE sensor_id='$sensor_id' AND sensor_password = '$sensor_password'";
            $sensor_check = sqlQueryExecutor($sql);

            if ($sensor_check) {

                $sql = "INSERT INTO `sensors` (`id`, `sensor_id`, `sensor_name`, `user_login`, `sensor_password`) VALUES (NULL, '$result[sensor_id]', '$result[sensor_name]', '$_SESSION[user_login]', '$result[sensor_password]')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


            } else {
                $_SESSION["ans_action"] = "Wrong sensor password";
                $conn->close();
                header("Location: ../main.php");
                exit();
            }
        } else {
            //there is no any sensor in db with that id"

            $sql = "CREATE TABLE `m27957_sandbox`.`$result[sensor_id]` ( `id` INT NOT NULL AUTO_INCREMENT , `temp` FLOAT NOT NULL , `hum` FLOAT NOT NULL , `pres` FLOAT NOT NULL , `date_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";

            $sqlResult = $conn->query($sql);

            if ($sqlResult) {
                echo "table created successfully";
            }

            $sql = "INSERT INTO `sensors` (`id`, `sensor_id`, `sensor_name`, `user_login`, `sensor_password`, `is_owner`) VALUES (NULL, '$result[sensor_id]', '$result[sensor_name]', '$_SESSION[user_login]', '$result[sensor_password]', '1')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }



    // if ($sqlResult = $conn->query($sql)) {
    //     $rows = $sqlResult->num_rows;
    //     if ($rows > 0) {
    //         //$wiersz = mysqli_fetch_assoc($sqlResult);
    //         //print_r($wiersz);

    //         echo "cos tu jest";

    //         $sql = "SELECT 1 FROM sensors WHERE sensor_id='$sensor_id' AND sensor_password='$sensor_password'";




    //         //$sqlResult->free();
    //     } else {
    //     }
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
}


header("Location: ../main.php");
exit();











// $sql = "INSERT INTO single_$result[sensor_id] (id, temp, hum, pres) VALUES (null,'0', '0', '0')";

// if ($conn->query($sql) === TRUE) {
//     echo "Record updated created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
// $sql = "CREATE TABLE `m27957_sandbox`.`single_$result[sensor_id]` ( `id` INT NOT NULL AUTO_INCREMENT , `temp` FLOAT NOT NULL , `hum` FLOAT NOT NULL , `pres` FLOAT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

// $sqlResult = $conn->query($sql);

// if($sqlResult){
//     echo "single table created successfully";
// }




function sqlQueryExecutor($sql_f)
{

    if ($sqlResult = $GLOBALS['conn']->query($sql_f)) {


        $rows = $sqlResult->num_rows;

        if ($rows > 0) {

            return true;
        } else {

            return false;
        }
    } else {
        echo "Error: " . $sql_f . "<br>" . $GLOBALS['conn']->error;
    }
}


$conn->close();

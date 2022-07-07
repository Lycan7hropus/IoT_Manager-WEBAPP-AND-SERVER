<?php
include("config/dbconfig.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $sensor = test_input($_POST["sensor"]);
    $sensor_id = test_input($_POST["api_key"]);
    $value1 = test_input($_POST["value1"]);
    $value2 = test_input($_POST["value2"]);
    $value3 = $_POST["value3"];


    $sql = "UPDATE single_$sensor_id SET temp='$value1', hum='$value2', pres='$value3' WHERE id=1;";
    //$sql2 = "INSERT INTO $sensor_id (id, temp, hum, pres) VALUES (null,'$value1', '$value2', '$value3')";
    $sql2 = "INSERT INTO `$sensor_id` (`id`, `temp`, `hum`, `pres`) VALUES (NULL,'$value1', '$value2', '$value3')";


    if ($conn->query($sql) === TRUE) {
        echo "New record updated successfully 
";
    } else {
        echo "Error: " . $sql . "
" . $conn->error;
    }

    if ($conn->query($sql2) === TRUE) {
        echo "New record added successfully
";
    } else {
        echo "Error: " . $sql2 . "
" . $conn->error;
    }

    $conn->close();



    echo "
     
    ";

    echo "sensor:  " . $sensor . "
    ";
    echo "val1: " . $value1 . "
    ";
    echo "val2: " . $value2 . "
    ";
    echo "val3: " . $value3 . "
    ";
    echo "Location: " . $location . "
     
    ";
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
esp
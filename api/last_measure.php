<?php


$q = $_GET['q'];
$type = $_GET['type'];

session_start();
include("../config/dbconfig.php");


$sql = "SELECT * FROM `$q` ORDER BY id DESC LIMIT 1";

if ($sqlResult = $conn->query($sql)) {
    $rows = $sqlResult->num_rows;
    if ($rows > 0) {
        $wiersz = mysqli_fetch_assoc($sqlResult);
        extract($wiersz);

        switch ($type ) {
            case "temp":
                echo $temp;
                break;
            case "hum":
                echo $hum;
                break;
            case "pres":
                echo $pres;
                break;
        }

        $sqlResult->free();
    } else {
        echo "0";
        //print_r($sqlResult);
        exit();
    }
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}


?>

<?php
// START A SESSION AND INCLUDE DB
session_start();
include("config/dbconfig.php");

//CHECK IF USER IS LOGGED IN IF NOT GO TO LOGIN PAGE
if (!isset($_SESSION['logged_in'])) {
    echo "sign in first!";
    header("Location: login.php");
    exit();
}

$dataPointsTemp = array();
$dataPointsHum = array();
$dataPointsPres = array();

//SELECT SENSOR ID
$sql = 'SELECT sensor_id FROM sensors WHERE sensor_name = "' . $_SESSION["sensor_name"] . '" AND user_login = "' . $_SESSION['user_login'] . '"';
if ($sqlResult = $conn->query($sql)) {
    $rows = $sqlResult->num_rows;
    if ($rows > 0) {
        //echo "$rows wierszy";
        $wiersz = mysqli_fetch_assoc($sqlResult);
        //print_r($wiersz);
        //exit();
        $sensor_id = $wiersz["sensor_id"];


        $sqlResult->free();
    } else {
        //echo "zero wierszy";
        //print_r($sqlResult);
        //exit();
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}

//SELECT SINGLE RECORD FROM DB
// $sql = "SELECT temp,hum,pres,date_time FROM single_$sensor_id";
// if ($res = @$conn->query($sql)) {
//     $rows = $res->num_rows;
//     if ($rows > 0) {

//         $wiersz = mysqli_fetch_assoc($res);


//         $_SESSION['temp'] = $wiersz['temp'];
//         $_SESSION['hum'] = $wiersz['hum'];
//         $_SESSION['pres'] = $wiersz['pres'];
//         //echo $_SESSION['pres'];

//         $res->free();
//         //exit();
//     } else {
//         echo "zero wierszy";
//         print_r($sqlResult);
//         exit();
//     }
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//     exit();
// }





//$dataPoints = array();
// $y = 40;
// for ($i = 0; $i < 1000; $i++) {
//     $y += rand(0, 10) - 5;
//     array_push($dataPoints, array("x" => $i, "y" => $y));
// }


$sql = "SELECT temp,hum,pres,date_time FROM `$sensor_id`";

//SELECT ALL RECORDS
$i = 0;
$res = @$conn->query($sql);
print_r($res);
if ($res) {

    while ($row = $res->fetch_assoc()) {

        $i++;
        array_push($dataPointsTemp, array("x" => $row['date_time'], "y" => $row['temp']));
        array_push($dataPointsHum, array("x" => $row['date_time'], "y" => $row['hum']));
        array_push($dataPointsPres, array("x" => $row['date_time'], "y" => $row['pres']));


        echo "<br> " . $row['date_time'] . " " . $row['hum'];
    }
} else {
    echo "0.. results";
}





?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">



    <script>
        
        var myDataPointsTemp = [];
        var myDataPointsHum = [];
        var myDataPointsPres = [];

        function parseDate(type) {
            if (type == 1) {

                var phpDataPoints = <?php echo json_encode($dataPointsTemp, JSON_NUMERIC_CHECK); ?>

                for (var i = 0; i < phpDataPoints.length; i++) {
                    myDataPointsTemp.push({
                        x: new Date(phpDataPoints[i].x),
                        y: phpDataPoints[i].y
                    });
                }
                

            } else if (type == 2) {
                var phpDataPoints = <?php echo json_encode($dataPointsHum, JSON_NUMERIC_CHECK); ?>

                for (var i = 0; i < phpDataPoints.length; i++) {
                    myDataPointsHum.push({
                        x: new Date(phpDataPoints[i].x),
                        y: phpDataPoints[i].y
                    });
                }
            } else if (type == 3){
                var phpDataPoints = <?php echo json_encode($dataPointsHum, JSON_NUMERIC_CHECK); ?>

                for (var i = 0; i < phpDataPoints.length; i++) {
                    myDataPointsPres.push({
                        x: new Date(phpDataPoints[i].x),
                        y: phpDataPoints[i].y
                    });
                }
            }

        }

        window.onload = function() {

            // ------------------------------ TEMPERATURE CHART ------------------------------
            parseDate(1);
            var tenp_chart = new CanvasJS.Chart("chartContainerTemp", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Temperature chart"
                },
                data: [{
                    type: "area",
                    dataPoints: myDataPointsTemp
                }]
            });
            tenp_chart.render();

            // ------------------------------ HUMIDTY CHART ------------------------------

            parseDate(2);
            var hum_chart = new CanvasJS.Chart("chartContainerHum", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Humidty chart"
                },
                data: [{
                    type: "area",
                    dataPoints: myDataPointsHum
                }]
            });
            hum_chart.render();

            // ------------------------------ PRESSURE CHART ------------------------------
            parseDate(3);
            var pres_chart = new CanvasJS.Chart("chartContainerPres", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Pressure chart"
                },
                data: [{
                    type: "area",
                    dataPoints: myDataPointsPres
                }]
            });
            pres_chart.render();

        }
    </script>

</head>

<body>

    <?php require("components/header_logged_in.php"); ?>

    <div style="height: 100px;"></div>


    <?php
    include_once("components/comp_defpage.php");
    include_once("components/comp_charts.php");

    ?>






    <?php require("components/footer.php"); ?>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
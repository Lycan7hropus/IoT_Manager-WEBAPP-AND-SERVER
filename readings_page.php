<?php
session_start();
include("config/dbconfig.php");

if (!isset($_SESSION['logged_in'])) {
    echo "sign in first!";
    exit();
}


$sql = 'SELECT sensor_id FROM sensors WHERE sensor_name = "'.$_SESSION["sensor_name"].'" AND user_login = "' . $_SESSION['user_login'] .'"';
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
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}


$sql = "SELECT temp,hum,date_time FROM single_$sensor_id";
if ($res = @$conn->query($sql)) {
    $rows = $res->num_rows;
    if ($rows > 0) {

        $wiersz = mysqli_fetch_assoc($res);
        echo ($wiersz['temp']);

        $_SESSION['temp'] = $wiersz['temp'];
        $_SESSION['hum'] = $wiersz['hum'];
        $_SESSION['pres'] = $wiersz['pres'];


        $res->free();
        //exit();
    } else {
        echo "zero wierszy";
        print_r($sqlResult);
        exit();
    }
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit();
}





$dataPoints = array();
$y = 40;
for ($i = 0; $i < 1000; $i++) {
    $y += rand(0, 10) - 5;
    array_push($dataPoints, array("x" => $i, "y" => $y));
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
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainerTemp", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Try Zooming and Panning"
                },
                data: [{
                    type: "area",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart1.render();

            var chart2 = new CanvasJS.Chart("chartContainerHum", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Try Zooming and Panning"
                },
                data: [{
                    type: "area",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();

            var chart3 = new CanvasJS.Chart("chartContainerPres", {
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                animationEnabled: true,
                zoomEnabled: true,
                title: {
                    text: "Try Zooming and Panning"
                },
                data: [{
                    type: "area",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart3.render();

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
<?php

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

    <?php require("header_logged_in.php"); ?>

    <div style="height: 100px;"></div>

    <div style="width:96%; margin-left:auto; margin-right:auto;">
        <div class="row justify-content-center ">
            <div class="m-2 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm">
                <div class="myChart" id="TempChart">
                    <div id="chartContainerTemp" style="height: 333px; width: 100%;"></div>
                </div>
            </div>
            <div class="m-2 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm">
                <div class="myChart" id="TempChart">
                    <div id="chartContainerHum" style="height: 333px; width: 100%;"></div>
                </div>
            </div>
            <div class="m-2 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm">
                <div class="myChart" id="TempChart">
                    <div id="chartContainerPres" style="height: 333px; width: 100%; "></div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <?php require("footer.php"); ?>
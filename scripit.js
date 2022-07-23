<script>
var myDataPointsTemp = [];
var myDataPointsHum = [];
var myDataPointsPres = [];

function myFun(perioid) {


    //alert("Hello\nHow are you?");

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "http://sandbox.ct8.pl/api/chart_data.php?q=" + <?php echo $sensor_id ?>+"&perioid="+perioid, true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var jsonArray = JSON.parse(this.response);

            myDataPointsPres = [];

            for (var i = 0; i < jsonArray.length; i++) {
                myDataPointsPres.push({
                    x: new Date(jsonArray[i].x),
                    y: jsonArray[i].y
                });
            }

            console.log(myDataPointsPres);

            createChart("Pres",myDataPointsPres);



        } else {

            //alert("ready state: " + this.readyState + ", status: " + this.status);

        }


    }
}

function readingsUpdate(type) {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "http://sandbox.ct8.pl/api/last_measure.php?q=" + <?php echo $sensor_id ?> + "&type=" + type, true);
    xmlhttp.send();


    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(type + "_span_id").innerHTML = this.responseText;
        } else {
            //document.getElementById(type_id).innerHTML = "ready state: " + this.readyState + ", status: " + this.status;

        }
    };
    setTimeout(() => readingsUpdate(type), 1000)

}

function parseDate(type) {
    if (type == 1) {

        var phpDataPoints = <?php echo json_encode($dataPointsTemp, JSON_NUMERIC_CHECK); ?>;

        for (var i = 0; i < phpDataPoints.length; i++) {
            myDataPointsTemp.push({
                x: new Date(phpDataPoints[i].x),
                y: phpDataPoints[i].y
            });
        }


    } else if (type == 2) {
        var phpDataPoints = <?php echo json_encode($dataPointsHum, JSON_NUMERIC_CHECK); ?>;

        for (var i = 0; i < phpDataPoints.length; i++) {
            myDataPointsHum.push({
                x: new Date(phpDataPoints[i].x),
                y: phpDataPoints[i].y
            });
        }
    } else if (type == 3) {
        var phpDataPoints = <?php echo json_encode($dataPointsPres, JSON_NUMERIC_CHECK); ?>;

        for (var i = 0; i < phpDataPoints.length; i++) {
            myDataPointsPres.push({
                x: new Date(phpDataPoints[i].x),
                y: phpDataPoints[i].y
            });
        }
    }

}

function createChart(chart_type, dataPointsType) {

    
    var chart = new CanvasJS.Chart("chartContainer" + chart_type, {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        animationEnabled: true,
        zoomEnabled: true,
        title: {
            text: chart_type + " chart"
        },
        data: [{
            type: "area",
            dataPoints: dataPointsType
        }]
    });

    chart.render();


}

window.onload = function() {

    readingsUpdate("temp"); // method to be executed;
    readingsUpdate("hum"); // method to be executed;
    readingsUpdate("pres"); // method to be executed;

    // ------------------------------ TEMPERATURE CHART ------------------------------
    //parseDate(1);
    // var temp_chart = new CanvasJS.Chart("chartContainerTemp", {
    //     theme: "light2", // "light1", "light2", "dark1", "dark2"
    //     animationEnabled: true,
    //     zoomEnabled: true,
    //     title: {
    //         text: "Temperature chart"
    //     },
    //     data: [{
    //         type: "area",
    //         dataPoints: myDataPointsTemp
    //     }]
    // });

    // temp_chart.render();

    parseDate(1);
    createChart("Temp", myDataPointsTemp);

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
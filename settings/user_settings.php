<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    echo "sign in first!";
    exit();
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <script>
        function show(element_id) {
            var element = document.getElementById(element_id);
            var accounts_settings_tab = document.getElementById("accounts_settings_id");
            var sensor_list_tab = document.getElementById("sesnors_list_id");
            accounts_settings_tab.classList.add("d-none");
            sensor_list_tab.classList.add("d-none");
            element.classList.remove("d-none");
        }

        function delete_sensor(sensor_name) {
            


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }else{
                    //alert("ready state: " + this.readyState + ", status: " + this.status);
                }
            };

            xmlhttp.open("GET", "../api/ajax/delete_user_sql.php?q=" + sensor_name, true);
            xmlhttp.send();
            
            window.location.reload(true);
            


        }
    </script>


</head>

<body>

    <?php require("../components/header_logged_in.php"); ?>

    <div style="height: 56px;"></div>


    <div class="row justify-content-center">

        <div class="col-md-4 col-lg-2 d-none d-md-inline ">
            <div class="shadow h-100 py-5">
                <div class="measure-card p-3" onclick="show('accounts_settings_id')">
                    <span class=" d-block h3">Account settings</span>
                </div>
                <div class="measure-card p-3" onclick="show('sesnors_list_id')">
                    <span class=" d-block h3">Sensors</span>
                </div>
                <div class="measure-card p-3 ">

                    <span class=" d-block h3">#</span>
                </div>
                <div class="measure-card p-3 ">

                    <span class=" d-block h3">#</span>
                </div>
                <div class="measure-card p-3 ">

                    <span class=" d-block h3">#</span>
                </div>
            </div>
        </div>

        <div class="col p-2 d-md-none">
            <div class="mx-3">
                <div class="dropdown">
                    <button class="dropbtn">More options</button>
                    <div class="dropdown-content">
                        <a href="#">Account settings</a>
                        <a href="#">Sensors</a>
                        <a href="#">#</a>
                        <a href="#">#</a>
                        <a href="#">#</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-11 col-md-8 p-2 p-md-4 h-100 ">
            <div class="row">
                <div class="" id="accounts_settings_id">
                    <?php include("settings_components/comp_user_settings.php"); ?>
                </div>
                <div class="d-none" id="sesnors_list_id">
                    <?php include("settings_components/comp_sensors.php"); ?>
                </div>

            </div>
        </div>
    </div>
    </div>


    <?php include("../components/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
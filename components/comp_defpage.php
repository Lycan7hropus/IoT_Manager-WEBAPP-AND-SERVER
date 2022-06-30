<?php if (!isset($_SESSION)) {
    session_start();
} ?>

<div style="width:100%; margin-left:auto; margin-right:auto;">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8 ">
            <h6><?php echo "Hello " . $_SESSION['user_login']; ?></h6>
            <h1><?php echo $_SESSION['sensor_name']; ?> readings</h1>
        </div>
    </div>

    <div class="row justify-content-center bg-dark">
        <div class="col-11 col-md-8 py-5">
            <div class="card">
                <div class="measure-card rounded-3 p-3 m-2">
                    <span class=" d-block h4 measure-name ">Temperature </span>
                    <span class=" d-block h3"><?php $_SESSION['temp'] ?></span>
                </div>

                <div class="measure-card rounded-3  p-3 m-2 myCard">
                    <span class=" d-block h4 measure-name">Humidity </span>
                    <span class=" d-block h3"><?php $_SESSION['hum'] ?></span>
                </div>

                <div class="measure-card rounded-3  p-3 m-2">
                    <span class=" d-block h4 measure-name">Pressure </span>
                    <span class=" d-block h3"><?php $_SESSION['pres'] ?></span>
                </div>



            </div>
        </div>
    </div>
</div>
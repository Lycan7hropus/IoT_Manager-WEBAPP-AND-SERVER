<div style="width:100%; margin-left:auto; margin-right:auto;">

    <div class="row justify-content-center">
        <div class="col-11 col-md-8 ">

            <div class="row justify-content-left">
                <div class="col-11 col-md-8 ">
                    <h6><?php echo "Hello " . $_SESSION['user_login']; ?></h6>
                    <h1>Choose sensor to check more details</h1>
                </div>
            </div>



            <form method="post" class="mt-5" action="includes/sensor_formula.php">
                <div class="py-5">
                    <div class="row justify-content-left">

                        <?php

                        if ($sqlResult->num_rows > 0) {

                            while ($row = $sqlResult->fetch_assoc()) {
                                echo
                                '<div class="col-11 col-md-8 col-lg-4 my-2">
                                    <div class="card h-100">
                                        <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="' . $row['sensor_name'] . '">
                                        <span class="d-block h3">' . $row['sensor_name'] . '</span>
                                    </button>
                                </div>
                                </div>';
                            }
                        } else {
                            
                        }

                        ?>

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100">
                                <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="new_sensor">
                                    <span class="d-block h3">Add new sensor</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </form>



    </div>




</div>
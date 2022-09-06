<?php

$login = $_SESSION['user_login'];

include("config/dbconfig.php");



$sql = "SELECT sensor_name,sensor_id FROM sensors WHERE user_login='$login'";
$sqlResult = $conn->query($sql);

$rows = array();





?>



<div class="rounded-3 p-3 m-2 shadow">
    <h1>Sensors</h1>
    <!-- <form method="post" class="mt-5" action="../../includes/settings_action.php"> -->


    <?php

    if ($sqlResult->num_rows > 0) {

        while ($row = $sqlResult->fetch_assoc()) {
            echo '  
                <div class="container my-3">
                    <div class="row">
                        <div class="col-3 h5">
                           '  .  $row['sensor_name'] . '
                        </div>
                        <div class="col-3">
                           '.$row['sensor_id'] .'
                        </div>

                        <div class="col-6">
                            <button  class="btn btn-dark" id="id_btn_settings_' .  $row['sensor_name'] . '" onclick="delete_sensor(\'' . $row['sensor_name'] . '\')">Usun</button>
                        </div>
    
                    </div>
            </div>';
        }
    } else {
        echo "0 results";
    }


    ?>







    <!-- </form> -->
</div>
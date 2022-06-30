<div class="row justify-content-center">
    <div class="col-11 col-md-8 p-2 p-md-4 shadow ">
        <div class="">
            <div class="rounded-3 p-3 m-2">
                
                <form method="post" class="" action="includes/add_new_sensor_action.php">
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                        <h1 class="mb-5">Add new sensor</h1>
                            <!-- Sensor name input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="sensor_name_input" name="sensor_name" class="form-control" />
                                <label class="form-label" for="sensor_name_input">Sensor name</label>

                                <?php if (isset($_SESSION['e_email'])) {
                                    echo '<div class="text-danger">' . $_SESSION['e_email'] . '</div>';
                                    unset($_SESSION['e_email']);
                                }  ?>

                            </div>

                            <!-- Sensor id input -->
                            <div class="form-outline mb-4">
                                <input type="number" id="sensor_id_input" name="sensor_id" class="form-control" />
                                <label class="form-label" for="sensor_id_input">Sensor id</label>

                                <?php if (isset($_SESSION['e_login'])) {
                                    echo '<div class="text-danger">' . $_SESSION['e_login'] . '</div>';
                                    unset($_SESSION['e_login']);
                                }  ?>

                            </div>

                            <!-- Sensor password input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="sensor_password_input" name="sensor_password" class="form-control" />
                                <label class="form-label" for="sensor_password_input">Sensor password</label>
                            </div>

                            <!-- Submit button -->
                            <input type="submit" id="submit_input" name="submit" value="Save" class="btn btn-dark btn-block mb-4">

                        </div>

                        


                    </div>
            </div>

        </div>
    </div>
</div>
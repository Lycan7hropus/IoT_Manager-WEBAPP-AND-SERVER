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
                    <div class="row justify-content-center">

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100">
                                <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="Basement">
                                    <span class="d-block h3">Basement</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100">
                                <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="Kitchen">
                                    <span class="d-block h3">Kitchen</span>
                                </button>

                            </div>
                        </div>

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100 ">
                                <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="Garage">
                                    <span class="d-block h3">Garage</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100">
                            <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="Bathroom">
                                    <span class="d-block h3">Bathroom</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-11 col-md-8 col-lg-4 my-2">
                            <div class="card h-100">
                            <button name="mysubmitbutton" id="mysubmitbutton" type="submit" class="measure-card rounded-3 p-3 m-2 h-100 border-0 text-start" value="Outdoor">
                                    <span class="d-block h3">Outdoor</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </form>



    </div>




</div>
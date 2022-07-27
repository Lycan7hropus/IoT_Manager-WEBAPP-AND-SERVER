<div style="width:96%; margin-left:auto; margin-right:auto;">
    <div class="row justify-content-center my-5">

        <!-- ---------------TEMPERATURE CHART--------------- -->
        <div class="m-2 col-11 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm myChartCard">
            <div class="p-2">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="temp" id="option1t" autocomplete="off" onclick="myFun('HOUR','temp')">
                    <label class="btn btn-outline-secondary" for="option1t">1H</label>

                    <input type="radio" class="btn-check" name="temp" id="option2t" autocomplete="off" onclick="myFun('DAY','temp')">
                    <label class="btn btn-outline-secondary" for="option2t">24H</label>

                    <input type="radio" class="btn-check" name="temp" id="option3t" autocomplete="off" onclick="myFun('WEEK','temp')">
                    <label class="btn btn-outline-secondary" for="option3t">1W</label>

                    <input type="radio" class="btn-check" name="temp" id="option4t" autocomplete="off" onclick="myFun('MONTH','temp')">
                    <label class="btn  btn-outline-secondary" for="option4t">1M</label>
                </div>
            </div>
            <div class="myChart" id="TempChart">
                <div id="chartContainerTemp" style="height: 333px; width: 100%;"></div>
            </div>
        </div>

        <!-- ---------------HUMIDITY CHART--------------- -->
        <div class="m-2 col-11 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm myChartCard">
            <div class="p-2">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="hum" id="option1h" autocomplete="off" onclick="myFun('HOUR','hum',)">
                    <label class="btn btn-outline-secondary" for="option1h">1H</label>

                    <input type="radio" class="btn-check" name="hum" id="option2h" autocomplete="off" onclick="myFun('DAY','hum')">
                    <label class="btn btn-outline-secondary" for="option2h">24H</label>

                    <input type="radio" class="btn-check" name="hum" id="option3h" autocomplete="off" onclick="myFun('WEEK','hum')">
                    <label class="btn btn-outline-secondary" for="option3h">1W</label>

                    <input type="radio" class="btn-check" name="hum" id="option4h" autocomplete="off" onclick="myFun('MONTH','hum')">
                    <label class="btn  btn-outline-secondary" for="option4h">1M</label>
                </div>
            </div>
            <div class="myChart" id="TempChart">
                <div id="chartContainerHum" style="height: 333px; width: 100%;"></div>
            </div>
        </div>


        <!-- ---------------PRESSURE CHART--------------- -->
        <div class="m-2 col-11 col-md-8 col-lg-6 col-xl-4 card p-2 shadow-sm myChartCard">
            <div class="myChart" id="hum_chart_id">
                <div class="p-2">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <input type="radio" class="btn-check" name="pres" id="option1p" autocomplete="off" onclick="myFun('HOUR','pres')">
                        <label class="btn btn-outline-secondary" for="option1p">1H</label>

                        <input type="radio" class="btn-check" name="pres" id="option2p" autocomplete="off" onclick="myFun('DAY','pres')">
                        <label class="btn btn-outline-secondary" for="option2p">24H</label>

                        <input type="radio" class="btn-check" name="pres" id="option3p" autocomplete="off" onclick="myFun('WEEK','pres')">
                        <label class="btn btn-outline-secondary" for="option3p">1W</label>

                        <input type="radio" class="btn-check" name="pres" id="option4p" autocomplete="off" onclick="myFun('MONTH','pres')">
                        <label class="btn  btn-outline-secondary" for="option4p">1M</label>
                    </div>

                </div>
                <div id="chartContainerPres" style="height: 333px; width: 100%; "></div>
            </div>
        </div>

    </div>
</div>
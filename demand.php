<section class="section contact">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <!-- contact form start -->
                    <form class="form-horizontal" action="demand_process.php" class="row" method="post" style="margin-left: 65%;">
                        <!-- name -->
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Unit</label>
                            <br>
                            <select style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main" name="unit" placeholder="Unit">
                                <option>Selct Unit</option>
                                <option value="FD01">1 Signal Battalion</option>
                                <option value="FD02">2 Signal Battalion</option>
                                <option value="FD03">3 Signal Battalion</option>
                                <option value="FD04">4 Signal Battalion</option>
                                <option value="FD05">5 Signal Battalion</option>
                                <option value="ST01">Army Static Sig Bn</option>
                                <option value="ST11">SSC Jessore</option>
                                <option value="ST02">SSC Rangpur</option>
                                <option value="ST03">SSC Ghatail</option>
                                <option value="ST04">SSC Bogura</option>
                            </select>
                        </div>

                        <br>
                        <!-- email -->

                        <div class="col-lg-4">
                            <label for="exampleSelect1">Item</label>
                            <br>
                            <select style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main" name="item" placeholder="Item">
                                <option>Selct Item</option>
                                <option value="RD001001">Antenna Connector</option>
                                <option value="TL101035">Connecting Jack</option>
                                <option value="RR001001">Feeder Cable</option>
                                <option value="TL101034">Handset</option>
                                <option value="RR001006">RR Antenna</option>
                                <option value="RR001007">Switch</option>
                                <option value="TL101037">VLSM Card</option>
                                <option value="RD201004">Volume Knob</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Quantity</label>
                            <input style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" type="text" name="qty" class="form-control main" placeholder="Quantity" required>
                        </div>
                        <br>


                        <!-- phone -->
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Priority</label>
                            <br>
                            <select style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main" name="pri" placeholder="Item">
                                <option>Priority</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>

                        <br>

                        <!--blood group-->

                        <!-- Password Confirmation -->
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0" style="padding-top: 5%;">
                            <a href="#" class="btn btn-primary btn-block py-2" style="background-color:darkcyan;">
                                <!--<span class="font-weight-bold" name="save" >Create your account</span>-->
                                <input style="color:white; background-color: darkcyan; border: 0ch;" class="button" type="submit" name="save" value="Place Order">
                            </a>
                        </div>
                    </form>

                    <!-- contact form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
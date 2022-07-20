<script src="/assets/js/repair.js"></script>
<section class="section contact">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <!-- contact form start -->
                    <form class="form-horizontal" action="repair_process.php" class="row" method="post" style="margin-left: 65%;">


                        <div class="col-lg-4">
                            <label for="exampleSelect1">Equipment</label>
                            <br>
                            <select style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main" name="eqpt" placeholder="Equipment">
                                <option>Selct Equipment</option>
                                <option value="RD1010001">RD1010001</option>
                                <option value="TL1010001">TL1010001</option>
                                <option value="RR0010001">RR0010001</option>
                                <option value="RD2010001">RD2010001</option>
                                <option value="EX0010001">EX0010001</option>
                                <option value="RR0010002">RR0010002</option>
                            </select>
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
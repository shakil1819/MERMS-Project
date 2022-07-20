<?php

include "database.php";

$query = oci_parse($conn, "SELECT * from repair_status");
$query_run = oci_execute($query);



?>
<section class="section contact">
    <!-- container start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-form">
                    <!-- contact form start -->
                    <form class="form-horizontal" action="repair_status.php" class="row" method="post" style="margin-left: 35%; margin-top: 15%;">
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Order ID</label>
                            <br>
                            <input type="text" name="o_id" style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main">
                        </div>
                        <br>
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Shop</label>
                            <br>
                            <select style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main" name="shop">
                                <option>Present Shop</option>
                                <option value="SRND">R&I Shop</option>
                                <option value="S001">HF Shop 1</option>
                                <option value="S002">HF Shop 2</option>
                                <option value="S003">VHF Shop</option>
                                <option value="S004">TG SHop</option>
                                <option value="S005">PABX Shop</option>
                                <option value="S006">Crypto Shop</option>
                            </select>
                        </div>
                        <br>

                        <!-- phone -->
                        <div class="col-lg-4">
                            <label for="exampleSelect1">Remark</label>
                            <br>
                            <input type="text" name="state" style="height: 40px; width:400px; background-line:rgb(206, 22, 22) ;" class="form-control main">
                        </div>

                        <br>

                        <!--blood group-->

                        <!-- Password Confirmation -->
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0" style="padding-top: 5%;">
                            <a href="repair_status.php" class="btn btn-primary btn-block py-2" style="background-color:darkcyan;">
                                <!--<span class="font-weight-bold" name="save" >Create your account</span>-->
                                <input style="color:white; background-color: darkcyan; border: 0ch;" class="button" type="submit" name="save" value="Update">
                            </a>
                        </div>
                        <div class="form-group col-lg-12 mx-auto mb-0" style="padding-top: 5%;">
                            <a href="repair_info.php" class="btn btn-primary btn-block py-2" style="background-color:darkcyan;">
                                <!--<span class="font-weight-bold" name="save" >Create your account</span>-->
                                <input style="color:white; background-color: darkcyan; border: 0ch;" class="button" type="submit" name="cancel" value="Cancel">
                            </a>
                        </div>
                    </form>
                    <?php

                    include "database.php";

                    if (isset($_POST['save'])) {
                        $id = $_POST['o_id'];
                        $shop = $_POST['shop'];
                        $rmk = $_POST['state'];

                        $query = oci_parse($conn, "INSERT into repair_status values('$id','$shop','$rmk')");
                        $query_run = oci_execute($query);

                        if ($query_run) {
                            $_SESSION['success'] = 'Your Data is Updated';
                            header('location:repair_info.php');
                        } else {
                            $_SESSION['status'] = 'Your Data is Not Updated';
                            header('location:repair_info.php');
                        }
                    }
                    ?>


                    <!-- contact form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
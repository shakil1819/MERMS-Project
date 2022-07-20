<!DOCTYPE HTML>
<html>

<head>
    <?php
    //include('admin/includes/navbar.php');
    include "database.php";
    ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MCERMS/INVENTORY</title>
</head>

<body>

    <!--<div class="card-body">-->

    <br>
    <section class="cta" style="margin-top: 2%;">
        <div class="container">
            <div class="row">
                <form class="form-inline" action="eqpt.php" method="POST" style="margin-left: 5%;">
                    <div class="form-group">
                        <label class="col-lg-2 control-label"> Unit </label>
                        <div class="col-lg-2">
                            <select name="unit" class="form-control">
                                <option>Select Unit</option>
                                <option value="1 Signal Battalion">1 Signal Battalion</option>
                                <option value="2 Signal Battalion">2 Signal Battalion</option>
                                <option value="3 Signal Battalion">3 Signal Battalion</option>
                                <option value="4 Signal Battalion">4 Signal Battalion</option>
                                <option value="5 Signal Battalion">5 Signal Battalion</option>
                                <option value="ASSB">Army Static Sig Bn</option>
                                <option value="SSC Jessore">SSC Jessore</option>
                                <option value="SSC Rangpur">SSC Rangpur</option>
                                <option value="SSC Ghatail">SSC Ghatail</option>
                                <option value="SSC Bogura">SSC Bogura</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"> Model </label>
                        <div class="col-lg-2">
                            <select name="model" class="form-control">
                                <option>Select Model</option>
                                <option value="Alcatel IP Exchange">Alcatel IP Exchange</option>
                                <option value="Aselasan">Aselsan</option>
                                <option value="Barrett 2090">Barrett 2090</option>
                                <option value="Betel Desk Telephone">Betel Desk Telephone</option>
                                <option value="Itel Analog Telephone">Itel Analog Telephone</option>
                                <option value="Leonardo M24">Leonardo M24</option>
                                <option value="MiTel IP Exchange">MiTel IP Exchange</option>
                                <option value="QMac-90 ">QMac 90</option>
                                <option value="RDX 300">RDX 300</option>
                                <option value="TR-2400">TR 2400</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"> Type </label>
                        <div class="col-lg-2">
                            <select name="type" class="form-control">
                                <option>Select Type</option>
                                <option value="RR">Radio Relay</option>
                                <option value="HF Radio">HF Radio</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <input type="submit" name="view" value="View All" class="btn btn-primary">
                        </div>
                    </div>

                    <div class="form-group">
                        <a class="home" href="http://localhost/Project/admin/index.php"><i class="fas fa-home fa-2xl"></i></a>
                    </div>


                </form>



                <div class="col-md-12" style="margin-top: 2%;">
                    <div class="cta-block">

                        <table class="table table-hover" style="border: 2px solid black;">
                            <thead>
                                <tr class="bg-info">
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Unit</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Model</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Type</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">ID</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($_POST['submit'])) {
                                    $unit = $_POST['unit'];
                                    $model = $_POST['model'];
                                    $type = $_POST['type'];

                                    $query = oci_parse($conn, "SELECT unit_name, Model_name, type, equipment_id from model join equipment using(model_id) join unit using(unit_id) where unit_name='$unit' or model_name='$model' or type='$type'");
                                    $query_result = oci_execute($query);
                                ?>

                                    <?php

                                    while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
                                    ?>

                                        <tr>
                                        <tr>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[0]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[1]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[2]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[3]; ?></td>
                                        </tr>

                                <?php
                                    }
                                }

                                ?>

                                <?php
                                if (isset($_POST['view'])) {
                                    $query = oci_parse($conn, "SELECT unit_name, Model_name, type, equipment_id from model join equipment using(model_id) join unit using(unit_id)");
                                    $query_result = oci_execute($query);
                                    // $numrows=oci_fetch_all($query,$res);
                                    //echo '<h4> Total Rows:'.$numrows.'</h4>';

                                ?>

                                    <?php

                                    while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {

                                    ?>
                                        <tr>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[0]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[1]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[2]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[3]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                <?php
                                }
                                ?>



                            </tbody>
                        </table>


                    </div>
                </div>


            </div>
        </div>
    </section>




</body>

</html>
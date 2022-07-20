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
                <form class="form-inline" action="personnel.php" method="POST" style="margin-left: 5%;">
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <select name="trade" class="form-control">
                                <option>Select Trade</option>
                                <option value="TCM-1">TCM-1</option>
                                <option value="TCM-2">TCM-2</option>
                                <option value="TCM-3">TCM-3</option>
                                <option value="USM">USM</option>
                                <option value="WM-1">WM-1</option>
                                <option value="WM-2">WM-2</option>
                                <option value="WM-3">WM-3</option>
                                < </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <select name="shop" class="form-control">
                                <option>Select Shop</option>
                                <option value="SRND">R&I Shop</option>
                                <option value="S001">HF Shop 1</option>
                                <option value="S002">HF Shop 2</option>
                                <option value="S003">VHF Shop</option>
                                <option value="S004">TG SHop</option>
                                <option value="S005">PABX Shop</option>
                                <option value="S006">Crypto Shop</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-2">
                            <select name="dist" class="form-control">
                                <option>Select District</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Pabna">Pabna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Tangail">Tangail</option>
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
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">ID</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Name</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Trade</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Shop</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">District</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Mobile No</th>
                                    <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Service Length</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($_POST['submit'])) {
                                    $trade = $_POST['trade'];
                                    $shop = $_POST['shop'];
                                    $dist = $_POST['dist'];

                                    $query = oci_parse($conn, "select pers_id, first_name ||' '||last_name, trade, shop_name, Dist, mob_no, (ROUND((SYSDATE-DOJ)/365))||' Years' from technician join shop using(shop_id) where Trade='$trade' or Shop_id='$shop' or dist='$dist'");
                                    $query_result = oci_execute($query);
                                ?>

                                    <?php

                                    while (($row = oci_fetch_array($query, OCI_BOTH + OCI_RETURN_NULLS)) != false) {
                                    ?>

                                        <tr>
                                        <tr>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[0]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[1]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[2]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[3]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[4]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[5]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[6]; ?></td>
                                        </tr>

                                <?php
                                    }
                                }

                                ?>

                                <?php
                                if (isset($_POST['view'])) {
                                    $query = oci_parse($conn, "SELECT * from pers_info_view");
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
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[4]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[5]; ?></td>
                                            <td style="text-align:center; border: 2px solid black; "><?php echo $row[6]; ?></td>
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
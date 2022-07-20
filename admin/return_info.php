<?php
include('includes/header.php');
include('includes/navbar.php');
//include('security.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="personusername" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="personemail" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="personpassword" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="personconfirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="personregisterbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Demand Information

            </h6>
        </div>

        <div class="card-body">
            <?php

            /*if(isset($_SESSION['success']) && $_SESSION['success']!='')
  {
    echo '<h2 class="bg-primary">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['status']) && $_SESSION['status']!='')
  {
    echo '<h2 class="bg-info">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['status']);
  }*/



            $query = oci_parse($connection, "SELECT * from demand_info");
            $query_run = oci_execute($query);



            ?>


            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Demand ID</th>
                            <th>Item Name</th>
                            <th>Demand Quantity</th>
                            <th>Priority</th>
                            <th>Available</th>
                            <th>Verdict </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        //if(oci_fetch_all($query,$res)>0)        

                        // {

                        while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {

                        ?>

                            <tr>

                                <td><?php echo $row['UNIT_NAME']; ?></td>

                                <td><?php echo $row['DEMAND_ID']; ?></td>

                                <td><?php echo $row['ITEM_NAME']; ?></td>

                                <td><?php echo $row['DEMAND_QUANTITY']; ?></td>

                                <td><?php echo $row['DEMAND_PRIORITY']; ?></td>

                                <td><?php echo $row['HELD_QUANTITY']; ?></td>

                                <td>

                                    <form action="issue_info.php" method="post">
                                        <input type="hidden" name="approved_id" value="<?php echo $row['DEMAND_ID']; ?>">

                                        <button type="submit" name="approved_btn" class="btn btn-success"> APPROVED</button>


                                    </form>
                                    <form action="issue_info.php" method="post">
                                        <input type="hidden" name="pending_id" value="<?php echo $row['DEMAND_ID']; ?>">

                                        <button type="submit" name="pending_btn" class="btn btn-danger"> PENDING </button>

                                    </form>

                                </td>

                            </tr>

                        <?php

                        }

                        //}

                        //else {

                        // echo "No Record Found";

                        //}

                        ?>

                    </tbody>

                </table>



            </div>

        </div>

    </div>



</div>

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
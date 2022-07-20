<?php

include "database.php";
include "session.php";
//include('security.php');
?>

<!-- DataTales Example -->
<div class="container">


    <div class="row">
        <?php
        if (isset($_POST['update_btn'])) {
            $id = $_POST['update_id'];
            $query = oci_parse($conn, "Select * from repair_status where order_id='$id'");
            $query_run = oci_execute($query);
            while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
        ?>


                <div class="col-lg-6">

                    <form class="form-horizontal" action="repair_status.php" method="POST">

                        <div class="col-lg-4">
                            <label>Present Shop</label>
                            <input type="hidden" name="update_id" value="<?php echo $row['ORDER_ID'] ?>">
                        </div>

                        <div class="col-lg-4">
                            <label>Present Shop</label>
                            <input type="text" name="edit_shop" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="col-lg-4">
                            <label>Remark </label>
                            <input type="text" name="edit_rmk" class="form-control" placeholder="Enter Email">
                        </div>

                        <a href="register.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
                    </form>
                </div>
        <?php
            }
        }
        ?>




        <?php
        if (isset($_POST['complete_btn'])) {
            $id = $_POST['complete_id'];
            $query = oci_parse($conn, "Select * from return where order_id='$id' ");
            $query_run = oci_execute($query);
            while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
        ?>

                <div class="modal-body">

                    <form action="return_process.php" method="POST">
                        <input type="text" name="complete_id" value="<?php echo $row['ORDER_ID'] ?>">

                        <div class="form-group">
                            <label>Remark</label>
                            <input type="state" name="state" value="<?php echo $row['STATE'] ?>" class="form-control" placeholder="Add Remark">
                        </div>

                        <a href="repair_info.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="complete_btn" class="btn btn-primary"> Complete </button>
                    </form>
                </div>
        <?php
            }
        }
        ?>



    </div>

</div>



<?php
include('admin/includes/scripts.php');

?>
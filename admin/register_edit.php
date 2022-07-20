<?php

include('includes/header.php');
include('includes/navbar.php');
//include('security.php');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">


  <div class="card-body">
    <?php
    if (isset($_POST['edit_btn'])) {
      $id = $_POST['edit_id'];
      $query = oci_parse($connection, "Select * from admin where admin_id='$id' ");
      $query_run = oci_execute($query);
      while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
    ?>


        <div class="modal-body">

          <form action="code.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $row['ADMIN_ID'] ?>">
            <div class="form-group">
              <label> Name </label>
              <input type="text" name="edit_username" value="<?php echo $row['NAME'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Rank</label>
              <input type="text" name="edit_rank" value="<?php echo $row['RANK'] ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="edit_password" value="<?php echo $row['PASSWORD'] ?>" class="form-control" placeholder="Enter Password">
            </div>

            <a href="register.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
          </form>
      <?php
      }
    }
      ?>



      <?php
      if (isset($_POST['edit_unit_btn'])) {
        $id = $_POST['edit_id'];
        $query = oci_parse($connection, "Select * from unit where unit_id='$id' ");
        $query_run = oci_execute($query);
        while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
      ?>

          <div class="modal-body">

            <form action="code.php" method="POST">
              <div class="form-group">
                <label> ID </label>
                <input type="text" name="edit_unit_id" value="<?php echo $row['UNIT_ID'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_unitname" value="<?php echo $row['UNIT_NAME'] ?>" class="form-control" placeholder="Edit Name">
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="edit_loc" value="<?php echo $row['LOC'] ?>" class="form-control" placeholder="Edit Location">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['UNIT_PASSWORD'] ?>" class="form-control" placeholder="Edit Password">
              </div>

              <a href="units.php" class="btn btn-danger">CANCEL</a>
              <button type="submit" name="update_unit_btn" class="btn btn-primary"> Update </button>
            </form>
        <?php
        }
      }
        ?>

        <?php
        if (isset($_POST['edit_shop_btn'])) {
          $id = $_POST['edit_shop'];
          $query = oci_parse($connection, "Select * from shop where shop_id='$id' ");
          $query_run = oci_execute($query);
          while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
        ?>

            <div class="modal-body">

              <form action="code.php" method="POST">

                <div class="modal-body">

                  <div class="form-group">
                    <label>Shop ID</label>
                    <input type="text" name="edit_shopid" value="<?php echo $row['SHOP_ID'] ?>" class="form-control" placeholder="Edit shop ID">
                  </div>
                  <div class="form-group">
                    <label>Shop Name</label>
                    <input type="text" name="edit_shopname" value="<?php echo $row['SHOP_NAME'] ?>" class="form-control" placeholder="Enter shop Name">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="edit_password" value="<?php echo $row['SHOP_PASSWORD'] ?>" class="form-control" placeholder="Enter Password">
                  </div>



                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="update_shop_btn" class="btn btn-primary">Update</button>
                </div>
              </form>

          <?php
          }
        }
          ?>

          <?php
          if (isset($_POST['edit_event_btn'])) {
            $id = $_POST['edit_id'];
            $query = oci_parse($connection, "Select * from event where event_id='$id' ");
            $query_run = oci_execute($query);
            while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {
          ?>





              <div class="modal-body">

                <form action="code.php" method="POST">
                  <input type="hidden" name="edit_id" value="<?php echo $row['EVENT_ID'] ?>">
                  <div class="form-group">
                    <label> Event Name </label>
                    <input type="text" name="edit_name" value="<?php echo $row['EVENT_NAME'] ?>" class="form-control" placeholder="Enter Event Name">
                  </div>
                  <div class="form-group">
                    <label>Event Location</label>
                    <input type="text" name="edit_location" value="<?php echo $row['EVENT_LOCATION'] ?>" class="form-control" placeholder="Enter Event Location">
                  </div>
                  <div class="form-group">
                    <label>Event Start Date</label>
                    <input type="text" name="edit_starttime" value="<?php echo $row['EVENT_STARTDATE'] ?>" class="form-control" placeholder="Enter Start Date">
                  </div>
                  <div class="form-group">
                    <label>Event End Date</label>
                    <input type="text" name="edit_endtime" value="<?php echo $row['EVENT_ENDDATE'] ?>" class="form-control" placeholder="Enter End Date">
                  </div>

                  <a href="events.php" class="btn btn-danger">CANCEL</a>
                  <button type="submit" name="update_event_btn" class="btn btn-primary"> Update </button>
                </form>
            <?php
            }
          }
            ?>

              </div>

            </div>

          </div>



        </div>

        <!-- /.container-fluid -->



        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>
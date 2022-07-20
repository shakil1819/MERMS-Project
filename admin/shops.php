<?php
include('includes/header.php');
include('includes/navbar.php');

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Shop Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label>Shop ID</label>
            <input type="text" name="shopid" class="form-control" placeholder="Enter shop ID">
          </div>
          <div class="form-group">
            <label>Shop Name</label>
            <input type="text" name="shopname" class="form-control" placeholder="Enter shop Name">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>

          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="register_shop_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Shops
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add Shop
        </button>
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



      $query = oci_parse($connection, "select * from shop");
      $query_run = oci_execute($query);



      ?>


      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Shop ID</th>
              <th>Name</th>
              <th>Password</th>
              <th>Edit</th>
              <th>Delete</th>

            </tr>
          </thead>
          <tbody>

            <?php

            //if(oci_fetch_all($query,$res)>0)        

            // {

            while (($row = oci_fetch_array($query, OCI_BOTH)) != false) {

            ?>

              <tr>

                <td><?php error_reporting(0);
                    if ($row['SHOP_ID'] == "") echo "none";
                    else echo $row[0]; ?></td>

                <td><?php echo $row[1] ?></td>

                <td><?php error_reporting(0);
                    if ($row['SHOP_PASSWORD'] == "") echo "none";
                    else  echo $row[2]; ?></td>

                <td>

                  <form action="register_edit.php" method="post">

                    <input type="hidden" name="edit_shop" value="<?php echo $row['SHOP_ID']; ?>">

                    <button type="submit" name="edit_shop_btn" class="btn btn-success">EDIT</button>

                  </form>

                </td>

                <td>

                  <form action="code.php" method="post">

                    <input type="hidden" name="delete_shop" value="<?php echo $row['SHOP_ID']; ?>">

                    <button type="submit" name="delete_shop_btn" class="btn btn-danger">DELETE</button>

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
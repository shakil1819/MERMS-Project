<!DOCTYPE HTML>
<html>

<head>
  <title>MCERMS/INVENTORY</title>
</head>

<body>

  <!--<div class="card-body">-->
  <?php
  include "database.php";
  //$query=oci_parse($conn,"select  blood_bank_blood_group , blood_bank_blood_type ,max(blood_bank_total_no) from blood_bank group by blood_bank_blood_group,blood_bank_blood_type order by blood_bank_blood_group");
  $query = oci_parse($conn, "select * from cbt_store_view ");
  $query_result = oci_execute($query);
  // $numrows=oci_fetch_all($query,$res);
  //echo '<h4> Total Rows:'.$numrows.'</h4>';

  ?>
  <br>
  <section class="cta">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cta-block">


            <table class="table table-hover" style="border: 2px solid black;">
              <thead>
                <tr class="bg-info">
                  <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">ID</th>
                  <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Name</th>
                  <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Model</th>
                  <th scope="col" style="text-align:center ;border: 2px solid black; background:linear-gradient(to right, #096b4f, #096b5f); color:white;">Quantity</th>
                </tr>
              </thead>
              <tbody>
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
                if (isset($_POST['delete_item_btn'])) {
                  $id = $_POST['delete_item'];
                  $query = oci_parse($connection, "Delete from cbt_store_view where ID='$id'");
                  $query_run = oci_execute($query);
                  if ($query_run) {
                    $_SESSION['success'] = 'Your Data is Deleted';
                    header('location:register.php');
                  } else {
                    $_SESSION['status'] = 'Your Data is Not Deleted';
                    header('location:register.php');
                  }
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
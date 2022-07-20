<?php
include('includes/header.php');
include('includes/navbar.php');
//include('security.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Admin: </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select admin_id from admin order by admin_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user-pen fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Units: </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select unit_id from unit order by unit_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-fire fa-2x text-gray-300"></i>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Shops:</div>


              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select shop_id from shop order by shop_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>

            </div>
            <div class="col-auto">
              <i class="fa-solid fa-screwdriver-wrench fa-2x text-gray-300"></i>
            </div>


          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Employee:</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select pers_id from technician order by pers_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user fa-2x text-gray-300"></i>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Repair Order:</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select order_id from repair_order order by order_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user fa-2x text-gray-300"></i>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Demand Order:</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                require 'dbconfig.php';

                $query = oci_parse($connection, "Select demand_id from demand_order order by demand_id");
                $query_run = oci_execute($query);
                $numrows = oci_fetch_all($query, $res);
                echo '<h2>' . $numrows . '</h2>';

                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-user fa-2x text-gray-300"></i>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
  include('includes/scripts.php');
  ?>
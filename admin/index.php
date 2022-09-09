<?php
include('includes/header.php');
include('includes/navbar.php');
include __DIR__ . '/includes/db.php';

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php

                $query = "SELECT id FROM register ORDER BY id";
                $query_run = mysqli_query($mysqli, $query);
                $row = mysqli_num_rows($query_run);
                echo '<center> ' . $row . '</center>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Departments</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php

                $query = "SELECT department_id FROM department ORDER BY department_id";
                $query_run = mysqli_query($mysqli, $query);
                $row = mysqli_num_rows($query_run);
                echo '<center> ' . $row . '</center>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Employees</div>

              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  <?php

                  $query = "SELECT employee_id FROM employee ORDER BY employee_id";
                  $query_run = mysqli_query($mysqli, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<center> ' . $row . '</center>';
                  ?>

                </div>
              </div>
              <div class="col">

                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

              </div>

            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Leaves</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php

                $query = "SELECT leave_type_id FROM leaves ORDER BY leave_type_id";
                $query_run = mysqli_query($mysqli, $query);
                $row = mysqli_num_rows($query_run);
                echo '<center> ' . $row . '</center>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>
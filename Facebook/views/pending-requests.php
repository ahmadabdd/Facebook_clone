<?php
session_start();
if(!(isset($_SESSION['email']))) {
  header('location: ../login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Facebook - Requests
  </title>
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="bg-Default">
  <div class="wrapper bg-Default">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container bg-Default">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>      
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../php/log-out.php">Logout</a>
              </li>
              <li class="nav-item">
                <input class="" id="full_name_hide"  type="text" value="<?php  echo $_SESSION['full_name'] ?>">
              </li>
              <li class="nav-item">
                <input class=""  type="text" id="user_id_hide"  value="<?php  echo $_SESSION['user_id'] ?>">
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    <div class="sidebar bg-Default" >
      <div class="sidebar-wrapper bg-info">
        <div class="logo text-center mt-2">
          <h5> Welcome <?php  echo $_SESSION['full_name'] ?></h4>
        </div>
        <ul class="nav">
          <li>
            <a href="profile.php">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="friends.php">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>Friends</p>
            </a>
          </li>
          <li class="active">
            <a href="pending-requests.php">
              <i class="tim-icons icon-badge"></i>
              <p>Pending requests</p>
            </a>
          </li>
          <li>
            <a href="blocked.php">
              <i class="tim-icons icon-simple-remove"></i>
              <p>Blocked</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="notifications.php" class="nav-link">
              <i class="tim-icons icon-bell-55 inline"></i> notifications
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h3 class="card-title">Friend requests</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" id="table_container">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="requests_table">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          Name
                        </th>
                        <th>
                          Accept
                        </th>
                        <th>
                          Decline
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
     <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/pending_requests.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
  </div>
  
</body>

</html>

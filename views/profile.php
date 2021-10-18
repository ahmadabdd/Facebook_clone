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
    Facebook - Profile
  </title>
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="bg-Default">
  <div class="wrapper bg-Default">
    <div class="sidebar" >
      <div class="sidebar-wrapper bg-info">
        <div class="logo text-center mt-2">
          <h5> Welcome <?php  echo $_SESSION['full_name'] ?></h4>
        </div>
        <ul class="nav">
          <li class="active"> 
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
          <li>
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
          <li>
            <a href="notifications.php" class="nav-link">
              <i class="tim-icons icon-bell-55 inline"></i> notifications
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
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
                <input class="" id="user_id_hide"  type="text" value="<?php  echo $_SESSION['user_id'] ?>">
              </li>
              <li class="nav-item">
                <input class=""  type="text" id="full_name_hide"  value="<?php  echo $_SESSION['full_name'] ?>">
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar-->
      <div class="content">
        <div class="row">
          <div class="col-12">
          <div class="content">
            <div class="row">
              <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" id="full_name" class="form-control" placeholder="Name" value="<?php echo $_SESSION['full_name'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" id="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 pr-md-1">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" id="phone" class="form-control" placeholder="Phone" value="<?php echo $_SESSION['phone'] ?>">
                            </div>
                          </div>
                      </form>
                    </div>
                    <div class="card-footer">
                      <button type="button" onClick="editProfileInfo()" id="update_info" class="btn btn-fill btn-success">Save</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="../assets/img/emilyz.jpg" alt="...">
                      <h5 class="title"><?php echo $_SESSION['full_name']  ?></h5>
                    </a>
                    <p class="description">
                      Ceo/Co-Founder
                    </p>
                  </div>
                </p>
                <div class="card-description">
                  Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
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
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Creative Tim
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
          <div class="copyright">
            created by Ahmad Abd
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div>
     <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/profile.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
  </div>
  
</body>

</html>

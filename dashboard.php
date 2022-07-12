<?php

require_once 'config/db.php';
session_start();

// check teams already login or not
if (!isset($_SESSION['team_id'])) {
  header("Location: login.php");
}

$sql = "SELECT * FROM calendar_contents";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// count all content
$sqlAllContent = "SELECT COUNT(*) AS total FROM calendar_contents";
$stmtAllContent = $pdo->prepare($sqlAllContent);
$stmtAllContent->execute();
$resultAllContent = $stmtAllContent->fetch(PDO::FETCH_ASSOC);

// count all category
$sqlAllCategory = "SELECT COUNT(*) AS total FROM calendar_content_categories";
$stmtAllCategory = $pdo->prepare($sqlAllCategory);
$stmtAllCategory->execute();
$resultAllCategory = $stmtAllCategory->fetch(PDO::FETCH_ASSOC);

// count all pillar
$sqlAllPillar = "SELECT COUNT(*) AS total FROM content_pillars";
$stmtAllPillar = $pdo->prepare($sqlAllPillar);
$stmtAllPillar->execute();
$resultAllPillar = $stmtAllPillar->fetch(PDO::FETCH_ASSOC);

// count all team
$sqlAllTeam = "SELECT COUNT(*) AS total FROM teams";
$stmtAllTeam = $pdo->prepare($sqlAllTeam);
$stmtAllTeam->execute();
$resultAllTeam = $stmtAllTeam->fetch(PDO::FETCH_ASSOC);

// count status Plan on content
$sqlPlan = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Plan'";
$stmtPlan = $pdo->prepare($sqlPlan);
$stmtPlan->execute();
$resultPlan = $stmtPlan->fetch(PDO::FETCH_ASSOC);

// count status Ongoing on content
$sqlOngoing = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Ongoing'";
$stmtOngoing = $pdo->prepare($sqlOngoing);
$stmtOngoing->execute();
$resultOngoing = $stmtOngoing->fetch(PDO::FETCH_ASSOC);

// count status Need Review on content
$sqlNeedReview = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Need Review'";
$stmtNeedReview = $pdo->prepare($sqlNeedReview);
$stmtNeedReview->execute();
$resultNeedReview = $stmtNeedReview->fetch(PDO::FETCH_ASSOC);

//count status Revision on content
$sqlRevision = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Revision'";
$stmtRevision = $pdo->prepare($sqlRevision);
$stmtRevision->execute();
$resultRevision = $stmtRevision->fetch(PDO::FETCH_ASSOC);

// count status Approved on content
$sqlApproved = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Approved'";
$stmtApproved = $pdo->prepare($sqlApproved);
$stmtApproved->execute();
$resultApproved = $stmtApproved->fetch(PDO::FETCH_ASSOC);

// count status Published on content
$sqlPublished = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Published'";
$stmtPublished = $pdo->prepare($sqlPublished);
$stmtPublished->execute();
$resultPublished = $stmtPublished->fetch(PDO::FETCH_ASSOC);

// count status Cancel on content
$sqlCancel = "SELECT COUNT(*) AS total FROM calendar_contents WHERE status = 'Cancel'";
$stmtCancel = $pdo->prepare($sqlCancel);
$stmtCancel->execute();
$resultCancel = $stmtCancel->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Content Calendar Management</title>

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->

  <!-- CSS Libraries -->
  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/logo.png">
  <!-- Boostrap 4.6-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Icon BoxIcons -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- Fullcalendar libary -->
  <link rel='stylesheet' href='assets/css/fullcalendar.min.css' />
  <script src='assets/js/jquery.min.js'></script>
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/js/fullcalendar.min.js'></script>
  <!-- Locate Indonesia -->
  <script src='assets/js/id.js'></script>
  <script>
    // variable global untuk menyimpan data konten
    const _events = {};
    const _session = {team_id: <?= $_SESSION['team_id']; ?>, role: <?= $_SESSION['role_id']; ?>};
  </script>
  <script src="fc.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/>
  <script type="text/javascript" src="assets/js/datatables.min.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-stisla.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <!-- Navbar -->
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            <?php if ($_SESSION['role_id']==1):?>
              <img alt="image" src="assets/images/avatar/avatar-5.png" class="rounded-circle mr-1">
            <?php elseif ($_SESSION['role_id']==2):?>
              <img alt="image" src="assets/images/avatar/avatar-3.png" class="rounded-circle mr-1">
            <?php else:?>
              <img alt="image" src="assets/images/avatar/avatar-2.png" class="rounded-circle mr-1">
            <?php endif;?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['name'] ?> </div></a>
          </li>
        </ul>
      </nav>
      <!-- Sidebar -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">CalendarM</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Main Menu</li>
              <li class="active"><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class=""><a class="nav-link" href="calendar.php"><i class="far fa-calendar"></i> <span>Calendar</span></a></li>
              <li class="menu-header">Settings</li>
              <li><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Users</span></a></li>
              <li><a class="nav-link text-danger" href="javascript:logout();"><i class="fas fa-sign-out-alt" style="transform: scale(-1, 1);"></i> <span>Logout</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="section-body">
            <!-- Statistic -->
            <div class="row">
              <div class="col-12">
                <!-- Status -->
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-title">Status Statistics
                      <!-- <div class="dropdown d-inline">
                        <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">July</a>
                        <ul class="dropdown-menu dropdown-menu-sm">
                          <li class="dropdown-title">Select Month</li>
                          <li><a href="#" class="dropdown-item">January</a></li>
                          <li><a href="#" class="dropdown-item">February</a></li>
                          <li><a href="#" class="dropdown-item">March</a></li>
                          <li><a href="#" class="dropdown-item">April</a></li>
                          <li><a href="#" class="dropdown-item">May</a></li>
                          <li><a href="#" class="dropdown-item">June</a></li>
                          <li><a href="#" class="dropdown-item active">July</a></li>
                          <li><a href="#" class="dropdown-item">August</a></li>
                          <li><a href="#" class="dropdown-item">September</a></li>
                          <li><a href="#" class="dropdown-item">October</a></li>
                          <li><a href="#" class="dropdown-item">November</a></li>
                          <li><a href="#" class="dropdown-item">December</a></li>
                        </ul>
                      </div> -->
                    </div>
                    <div class="card-stats-items">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultPlan['total']?></div>
                        <div class="card-stats-item-label badge badge-plan text-white">Plan</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultOngoing['total']?></div>
                        <div class="card-stats-item-label badge badge-ongoing text-white">Ongoing</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultNeedReview['total']?></div>
                        <div class="card-stats-item-label badge badge-need-review text-white">Need Review</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultRevision['total']?></div>
                        <div class="card-stats-item-label badge badge-revision text-white">Revision</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultApproved['total']?></div>
                        <div class="card-stats-item-label badge badge-approved text-white">Approved</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultPublished['total']?></div>
                        <div class="card-stats-item-label badge badge-published text-white">Published</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count"><?=$resultCancel['total']?></div>
                        <div class="card-stats-item-label badge badge-cancel text-white">Cancel</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                    </div>
                    <div class="card-body"></div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Contents</h4>
                    </div>
                    <div class="card-body">
                      <?= $resultAllContent['total']?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Categories</h4>
                    </div>
                    <div class="card-body">
                      <?= $resultAllCategory['total']?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pillars</h4>
                    </div>
                    <div class="card-body">
                      <?= $resultAllPillar['total']?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Users</h4>
                    </div>
                    <div class="card-body">
                      <?= $resultAllTeam['total']?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                      <div class="btn-group">
                        <a href="#" class="btn btn-primary">Week</a>
                        <a href="#" class="btn">Month</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myChart" style="display: block; width: 789px; height: 478px;" class="chartjs-render-monitor" width="789" height="478"></canvas>
                    <div class="statistic-details mt-sm-4">
                      <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                        <div class="detail-value">$243</div>
                        <div class="detail-name">Today's Sales</div>
                      </div>
                      <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                        <div class="detail-value">$2,902</div>
                        <div class="detail-name">This Week's Sales</div>
                      </div>
                      <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                        <div class="detail-value">$12,821</div>
                        <div class="detail-name">This Month's Sales</div>
                      </div>
                      <div class="statistic-details-item">
                        <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                        <div class="detail-value">$92,142</div>
                        <div class="detail-name">This Year's Sales</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Recent Activities</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                      <li class="media">
                        <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-1.png" alt="avatar" width="50">
                        <div class="media-body">
                          <div class="float-right text-primary">Now</div>
                          <div class="media-title">Farhan A Mujib</div>
                          <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                        </div>
                      </li>
                      <li class="media">
                        <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-2.png" alt="avatar" width="50">
                        <div class="media-body">
                          <div class="float-right">12m</div>
                          <div class="media-title">Ujang Maman</div>
                          <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                        </div>
                      </li>
                      <li class="media">
                        <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-3.png" alt="avatar" width="50">
                        <div class="media-body">
                          <div class="float-right">17m</div>
                          <div class="media-title">Rizal Fakhri</div>
                          <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                        </div>
                      </li>
                      <li class="media">
                        <img class="mr-3 rounded-circle" src="../assets/img/avatar/avatar-4.png" alt="avatar" width="50">
                        <div class="media-body">
                          <div class="float-right">21m</div>
                          <div class="media-title">Alfa Zulkarnain</div>
                          <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                        </div>
                      </li>
                    </ul>
                    <div class="text-center pt-1 pb-1">
                      <a href="#" class="btn btn-primary btn-lg btn-round">
                        View All
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div><a href="#">k-ardliyan</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
  <script src="assets/js/jquery.nicescroll.min.js"></script>
  <script src="../assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Add Swal -->
  <script src="assets/js/sweetalert2@11.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="fcb.js"></script>

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script>
    var statistics_chart = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(statistics_chart, {
      type: 'line',
      data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
          label: 'Statistics',
          data: [640, 387, 530, 302, 430, 270, 488],
          borderWidth: 5,
          borderColor: '#6777ef',
          backgroundColor: 'transparent',
          pointBackgroundColor: '#fff',
          pointBorderColor: '#6777ef',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              stepSize: 150
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2
            }
          }]
        },
      }
    });
  </script>
</body>
</html>

<?php $pdo = null; ?>
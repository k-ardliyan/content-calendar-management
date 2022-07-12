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

// count status Published with last week use day on content
$sqlPublishedLastWeek = "SELECT COUNT(*) AS total, DAYNAME(updated_at) AS date_publish FROM calendar_contents WHERE status = 'Published' AND DATE_SUB(NOW(), INTERVAL 7 DAY) <= updated_at GROUP BY date_publish;";
$stmtPublishedLastWeek = $pdo->prepare($sqlPublishedLastWeek);
$stmtPublishedLastWeek->execute();
$resultPublishedLastWeek = $stmtPublishedLastWeek->fetchAll(PDO::FETCH_ASSOC);

// count status Published with month on content
$sqlPublishedMonth = "SELECT COUNT(*) AS total, MONTHNAME(updated_at) AS date_publish FROM calendar_contents WHERE status = 'Published' AND DATE_SUB(NOW(), INTERVAL 1 YEAR) <= updated_at GROUP BY date_publish;";
$stmtPublishedMonth = $pdo->prepare($sqlPublishedMonth);
$stmtPublishedMonth->execute();
$resultPublishedMonth = $stmtPublishedMonth->fetchAll(PDO::FETCH_ASSOC);

// recent activity user from calendar_contents join teams
$sqlRecentActivity = "SELECT cc.name content_name, cc.created_at content_created_at, t.name team_name, t.role_id team_role
                      FROM calendar_contents cc JOIN teams t ON cc.team_id = t.id ORDER BY cc.id DESC LIMIT 5";
$stmtRecentActivity = $pdo->prepare($sqlRecentActivity);
$stmtRecentActivity->execute();
$resultRecentActivity = $stmtRecentActivity->fetchAll(PDO::FETCH_ASSOC);

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
                <div class="card h-100">
                  <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                      <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="btn-group" role="presentation">
                          <a class="btn active" id="pills-week-tab" data-toggle="pill" href="#pills-week" role="tab" aria-controls="pills-week" aria-selected="true">Week</a>
                          <a class="btn" id="pills-month-tab" data-toggle="pill" href="#pills-month" role="tab" aria-controls="pills-month" aria-selected="false">Month</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-week" role="tabpanel" aria-labelledby="pills-week-tab">
                        <canvas id="myChartWeek" style="display: block; width: 789px; height: 478px;" class="chartjs-render-monitor" width="789" height="478"></canvas>
                      </div>
                      <div class="tab-pane fade" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                        <canvas id="myChartMonth" style="display: block; width: 789px; height: 478px;" class="chartjs-render-monitor" width="789" height="478"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card h-100">
                  <div class="card-header">
                    <h4>Recent Contents</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                      <?php foreach($resultRecentActivity as $value):?>
                        <li class="media">
                          <?php if($value['team_role']==3):?>
                            <img class="mr-3 rounded-circle" src="assets/images/avatar/avatar-2.png" alt="avatar" width="50">
                          <?php elseif($value['team_role']==2):?>
                            <img class="mr-3 rounded-circle" src="assets/images/avatar/avatar-3.png" alt="avatar" width="50">
                          <?php else:?>
                            <img class="mr-3 rounded-circle" src="assets/images/avatar/avatar-5.png" alt="avatar" width="50">
                          <?php endif;?>
                          <div class="media-body">
                            <div class="float-right text-primary">
                              <?php
                                // date format for recent activity
                                $date = date_create($value['content_created_at']);
                                $date = date_format($date, 'd M Y H:i');
                                echo $date;
                              ?>
                            </div>
                            <div class="media-title"><?=$value['team_name']?></div>
                            <span class="text-small text-muted"><?=$value['content_name']?></span>
                          </div>
                        </li>
                      <?php endforeach;?>
                    </ul>
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
    // Statistic Chart Week
    var arrayStatsWeek = <?php echo json_encode($resultPublishedLastWeek); ?>;
    var arrayStatsWeekObject = {};
    for (var i = 0; i < arrayStatsWeek.length; i++) {
      arrayStatsWeekObject[arrayStatsWeek[i]['date_publish']] = arrayStatsWeek[i]['total'];
    }

    var statistics_chart_week = document.getElementById("myChartWeek").getContext('2d');
    var myChartWeek = new Chart(statistics_chart_week, {
      type: 'line',
      data: {
        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
          label: 'Total Publish',
          data: [
            arrayStatsWeekObject.Sunday,
            arrayStatsWeekObject.Monday,
            arrayStatsWeekObject.Tuesday,
            arrayStatsWeekObject.Wednesday,
            arrayStatsWeekObject.Thursday,
            arrayStatsWeekObject.Friday,
            arrayStatsWeekObject.Saturday
          ],
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
              display: true,
              drawBorder: false,
            },
            ticks: {
              stepSize: 150
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2,
              display: true
            }
          }]
        },
      }
    });

    // Statistic Chart Month
    var arrayStatsMonth = <?php echo json_encode($resultPublishedMonth); ?>;
    var arrayStatsMonthObject = {};
    for (var i = 0; i < arrayStatsMonth.length; i++) {
      arrayStatsMonthObject[arrayStatsMonth[i]['date_publish']] = arrayStatsMonth[i]['total'];
    }
    
    var statistics_chart_month = document.getElementById("myChartMonth").getContext('2d');
    var myChartMonth = new Chart(statistics_chart_month, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
          label: 'Total Publish',
          data: [
            arrayStatsMonthObject.January,
            arrayStatsMonthObject.February,
            arrayStatsMonthObject.March,
            arrayStatsMonthObject.April,
            arrayStatsMonthObject.May,
            arrayStatsMonthObject.June,
            arrayStatsMonthObject.July,
            arrayStatsMonthObject.August,
            arrayStatsMonthObject.September,
            arrayStatsMonthObject.October,
            arrayStatsMonthObject.November,
            arrayStatsMonthObject.December
          ],
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
              display: true,
              drawBorder: false,
            },
            ticks: {
              stepSize: 150
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2,
              display: true
            }
          }]
        },
      }
    });
  </script>
</body>
</html>

<?php $pdo = null; ?>
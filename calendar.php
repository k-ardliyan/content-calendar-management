<?php 
  
require_once 'config/db.php';

session_start();

// check teams already login or not
if (!isset($_SESSION['team_id'])) {
  header("Location: login.php");
}

$sql = "SELECT * FROM calendar_content_categories ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$category = isset($_GET['c']) ? $_GET['c'] : $result[0]['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
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
  <title>Content Calendar Management</title>
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
            <a href="#">CalendarM</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">CM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Main Menu</li>
              <li class=""><a class="nav-link" href="dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="active"><a class="nav-link" href="#"><i class="far fa-calendar"></i> <span>Calendar</span></a></li>
              <li class="menu-header">Settings</li>
              <li><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Users</span></a></li>
              <li><a class="nav-link text-danger" href="javascript:logout();"><i class="fas fa-sign-out-alt" style="transform: scale(-1, 1);"></i> <span>Logout</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header justify-content-between">
                    <h4>Calendar</h4>
                    <div>
                      <ul class="navbar-nav flex-row align-items-center" style="grid-gap: 12px;">
                        <li class="nav-item active">
                            <select class="form-select nav-link px-2 py-1" id="dataByCategory" onclick="checkDataCategory()" style="border-radius: 20px;">
                            <?php foreach($result as $row): ?>
                              <option value="<?= $row['id'] ?>" <?= $row['id'] == $category ? 'selected':'' ?> ><?= $row['name']?></option>
                            <?php endforeach ?>
                            </select>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#kontenModal" onclick="checkDataPillar()">
                            <i class="bi-plus"></i>Konten
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pillarModal" onclick="dataPillar()">
                            <i class="bi-plus"></i>Pillar
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#kategoriModal" onclick="dataCategory()">
                            <i class="bi-plus"></i>Kategori
                            </button>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="calendar"></div>
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

  <!-- All Modals -->
  <?php 

  require_once 'views/add-konten-modal.php';
  require_once 'views/add-pillar-modal.php';
  require_once 'views/add-kategori-modal.php'; 
  require_once 'views/edit-konten-modal.php';
  require_once 'views/edit-pillar-modal.php';
  require_once 'views/edit-kategori-modal.php';
  require_once 'views/detail-konten-modal.php';
  
  ?>

  <!-- General JS Scripts -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
  <script src="assets/js/jquery.nicescroll.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Add Swal -->
  <script src="assets/js/sweetalert2@11.js"></script>
  <script src="fcb.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  
  <!-- Page Specific JS File -->


</body>

</html>

<?php $pdo = null;?>
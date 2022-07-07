<?php 
  
require_once 'config/db.php';

session_start();

// check teams already login or not
if (!isset($_SESSION['team_id'])) {
  header("Location: login.php");
}

$result = $mysqli->query("SELECT * FROM calendar_contents ORDER BY id");
$resultKategori = $mysqli->query("SELECT * FROM calendar_content_categories");

foreach ($resultKategori as $row) {
    $dataKategori[] = $row;
}

$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : $dataKategori[0]['id'];


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
  </script>
  <script src="fc.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/sl-1.4.0/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/sl-1.4.0/datatables.min.js"></script>
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
            <img alt="image" src="assets/images/avatar/avatar-1.png" class="rounded-circle mr-1">
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
              <li class=""><a class="nav-link" href="#"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
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
                            <select class="form-select nav-link px-2 py-1" id="loadKategoriKalendar" onclick="checkDataCategory()" style="border-radius: 20px;">
                            <!-- loadKategoriKalendar -->
                            <?php foreach($resultKategori as $row): ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $kategori ? 'selected':'' ?> ><?= $row['name']?></option>
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
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#kategoriModal" onclick="dataKategori()">
                            <i class="bi-plus"></i>Kategori
                            </button>
                        </li>
                        <li class="nav-item">
                            <form action="config/auth.php" method="POST">
                            <button type="submit" name="logout" value="logout" class="btn btn-danger">Logout
                            </button>
                            </form>
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
          Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Add Swal -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="fcb.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  
  <!-- Page Specific JS File -->


</body>

</html>
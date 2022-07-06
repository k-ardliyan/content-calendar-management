<?php 
  
require_once 'config/db.php';

// $_SESSION['team_id'] = 1;
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Content Calendar Management</title>
</head>
<body>
  <div class="">
    <!-- Menu Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">Calendar Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto align-items-center" style="grid-gap: 12px;">
          <li class="nav-item active">
            <select class="form-select nav-link" id="loadKategoriKalendar" onclick="checkDataCategory()">
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
            <form method="POST" action="config/auth.php">
              <button type="submit" name="logout" value="logout" class="btn btn-danger">Logout
              </button>
            </form>
          </li>
          </li>
      </div>
    </nav>
    <!-- Kalender -->
    <div class="px-3">
      <div id="calendar"></div>
    </div>
    <!-- Footer -->
    <footer class="text-muted text-center pt-3 px-3">Created by k-ardliyan | Powered by Gamelab Indonesia</footer>
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

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Add Swal -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="fcb.js"></script>

</body>

</html>
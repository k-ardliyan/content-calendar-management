<?php

require_once 'config/db.php';
session_start();

// check teams already login or not
if (!isset($_SESSION['team_id'])) {
  header("Location: login.php");
}

if($_SESSION['role_id']==3) {
  header("Location: index.php");
}

// get all teams
$sql = "SELECT id, name, email, role_id FROM teams ORDER BY id ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
              <li class=""><a class="nav-link" href="dashboard.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class=""><a class="nav-link" href="calendar.php"><i class="far fa-calendar"></i> <span>Calendar</span></a></li>
              <li class="menu-header">Settings</li>
              <li class="active"><a class="nav-link" href="#"><i class="far fa-user"></i> <span>Users</span></a></li>
              <li><a class="nav-link text-danger" href="javascript:logout();"><i class="fas fa-sign-out-alt" style="transform: scale(-1, 1);"></i> <span>Logout</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users</h1>
          </div>
          <div class="section-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table" id="data-users">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $i = 1; 
                          foreach($teams as $team):?>
                          <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $team['name']?></td>
                            <td><?= $team['email']?></td>
                            <td>
                              <form id="teamRoles<?=$team['id']?>" class="btn-group">
                                <input type="hidden" id="idTeam<?=$team['id']?>" value="<?=$team['id']?>">
                                <select id="selectRole<?=$team['id']?>" class="custom-select custom-select-sm rounded-0">
                                  <option value="1" <?php echo $team['role_id']==1 ? 'selected' : '' ?> >Admin</option>
                                  <option value="2" <?php echo $team['role_id']==2 ? 'selected' : '' ?> >Reviewer</option>
                                  <option value="3" <?php echo $team['role_id']==3 ? 'selected' : '' ?> >User</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i></button>
                              </form>
                            </td>
                          </tr>
                          <?php $i++; endforeach;?>
                        </tbody>
                      </table>
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
  <script>
    $(document).ready(function() {
      $('#data-users').DataTable();
    });
    // Sementara
    <?php foreach ($teams as $team): ?>
    $('#teamRoles<?=$team['id']?>').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: 'crud/update.php',
        type: 'POST',
        dataType: 'json',
        data: {
          id: $('#idTeam<?=$team['id']?>').val(),
          role: $('#selectRole<?=$team['id']?>').val(),
          updateRole: true
        },
        success: function(data){
          if(data.status == 200) {
            // Swal Success with Progress Loading
            Swal.fire({
              title: 'Success!',
              icon: 'success',
              text: data.message,
              type: 'success',
              showConfirmButton: false,
              timer: 1000
            });
          } else {
            // Swal Error with Progress Loading
            Swal.fire({
              title: 'Error!',
              icon: 'error',
              text: data.message,
              type: 'error',
              showConfirmButton: false,
              timer: 1000
            });
          }
        }
      });
    });
    <?php endforeach; ?>
  </script>

</body>
</html>

<?php $pdo = null; ?>
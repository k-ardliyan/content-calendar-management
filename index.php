<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boostrap 4.6-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Icon Fontawesome -->
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
  <!-- Fullcalendar libary -->
  <link rel='stylesheet' href='assets/css/fullcalendar.min.css' />
  <script src='assets/js/jquery.min.js'></script>
  <script src='assets/js/moment.min.js'></script>
  <script src='assets/js/fullcalendar.min.js'></script>
  <script src='assets/js/id.js'></script>

  <?php 
  
  require_once 'config.php';

  $sqlQuery = $mysqli->query("SELECT * FROM calendar_contents ORDER BY id");
  
  $_SESSION['team_id'] = 1;
  session_start();



  ?>
  <script>
    $(document).ready(function () {
      // show data onclick pillarModal
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek'
        },
        themeSystem: 'bootstrap4',
        timeFormat: 'H:mm',
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        events: {
          url: 'data.php',
        },
        eventRender: function (event, element, view) {
            // if (event.allDay === 'true') {
            //     event.allDay = true;
            // } else {
            //     event.allDay = false;
            // }
        },
        eventClick: function (event) {
          console.log(event);
          $('input#inputNama').val(event.cc_name);
          $('input#inputUrl').val(event.url);
          $('textarea#inputContent').val(event.content);
          $('textarea#inputCopywriting').val(event.copywriting);
          $('select#inputStatus').append('<option selected value="' + event.status + '">' + event.status + '</option>');
          $('select#inputPillar').append('<option selected value="' + event.cp_name + '">' + event.cp_name + '</option>');
          $('input#inputTanggal').val(event.date);
          $('input#inputJam').val(event.time);
          if (event.revision=="") {
            $('textarea#inputRevisi').addClass('d-none');
            $('label[for="inputRevisi"]').addClass('d-none');
          } else {
            $('textarea#inputRevisi').val(event.revision);
          }
          $('#viewKontenModal').modal();
        },
      });

    });
  </script>

  <link rel="stylesheet" href="assets/css/style.css">
  <title>Content Calendar Management</title>
</head>
<body>
  <div class="container">
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
            <select class="form-select nav-link" aria-label="Default select example">
              <option selected>Pilih Kategori</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#kontenModal">
              <i class="bi-plus"></i>Konten
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pillarModal">
              <i class="bi-plus"></i>Pillar
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#kategoriModal" onclick="getKategori()">
              <i class="bi-plus"></i>Kategori
            </button>
          </li>
          </li>
      </div>
    </nav>
    <!-- Kalender -->
    <div id="calendar"></div>
    <footer class="text-muted text-center pt-3">Created by k-ardliyan | Powered by Gamelab Indonesia</footer>
  </div>

  <!-- Any Modals -->
  <!-- Modal Add Konten -->
  <div class="modal fade" id="kontenModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kontenModalLabel">Tambah Konten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control" id="inputNama" placeholder="ex: Membuat Konten Bootcamp">
            </div>
            <div class="form-group">
              <label for="inputUrl">URL</label>
              <input type="text" class="form-control" id="inputUrl">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContent">Content</label>
                <textarea name="inputContent" id="inputContent" cols="28" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCopywriting">Copywriting</label>
                <textarea name="inputCopywriting" id="inputCopywriting" cols="28" rows="5"
                  class="form-control"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputStatus">Status</label>
                <select name="inputStatus" id="inputStatus" class="form-control">
                  <option selected>Pilih..</option>
                  <option value="Plan" class="badge-plan">Plan</option>
                  <option value="Ongoing" class="badge-ongoing">Ongoing</option>
                  <option value="Need Review" class="badge-need-review">Need Review</option>
                  <option value="Revision" class="badge-revision">Revision</option>
                  <option value="Approved" class="badge-approved">Approved</option>
                  <option value="Published" class="badge-published">Published</option>
                  <option value="Cancel" class="badge-cancel">Cancel</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPillar">Pillar</label>
                <select name="inputPillar" id="inputPillar" class="form-control">
                  <option selected>Pilih..</option>
                  <option value="News">News</option>
                  <option value="Meme">Meme</option>
                  <option value="Sharing">Sharing</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" name="inputTanggal" id="inputTanggal" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="inputJam">Jam Posting</label>
                <input type="time" name="inputJam" id="inputJam" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="inputRevisi">Revisi</label>
              <textarea name="inputResivi" id="inputRevisi" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal View Konten -->
  <div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kontenModalLabel">View Konten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control-plaintext" id="inputNama" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-group">
              <label for="inputUrl">URL</label>
              <input type="text" class="form-control-plaintext" id="inputUrl" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContent">Content</label>
                <textarea name="inputContent" id="inputContent" cols="28" rows="5" class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCopywriting">Copywriting</label>
                <textarea name="inputCopywriting" id="inputCopywriting" cols="28" rows="5"
                  class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputStatus">Status</label>
                <select name="inputStatus" id="inputStatus" class="form-control-plaintext" disabled>
                  <option>Pilih..</option>
                  <option selected value="Plan" class="badge-plan">Plan</option>
                  <option value="Ongoing" class="badge-ongoing">Ongoing</option>
                  <option value="Need Review" class="badge-need-review">Need Review</option>
                  <option value="Revision" class="badge-revision">Revision</option>
                  <option value="Approved" class="badge-approved">Approved</option>
                  <option value="Published" class="badge-published">Published</option>
                  <option value="Cancel" class="badge-cancel">Cancel</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPillar">Pillar</label>
                <select name="inputPillar" id="inputPillar" class="form-control-plaintext" disabled>
                  <option>Pilih..</option>
                  <option selected value="News">News</option>
                  <option value="Meme">Meme</option>
                  <option value="Sharing">Sharing</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" name="inputTanggal" id="inputTanggal" class="form-control-plaintext" disabled>
              </div>
              <div class="form-group col-md-6">
                <label for="inputJam">Jam Posting</label>
                <input type="time" name="inputJam" id="inputJam" class="form-control-plaintext" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputRevisi">Revisi</label>
              <textarea name="inputResivi" id="inputRevisi" cols="30" rows="5" class="form-control-plaintext"
                disabled>Kosong</textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning">Edit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Add Pillar -->
  <div class="modal fade" id="pillarModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="pillarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pillarModalLabel">Pillar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="textx" name="inputPillar" id="inputPillar" class="form-control"
                  placeholder="ex: News, Meme">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-success w-100"><i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Pillar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Add Kategori -->
  <div class="modal fade" id="kategoriModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kategoriModalLabel">Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addKategori">
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="textx" name="inputKategori" id="inputKategori" class="form-control"
                  placeholder="ex: Facebook, Instagram">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-success w-100"><i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm text-white" onclick="editKategori(id)"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script>
    $('#addKategori').submit(function(e) {
      e.preventDefault();
      var kategori = $('#inputKategori').val();
      $.ajax({
        url: 'addKategori.php',
        type: 'POST',
        data: {
          inputKategori: kategori
        },
        success: function(data) {
          data = JSON.parse(data);
          if(data.status == 200){
            alert(data.message);
          }else{
            alert(data.message);
          }
          console.log(data);
        }
      });
    });
    var getKategori = function() {
      $.ajax({
        url: 'getKategori.php',
        type: 'GET',
        success: function(data) {
          data = JSON.parse(data);
          if(data.status == 200){
            $('#kategoriModal').modal('show');
            data.data.forEach(d => {
              <td onclick="editKategori(d.id)">
                <button type="button" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
              </td>
            });

          }else{
            alert(data.message);
          }
          console.log(data);
        }
      });
    }
  </script>
</body>

</html>
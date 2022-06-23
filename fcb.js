// Tambah Kategori
$('#addKategori').submit(function (e) {
  e.preventDefault();
  var kategori = $('#inputKategori').val();
  $.ajax({
    url: 'add-kategori.php',
    type: 'POST',
    data: {
      inputKategori: kategori
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.status == 200) {
        console.log(data);
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Kategori Telah Ditambahkan',
          showConfirmButton: false,
          timer: 1500
        })
        dataKategori();
        $('form').trigger('reset');
      } else {
        console.log(data);
      }
    }
  });
});

// Edit Kategori
var editKategori = function (id, name) {
  var timerInterval
  Swal.fire({
    title: 'Loading',
    timer: 500,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  })
  setTimeout(() => {
    $('#kategoriModalLabel').text('Edit Kategori');
    $('form#addKategori').addClass('d-none');
    $('#dataKategori').addClass('d-none');
    $('form#editKategori').removeClass('d-none');
    $('input#idKategori').val(id);
    $('input#updateKategori').val(name);
  }, 500);
  $('#editKategori').submit(function (e) {
    e.preventDefault();
    var id = $('#idKategori').val();
    var kategori = $('#updateKategori').val();
    $.ajax({
      url: 'edit-kategori.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idKategori: id,
        nameKategori: kategori,
      },
      success: function (data) {
        if (data.status == 200) {
          setTimeout(() => {
            $('form#addKategori').removeClass('d-none');
            $('#dataKategori').removeClass('d-none');
            $('form#editKategori').addClass('d-none');
            $('#kategoriModalLabel').text('Kategori');
            dataKategori();
            $('form').trigger('reset');
          }, 1000)
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Edit Kategori',
            showConfirmButton: false,
            timer: 1000
          })
          console.log(data);
        } else {
          console.log(data);
        }
      }
    });
  });
};

// Hapus Kategori
var delKategori = function (id) {
  $.ajax({
    url: 'del-kategori.php',
    type: 'POST',
    data: {
      delKategori: id
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.status == 200) {
        console.log(data);
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Kategori Dihapus',
          showConfirmButton: false,
          timer: 1500
        });
        dataKategori();
      } else {
        alert(data.message);
      }
    }
  });
}

// Refresh Data Kategori
var dataKategori = function () {
  $.ajax({
    url: 'data-kategori.php',
    type: 'GET',
    success: function (data) {
      $('#dataKategori').html(data);
      $('#tableKategori').DataTable({
        'pageLength': 4,
      });
    }
  });
}

// Tambah Pillar
$('#addPillar').submit(function (e) {
  e.preventDefault();
  var pillar = $('#inputPillar').val();
  $.ajax({
    url: 'add-pillar.php',
    type: 'POST',
    data: {
      inputPillar: pillar
    },
    dataType: 'json',
    success: function (data) {
      if (data.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Pillar Telah Ditambahkan',
          showConfirmButton: false,
          timer: 1500
        })
        dataPillar();
        $('form').trigger('reset');
      } else {
        console.log(data);
      }
    }
  })
})

// Hapus Pillar
var delPillar = function (id) {
  $.ajax({
    url: 'del-pillar.php',
    type: 'POST',
    data: {
      delPillar: id
    },
    dataType: 'json',
    success: function (data) {
      if (data.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Pillar Dihapus',
          showConfirmButton: false,
          timer: 1500
        });
        dataPillar();
      } else {
        alert(data.message);
      }
    }
  })
}

// Edit Pillar
var editPillar = function (id, name) {
  var timerInterval
  Swal.fire({
    title: 'Loading',
    timer: 500,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft()
      }, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  })
  setTimeout(() => {
    $('#pillarModalLabel').text('Edit Pillar');
    $('form#addPillar').addClass('d-none');
    $('#dataPillar').addClass('d-none');
    $('form#editPillar').removeClass('d-none');
    $('input#idPillar').val(id);
    $('input#updatePillar').val(name);
  }, 500);
  $('#editPillar').submit(function (e) {
    e.preventDefault();
    var id = $('#idPillar').val();
    var pillar = $('#updatePillar').val();
    $.ajax({
      url: 'edit-pillar.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idPillar: id,
        namePillar: pillar,
      },
      success: function (data) {
        if (data.status == 200) {
          setTimeout(() => {
            $('form#addPillar').removeClass('d-none');
            $('#dataPillar').removeClass('d-none');
            $('form#editPillar').addClass('d-none');
            $('#pillarModalLabel').text('Pillar');
            dataPillar();
            $('form').trigger('reset');
          }, 1000)
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Edit Pillar',
            showConfirmButton: false,
            timer: 1000
          })
          console.log(data);
        } else {
          console.log(data);
        }
      }
    });
  })
}

// Refresh Data Pillar
var dataPillar = function () {
  $.ajax({
    url: 'data-pillar.php',
    type: 'GET',
    success: function (data) {
      $('#dataPillar').html(data);
      $('#tablePillar').DataTable({
        'pageLength': 4,
      });
    }
  });
}
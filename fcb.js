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
    $('#kategoriModal').modal('hide');
    $('#kategoriEditModal').modal('show');
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
            $('#kategoriEditModal').modal('hide');
            $('#kategoriModal').modal('show');
            dataKategori();
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
    $('#pillarModal').modal('hide');
    $('#pillarEditModal').modal('show');
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
            $('#pillarModal').modal('show');
            $('#pillarEditModal').modal('hide');
            dataPillar();
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

// Load Data Kategori di index
$('#loadKategoriKalendar').on('change', function(e) {
  var load = $('#loadKategoriKalendar').val();
  window.location.href = "?kategori=" + load;
})

// Tambah Konten
$('#addKonten').submit(function (e) {
  e.preventDefault();
  var nama = $('#inputNama').val();
  var url = $('#inputUrl').val();
  var content = $('#inputContent').val();
  var copywriting = $('#inputCopywriting').val();
  var status = $('#selectStatus').val();
  var tanggal = $('#inputTanggal').val();
  var jam = $('#inputJam').val();
  var revisi = $('#inputRevisi').val();
  var pillar = $('#selectPillar').val();
  // get kategori from ?kategori=
  var kategori = window.location.search.split('=')[1];
  var team = $('#inputTeam').val();
  $.ajax({
    url: 'add-konten.php',
    type: 'POST',
    data: {
      inputNama: nama,
      inputUrl: url,
      inputContent: content,
      inputCopywriting: copywriting,
      selectStatus: status,
      inputTanggal: tanggal,
      inputJam: jam,
      inputRevisi: revisi,
      selectPillar: pillar,
      inputTeam: team,
      inputKategori: kategori,
    },
    dataType: 'json',
    success: function (data) {
      if (data.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: 'Konten Telah Ditambahkan',
          showConfirmButton: false,
          timer: 1500
        })
        $('#kontenModal').modal('hide');
        $('#calendar').fullCalendar('refetchEvents');
      } else {
        console.log(data);
      }
    }
  })
})

// Hapus Konten
var delKonten = function (id) {

}

// Edit Konten
var editKonten = function (){}
/**
 * Set Defualt Date and Time
 */

var setDefaultDate = function () {
  var date = new Date();
  // day and month with leading zeros
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
  if (day < 10) {
    day = '0' + day;
  }
  if (month < 10) {
    month = '0' + month;
  }
  var date = year + '-' + month + '-' + day;
  $('#inputTanggal').val(date);
}

var setDefaultTime = () => {
  var date = new Date();
  var hours = date.getHours();
  if (hours < 10) {
    hours = '0' + hours;
  }
  var minutes = date.getMinutes();
  if (minutes < 10) {
    minutes = '0' + minutes;
  }
  var time = hours + ':' + minutes;
  $('#inputJam').val(time);
}

// Memunculkan tooltip di view modal konten
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Show/Hide Textarea Revisi di Add Konten
$('#selectStatus').change(function () {
  var status = $('#selectStatus').val();
  if (status == 'Revision') {
    $('#inputRevisiContainer').removeClass('d-none');
  } else {
    $('#inputRevisiContainer').addClass('d-none');
  }
})

// Show/Hide Textarea Revisi di Edit Konten
$('#updateStatus').change(function () {
  var status = $('#updateStatus').val();
  if (status == 'Revision') {
    $('#updateRevisiContainer').removeClass('d-none');
  } else {
    $('#updateRevisiContainer').addClass('d-none');
  }
})

/**
 * All Create Function
 */

// Add Categori
$('#addKategori').submit(function (e) {
  e.preventDefault();
  $.ajax({
    url: 'crud/create.php',
    type: 'POST',
    dataType: 'json',
    data: {
      nameCategory: $('#inputKategori').val(),
      addCategory: true
    },
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
        dataKategori();
        $('form').trigger('reset');
      } else {
        // swal.fire gives the error message
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  });
});

// Tambah Pillar
$('#addPillar').submit(function (e) {
  e.preventDefault();
  $.ajax({
    url: 'crud/create.php',
    type: 'POST',
    dataType: 'json',
    data: {
      namePillar: $('#inputPillar').val(),
      addPillar: true
    },
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
        dataPillar();
        $('form').trigger('reset');
      } else {
        // swal.fire gives the error message
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
})

// Add Content
$('#addKonten').submit(function (e) {
  e.preventDefault();
  var name = $('#inputNama').val();
  var content = $('#inputContent').val();
  var copywriting = $('#inputCopywriting').val();
  // allow nama, content, copywriting use quotes
  var name = name.replace(/'/g, "''");
  var name = name.replace(/"/g, '""');
  var content = content.replace(/'/g, "''");
  var content = content.replace(/"/g, '""');
  var copywriting = copywriting.replace(/'/g, "''");
  var copywriting = copywriting.replace(/"/g, '""');
  $.ajax({
    url: 'crud/create.php',
    type: 'POST',
    dataType: 'json',
    data: {
      name: name,
      url: $('#inputUrl').val(),
      content: content,
      copywriting: copywriting,
      status: $('#selectStatus').val(),
      date: $('#inputTanggal').val(),
      time: $('#inputJam').val(),
      revision: $('#inputRevisi').val(),
      pillar: $('#selectPillar').val(),
      team: $('#inputTeam').val(),
      category: window.location.search.split('=')[1],
      addContent: true
    },
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
        $('#kontenModal').modal('hide');
        // reset form
        $('form').trigger('reset');
        $('#calendar').fullCalendar('refetchEvents');
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
})

/**
 * All Update Function
 */

// Update Category
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
    $.ajax({
      url: 'crud/update.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idCategory: $('#idKategori').val(),
        nameCategory: $('#updateKategori').val(),
        updateCategory: true
      },
      success: function (response) {
        if (response.status == 200) {
          setTimeout(() => {
            $('#kategoriEditModal').modal('hide');
            $('#kategoriModal').modal('show');
            dataKategori();
          }, 1000)
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: response.message,
            showConfirmButton: false,
            timer: 1000
          })
        } else {
          // swal.fire gives the error message
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: response.message,
            showConfirmButton: false,
            timer: 1000
          })
        }
      }
    });
  });
};

// Update Pillar
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
    $.ajax({
      url: 'crud/update.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idPillar: $('#idPillar').val(),
        namePillar: $('#updatePillar').val(),
        updatePillar: true
      },
      success: function (response) {
        if (response.status == 200) {
          setTimeout(() => {
            $('#pillarModal').modal('show');
            $('#pillarEditModal').modal('hide');
            dataPillar();
          }, 1000)
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: response.message,
            showConfirmButton: false,
            timer: 1000
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: response.message,
            showConfirmButton: false,
            timer: 1000
          })
        }
      }
    });
  })
}

// Update Content
var editKonten = function () {
  checkDataPillar();
  if(_event.status == 'Revision') {
    $('#updateRevisiContainer').removeClass('d-none');
  } else {
    $('#updateRevisiContainer').addClass('d-none');
  }
  // Loading Saat Klik Edit
  var timerInterval
  Swal.fire({
    title: 'Loading',
    timer: 500,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading()
      const b = Swal.getHtmlContainer().querySelector('b')
      timerInterval = setInterval(() => {}, 100)
    },
    willClose: () => {
      clearInterval(timerInterval)
    }
  })
  setTimeout(() => {
    $('#idKonten').val(_event.id_calendar_content);
    $('#updateNama').val(_event.cc_name);
    $('#updateUrl').val(_event.url_content);
    $('#updateContent').val(_event.content);
    $('#updateCopywriting').val(_event.copywriting);
    $('#updateStatus').val(_event.status);
    $('#updateTanggal').val(_event.date);
    $('#updateJam').val(_event.time);
    $('#updateRevisi').val(_event.revision);
    $('#updatePillarContent').val(_event.content_pillar_id);  
    $('#viewKontenModal').modal('hide');
    $('#kontenEditModal').modal('show').css('overflow-y', 'auto');
  }, 500);
  
  $('#editKontenForm').submit(function (e) {
    e.preventDefault();
    var id = $('#idKonten').val();
    var nama = $('#updateNama').val();
    var url = $('#updateUrl').val();
    var content = $('#updateContent').val();
    var copywriting = $('#updateCopywriting').val();
    var status = $('#updateStatus').val();
    var tanggal = $('#updateTanggal').val();
    var jam = $('#updateJam').val();
    var revisi = $('#updateRevisi').val();
    var pillar = $('#updatePillarContent').val();
    var team = $('#updateTeam').val();
    var kategori = window.location.search.split('=')[1];
    // allow nama, content, copywriting use quotes
    var nama = nama.replace(/'/g, "''");
    var nama = nama.replace(/"/g, '""');
    var content = content.replace(/'/g, "''");
    var content = content.replace(/"/g, '""');
    var copywriting = copywriting.replace(/'/g, "''");
    var copywriting = copywriting.replace(/"/g, '""');
    $.ajax({
      url: 'crud/edit-konten.php',
      type: 'POST',
      dataType: 'json',
      data: {
        idKonten: id,
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
      success: function (data) {
        if (data.status == 200) {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Konten Telah Diubah',
            showConfirmButton: false,
            timer: 1500
          })
          $('#kontenEditModal').modal('hide');
          $('#calendar').fullCalendar('refetchEvents');
        } else {
          console.log(data);
        }
      }
    })
  })
}

/**
 * All Function Delete
 */

// Delete Category
var delKategori = function (id) {
  $.ajax({
    url: 'crud/delete.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idCategory: id,
      deleteCategory: true
    },
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        });
        dataKategori();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        });
      }
    }
  });
}

// Delete Pillar
var delPillar = function (id) {
  $.ajax({
    url: 'crud/delete.php',
    type: 'POST',
    dataType: 'json',
    data: {
      idPillar: id,
      deletePillar: true
    },
    success: function (response) {
      if (response.status == 200) {
        Swal.fire({
          icon: 'success',
          title: 'Sukses',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        });
        dataPillar();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: response.message,
          showConfirmButton: false,
          timer: 1500
        });
      }
    }
  })
}

// Delete Content
var delKonten = function (id) {
  // check condition delete or no with swal
  Swal.fire({
    title: 'Apakah Anda Yakin?',
    text: "Konten ini akan dihapus!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Hapus!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: 'crud/delete.php',
        type: 'POST',
        dataType: 'json',
        data: {
          idContent: id,
          deleteContent: true
        },
        success: function (response) {
          if (response.status == 200) {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: response.message,
              showConfirmButton: false,
              timer: 1500
            });
            $('#calendar').fullCalendar('refetchEvents');
            $('#viewKontenModal').modal('hide');
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: response.message,
              showConfirmButton: false,
              timer: 1500
            });
          }
        }
      })
    }
  })
}

/**
 * All Function Refresh Data
 */

// Refresh Data Category on Modal
var dataKategori = function () {
  $.ajax({
    url: 'crud/read.php',
    type: 'POST',
    data: {
      readCategoryModal: true
    },
    success: function (data) {
      $('#dataKategori').html(data);
      $('#tableKategori').DataTable({
        'pageLength': 5,
        'lengthMenu': [5, 10, 20, 30, 40, 50],
        'searching': false,
      });
    }
  });
}

// Refresh Data Pillar on Modal
var dataPillar = function () {
  $.ajax({
    url: 'crud/read.php',
    type: 'POST',
    data: {
      readPillarModal: true
    },
    success: function (data) {
      $('#dataPillar').html(data);
      $('#tablePillar').DataTable({
        'pageLength': 5,
        'lengthMenu': [5, 10, 20, 30, 40, 50],
        'searching': false,
      });
    }
  });
}

// Load Data Pillar di Add/Edit Modal Konten
var checkDataPillar = () => {
  checkURL();
  setDefaultDate();
  setDefaultTime();
  $.ajax({
    url: 'crud/read.php',
    type: 'POST',
    data: {
      readPillarContent: true
    },
    success: function (data) {
      $('#selectPillar').html(data);
      $('#updatePillarContent').html(data);
    }
  })
}

// Check Parameter URL Found ?kategori or not, if not pushState to ?kategori
var checkURL = function () {
  var url = window.location.href;
  var urlSplit = url.split('?');
  var idCategory = $('#loadKategoriKalendar').val()
  if (urlSplit[1] == undefined) {
    window.history.pushState('', '', '?kategori=' + idCategory);
  }
}

// Refresh Halaman Setelah Memilih Kategori
var checkDataCategory = () => {
  checkURL();
  $.ajax({
    url: 'crud/read.php',
    type: 'POST',
    data: {
      readCategoryCalendar: true
    },
    success: function (data) {
      $('#loadKategoriKalendar').html(data);
      // Search Paramater URL
      var url = new URL(window.location.href);
      var searchParams = new URLSearchParams(url.search);
      var kategori = searchParams.get('kategori');
      $('#loadKategoriKalendar').val(kategori);
      if (kategori) {
        $('#loadKategoriKalendar').on('change', function (e) {
          var load = $('#loadKategoriKalendar').val();
          window.location.href = "?kategori=" + load;
          // window.history.pushState('', '', '?kategori=' + load); // Masih belum nemu caranya
          $('#calendar').fullCalendar('refetchEvents');
        });
      }
    }
  })
}

// Logout
var logout = function () {
  $.ajax({
    url: 'config/auth.php',
    type: 'POST',
    data: {
      logout: true
    },
    success: function () {
      // swal confirm info logout or not
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda akan keluar dari akun!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!'
      }).then((result) => {
        if (result.value) {
          var timerInterval
          Swal.fire({
            title: 'Logout...',
            timer: 1000,
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
            window.location.href = 'index.php';
          }, 1000);
        }
      })
    }
  })
}
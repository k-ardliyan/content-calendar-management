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
          setTimeout(() =>{
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

// var getKategori = function () {
//   $.ajax({
//     url: 'get-kategori.php',
//     type: 'GET',
//     dataType: 'JSON',
//     success: function (data) {
//       var object = data.reduce((obj, item) => Object.assign(obj, { [item.id]: item.name }), {});
//       // for (var i = 0; i <= data.length; i++) {
//       //   var no = i + 1;
//       //   var kategori = data[i];
//       //   var row = '<tr><td>' + no + '</td><td>' + kategori.name +
//       //     '</td><td><button type="button" class="btn btn-warning btn-sm text-white mr-2"><i class="fa fa-edit"></i></button>' +
//       //     '<button type="button" class="btn btn-danger btn-sm" onclick="delKategori(' + kategori.id + ')"><i class="fa fa-trash"></i></button></tr>';
//       //   $('#tableKategori').append(row);
//       // }
//       var no = 1;
//       $.each(data, function (i) {
//         var row = '<tr><td>' + no + '</td><td>' + data[i].name +
//           '</td><td><button type="button" class="btn btn-warning btn-sm text-white mr-2"><i class="fa fa-edit"></i></button>' +
//           '<button type="button" class="btn btn-danger btn-sm" onclick="delKategori(' + data[i].id + ')"><i class="fa fa-trash"></i></button></tr>';
//         $('#tableKategori').append(row);
//         no++;
//       });
//     }
//   });
// }

var dataKategori = function () {
  $.ajax({
    url: 'data-kategori.php',
    type: 'GET',
    success: function (data) {
      $('#dataKategori').html(data);
      $('#table').DataTable({
        'pageLength': 4,
      });
    }
  });
}
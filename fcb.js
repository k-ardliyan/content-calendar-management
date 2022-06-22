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
        console.log(data)
        alert(data.message);
      } else {
        alert(data.message);
      }
      console.log(data);
    }
  });
});

// var editKategori = function (id) {
//   $.ajax({
//     url: 'edit-kategori.php',
//     type: 'POST',
//     data: {
//       id: id
//     },
//     success: function (data) {
//       data = JSON.parse(data);
//       if (data.status == 200) {
//         console.log(data)
//         alert(data.message);
//       } else {
//         alert(data.message);
//       }
//     }
//   });
// };

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
        alert(data.message);
      } else {
        alert(data.message);
      }
    }
  });
}

var getKategori = function () {
  $.ajax({
    url: 'get-kategori.php',
    type: 'GET',
    dataType: 'JSON',
    success: function (data) {
      var object = data.reduce((obj, item) => Object.assign(obj, { [item.id]: item.name }), {});
      // for (var i = 0; i <= data.length; i++) {
      //   var no = i + 1;
      //   var kategori = data[i];
      //   var row = '<tr><td>' + no + '</td><td>' + kategori.name +
      //     '</td><td><button type="button" class="btn btn-warning btn-sm text-white mr-2"><i class="fa fa-edit"></i></button>' +
      //     '<button type="button" class="btn btn-danger btn-sm" onclick="delKategori(' + kategori.id + ')"><i class="fa fa-trash"></i></button></tr>';
      //   $('#tableKategori').append(row);
      // }
      var no = 1;
      $.each(data, function (i) {
        var row = '<tr><td>' + no + '</td><td>' + data[i].name +
          '</td><td><button type="button" class="btn btn-warning btn-sm text-white mr-2"><i class="fa fa-edit"></i></button>' +
          '<button type="button" class="btn btn-danger btn-sm" onclick="delKategori(' + data[i].id + ')"><i class="fa fa-trash"></i></button></tr>';
        $('#tableKategori').append(row);
        no++;
      });
    }
  });
}
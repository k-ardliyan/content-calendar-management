$('#addKategori').submit(function(e) {
    e.preventDefault();
    var kategori = $('#inputKategori').val();
    $.ajax({
      url: 'add-kategori.php',
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
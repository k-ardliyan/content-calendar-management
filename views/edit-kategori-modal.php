<!-- Modal Edit Kategori -->
<div class="modal fade" id="kategoriEditModal" tabindex="-1"
    aria-labelledby="kategoriEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kategoriEditModalLabel">Edit Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editKategori">
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="hidden" name="idKategori" id="idKategori">
                <input type="text" name="updateKategori" id="updateKategori" class="form-control"
                  placeholder="ex: Facebook, Instagram">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info w-100"><i class="fa fa-save"></i> Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
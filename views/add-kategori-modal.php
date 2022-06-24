<!-- Modal Add Kategori -->
<div class="modal fade" id="kategoriModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kategoriModalLabel">Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addKategori" class="">
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="text" name="inputKategori" id="inputKategori" class="form-control"
                  placeholder="ex: Facebook, Instagram">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-success w-100"><i class="fa fa-plus"></i> Add</button>
              </div>
            </div>
          </form>
          <form id="editKategori" class="d-none">
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
          <div id="dataKategori">

          </div>
        </div>
      </div>
    </div>
  </div>
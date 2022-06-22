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
                <input type="text" name="inputKategori" id="inputKategori" class="form-control"
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
            <tbody id="tableKategori"></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
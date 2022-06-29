<!-- Modal Add Pillar -->
<div class="modal fade" id="pillarModal"  tabindex="-1"
    aria-labelledby="pillarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pillarModalLabel">Pillar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addPillar">
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="text" name="inputPillar" id="inputPillar" class="form-control"
                  placeholder="ex: News, Meme">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-success w-100">
                  <span class="d-flex align-items-center">
                    <i class="bx bx-plus"></i>
                    <span class="ml-2">Tambah</span>
                  </span>
                </button>
              </div>
            </div>
          </form>
          <div id="dataPillar">

          </div>
        </div>
      </div>
    </div>
  </div>
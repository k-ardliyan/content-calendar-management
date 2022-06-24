<!-- Modal Add Pillar -->
<div class="modal fade" id="pillarEditModal"  tabindex="-1"
    aria-labelledby="pillarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pillarModalLabel">Edit Pillar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editPillar">
            <div class="form-row">
              <div class="form-group col-md-9">
                <input type="hidden" name="idPillar" id="idPillar">
                <input type="text" name="updatePillar" id="updatePillar" class="form-control"
                placeholder="ex: News, Meme">
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
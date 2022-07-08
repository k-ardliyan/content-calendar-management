
<!-- Modal Add Konten -->
<div class="modal fade" id="kontenModal"  tabindex="-1"
    aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kontenModalLabel">Tambah Konten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addKonten">
            <input type="hidden" name="inputTeam" id="inputTeam" value="<?= $_SESSION['team_id']  ?>">
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control" id="inputNama" placeholder="ex: Membuat Konten Bootcamp" required>
            </div>
            <div class="form-group">
              <label for="inputUrl">URL</label>
              <input type="text" class="form-control" id="inputUrl" placeholder="ex: www.gamelab.id">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContent">Content</label>
                <textarea name="inputContent" id="inputContent" class="form-control" style="height: 140px !important;"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCopywriting">Copywriting</label>
                <textarea name="inputCopywriting" id="inputCopywriting" style="height: 140px !important;"
                  class="form-control"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="selectStatus">Status</label>
                <select name="selectStatus" id="selectStatus" class="form-control">
                  <option value="Plan" class="badge-plan">Plan</option>
                  <option value="Ongoing" class="badge-ongoing">Ongoing</option>
                  <option value="Need Review" class="badge-need-review">Need Review</option>
                  <option value="Revision" class="badge-revision">Revision</option>
                  <option value="Approved" class="badge-approved">Approved</option>
                  <option value="Published" class="badge-published">Published</option>
                  <option value="Cancel" class="badge-cancel">Cancel</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="selectPillar">Pillar</label>
                <select name="selectPillar" id="selectPillar" class="form-control">
                  <!-- Data Pillar -->
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" name="inputTanggal" id="inputTanggal" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="inputJam">Jam Posting</label>
                <input type="time" name="inputJam" id="inputJam" class="form-control">
              </div>
            </div>
            <div id="inputRevisiContainer" class="form-group d-none">
              <label for="inputRevisi">Revisi</label>
              <textarea name="inputResivi" id="inputRevisi" class="form-control" style="height: 60px !important;" readonly disabled>Pengisian revisi dilakukan saat mengubah konten</textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            <span class="d-flex align-items-center">
              <i class="bx bx-plus"></i>
              <span class="ml-2">Tambah</span>
            </span>
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
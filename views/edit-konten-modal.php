<!-- Modal Edit Konten -->
<div class="modal fade" id="kontenEditModal" tabindex="-1"
    aria-labelledby="kontenEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kontenEditModalLabel">Edit Konten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php
            
            ?>
          <form id="editContentForm">
            <input type="hidden" name="idKonten" id="idKonten">
            <input type="hidden" name="updateTeam" id="updateTeam" value="<?= $_SESSION['team_id']  ?>">
            <div class="form-group">
              <label for="updateNama">Nama</label>
              <input type="text" class="form-control" id="updateNama" placeholder="ex: Membuat Konten Bootcamp">
            </div>
            <div class="form-group">
              <label for="updateUrl">URL</label>
              <input type="text" class="form-control" id="updateUrl">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="updateContent">Content</label>
                <textarea name="updateContent" id="updateContent" style="height: 140px !important;" class="form-control"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="updateCopywriting">Copywriting</label>
                <textarea name="updateCopywriting" id="updateCopywriting" style="height: 140px !important;"
                  class="form-control"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="updateStatus">Status</label>
                <select name="updateStatus" id="updateStatus" class="form-control">
                  <option value="Plan" class="pillar badge-plan">Plan</option>
                  <option value="Ongoing" class="pillar badge-ongoing">Ongoing</option>
                  <option value="Need Review" class="pillar badge-need-review">Need Review</option> 
                  <?php if ($_SESSION['role_id']!=3):?>
                    <option value="Revision" class="pillar badge-revision">Revision</option>
                    <option value="Approved" class="pillar badge-approved">Approved</option>
                    <option value="Published" class="pillar badge-published">Published</option>
                  <?php else: ?>
                    <option value="Approved" class="pillar badge-approved">Approved</option>
                  <?php endif; ?>
                  <option value="Cancel" class="pillar badge-cancel">Cancel</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="updatePillarContent">Pillar</label>
                <select name="updatePillarContent" id="updatePillarContent" class="form-control">
                  <!-- Data Pillar -->
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="updateTanggal">Tanggal</label>
                <input type="date" name="updateTanggal" id="updateTanggal" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="updateJam">Jam Posting</label>
                <input type="time" name="updateJam" id="updateJam" class="form-control">
              </div>
            </div>
            <div id="updateRevisiContainer" class="form-group d-none">
              <label for="updateRevisi">Revisi</label>
              <textarea name="updateRevisi" id="updateRevisi" class="form-control"  style="height: 140px !important;"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            <span class="d-flex align-items-center">
              <i class="bx bx-save"></i>
              <span class="ml-2">Simpan</span>
            </span>
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
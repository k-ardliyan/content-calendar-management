<!-- Modal View Konten -->
<div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kontenModalLabel">View Konten</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="detailNama">Nama</label>
              <input type="text" class="form-control-plaintext" id="detailNama" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-group">
              <label for="detailUrl">URL</label>
              <input type="text" class="form-control-plaintext" id="detailUrl" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="detailContent">Content</label>
                <textarea name="detailContent" id="detailContent" cols="28" rows="5" class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="detailCopywriting">Copywriting</label>
                <textarea name="detailCopywriting" id="detailCopywriting" cols="28" rows="5"
                  class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="detailStatus">Status</label>
                <select name="detailStatus" id="detailStatus" class="form-control-plaintext" disabled>
                  <option>Pilih..</option>
                  <option selected value="Plan" class="badge-plan">Plan</option>
                  <option value="Ongoing" class="badge-ongoing">Ongoing</option>
                  <option value="Need Review" class="badge-need-review">Need Review</option>
                  <option value="Revision" class="badge-revision">Revision</option>
                  <option value="Approved" class="badge-approved">Approved</option>
                  <option value="Published" class="badge-published">Published</option>
                  <option value="Cancel" class="badge-cancel">Cancel</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="detailPillar">Pillar</label>
                <select name="detailPillar" id="detailPillar" class="form-control-plaintext" disabled>
                  <option>Pilih..</option>
                  <option selected value="News">News</option>
                  <option value="Meme">Meme</option>
                  <option value="Sharing">Sharing</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="detailTanggal">Tanggal</label>
                <input type="date" name="detailTanggal" id="detailTanggal" class="form-control-plaintext" disabled>
              </div>
              <div class="form-group col-md-6">
                <label for="detailJam">Jam Posting</label>
                <input type="time" name="detailJam" id="detailJam" class="form-control-plaintext" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="detailRevisi">Revisi</label>
              <textarea name="detailResivi" id="detailRevisi" cols="30" rows="5" class="form-control-plaintext"
                disabled>Kosong</textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning">Edit</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal View Konten -->
<div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control-plaintext" id="inputNama" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-group">
              <label for="inputUrl">URL</label>
              <input type="text" class="form-control-plaintext" id="inputUrl" placeholder="Kosong"
                disabled>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContent">Content</label>
                <textarea name="inputContent" id="inputContent" cols="28" rows="5" class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="inputCopywriting">Copywriting</label>
                <textarea name="inputCopywriting" id="inputCopywriting" cols="28" rows="5"
                  class="form-control-plaintext"
                  disabled>Kosong</textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputStatus">Status</label>
                <select name="inputStatus" id="inputStatus" class="form-control-plaintext" disabled>
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
                <label for="inputPillar">Pillar</label>
                <select name="inputPillar" id="inputPillar" class="form-control-plaintext" disabled>
                  <option>Pilih..</option>
                  <option selected value="News">News</option>
                  <option value="Meme">Meme</option>
                  <option value="Sharing">Sharing</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" name="inputTanggal" id="inputTanggal" class="form-control-plaintext" disabled>
              </div>
              <div class="form-group col-md-6">
                <label for="inputJam">Jam Posting</label>
                <input type="time" name="inputJam" id="inputJam" class="form-control-plaintext" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="inputRevisi">Revisi</label>
              <textarea name="inputResivi" id="inputRevisi" cols="30" rows="5" class="form-control-plaintext"
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
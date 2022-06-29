<?php 

?>

<div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col">
                <!-- Button Modal Detail -->
                <button type="button" class="close ml-3" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="Tutup">
                  <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>
                <button type="button" class="close mx-2" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="delKonten">
                  <span aria-hidden="true"><i class='bx bx-trash'></i></span>
                </button>
                <button type="button" class="close mx-2" data-toggle="tooltip" data-placement="bottom" title="Ubah" id="editKonten">
                  <span aria-hidden="true"><i class='bx bx-pencil'></i></span>
                </button>
              </div>
            </div>
            <!-- Detail Konten -->
            <div class="row align-items-end">
              <div class="col mb-3">
                <span id="detailCategory" data-toggle="tooltip" data-placement="top" title="Kategori">Facebook &#124;</span>
                <span id="detailStatus" class="badge-info badge-pill" data-toggle="tooltip" data-placement="top"
                  title="Status">Plan</span>
                <span data-toggle="tooltip" data-placement="top" title="Team">&#124; <i class="bx bx-user"></i> k-ardliyan</span>
                <h3 id="detailName" class="mb-0 mt-2">Judul Text</h3>
                <div>
                  <span id="detailDate">Kamis, 30 Juni 2020 &#124;</span>
                  <span id="detailTime">15.00</span>
                </div>
              </div>
            </div>
            <div id="detailUrlContainer" class="row align-items-end mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="URL">
              <div class="col-1"><i class="bx bx-link bx-sm"></i></div>
              <div class="col align-self-center">
                <a id="detailUrl" href="#" target="_blank">www.google.co.id</a>
              </div>
            </div>
            <div class="row mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="Konten">
              <div class="col-1"><i class="bx bx-align-left bx-sm"></i></div>
              <div id="detailContent" class="col align-self-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
            </div>
            <div class="row mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="Copywriting">
              <div class="col-1"><i class="bx bx-highlight bx-sm"></i></div>
              <div id="detailCopywriting" class="col align-self-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat aspernatur eligendi
                beatae maxime est adipisci rerum ut perferendis, illo molestiae, architecto aut, quibusdam sed.
                Officiis magnam cum error molestiae esse!</div>
            </div>
            <div id="detailRevisionContainer" class="row mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="Revisi">
              <div class="col-1"><i class="bx bx-revision bx-sm"></i></div>
              <div id="detailRevision" class="col align-self-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, velit! Enim velit
                blanditiis maxime. Exercitationem, voluptate illum, sapiente minus repellendus fuga repudiandae, nobis
                molestiae voluptates explicabo quis dolore quos vero?</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Konten -->
<!-- <div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-warning" onclick="editKonten()">Edit</button>
          <button type="button" class="btn btn-danger" onclick="delKonten()">Hapus</button>
        </div>
      </div>
    </div>
  </div> -->
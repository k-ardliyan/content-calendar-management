<div class="modal fade" id="viewKontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-4 mt-3">
        <div class="row">
          <div class="col">
            <div class="row align-items-center mb-2">
              <div class="col-auto">
                <span id="detailCategory" data-toggle="tooltip" data-placement="top" title="Kategori">Facebook &#124;</span>
                <span id="detailStatus" class="badge-info badge-pill" data-toggle="tooltip" data-placement="top"
                  title="Status">Plan</span>
                <span data-toggle="tooltip" data-placement="top" title="Pillar">
                  &#124; <i class="bx bx-category"></i>&nbsp;<span id="detailPillar"></span>
                </span>
              </div>
              <div class="col">
                <!-- Button Modal Detail -->
                <button type="button" class="close pl-1" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="Tutup">
                  <span aria-hidden="true"><i class='bx bx-x'></i></span>
                </button>
                <button type="button" class="close pl-1" data-toggle="tooltip" data-placement="bottom" title="Hapus" id="delContent">
                  <span aria-hidden="true"><i class='bx bx-trash'></i></span>
                </button>
                <button type="button" class="close" data-toggle="tooltip" data-placement="bottom" title="Ubah" id="editContent">
                  <span aria-hidden="true"><i class='bx bx-pencil'></i></span>
                </button>
              </div>
            </div>
            <!-- Detail Konten -->
            <div class="row align-items-end">
              <div class="col mb-3">
                <h3 id="detailName" class="mb-0 mt-2">Judul Text</h3>
                <div>
                  <span id="detailDate">Kamis, 30 Juni 2020 &#124;</span>
                  <span id="detailTime">15.00</span>
                </div>
              </div>
            </div>
            <div id="detailUrlContainer" class="row align-items-end mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="URL">
              <div class="col-1"><i class="bx bx-link bx-sm"></i></div>
              <div class="col align-self-start">
                <a id="detailUrl" href="#" target="_blank">
                  <!-- detail url -->
                </a>
              </div>
            </div>
            <div class="row mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="Konten">
              <div class="col-1"><i class="bx bx-align-left bx-sm"></i></div>
              <div id="detailContent" class="col align-self-start">
                <!-- detail content -->
              </div>
            </div>
            <div class="row mt-2 mb-3" data-toggle="tooltip" data-placement="left" title="Copywriting">
              <div class="col-1"><i class="bx bx-highlight bx-sm"></i></div>
              <div id="detailCopywriting" class="col align-self-start">
                <!-- detail copywriting -->
              </div>
            </div>
            <div id="detailRevisionContainer" class="row mt-2 mb-3 text-danger" data-toggle="tooltip" data-placement="left" title="Revisi">
              <div class="col-1"><i class="bx bx-error-alt bx-sm"></i></div>
              <div class="col align-self-start">
                <div id="detailRevision" class="alert alert-danger py-2 px-3 mb-0">
                  <!-- detail revision -->
                </div>
              </div>
            </div>
            <div id="detailReviewerContainer" class="row mt-2 mb-3 text-info" data-toggle="tooltip" data-placement="left" title="Reviewer">
              <div class="col-1"><i class='bx bx-user-check bx-sm'></i></div>
              <div id="detailReviewer" class="col align-self-start">
                  <!-- detail reviewer -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
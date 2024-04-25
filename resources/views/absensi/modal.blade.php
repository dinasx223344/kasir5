<div class="modal fade" id="modalFormabsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="absensi">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_karyawan" value="" name="nama_karyawan">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="tanggal_masuk" value="" name="tanggal_masuk">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" id="waktu_masuk" value="" name="waktu_masuk">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
              <select name="status" id="status" class="form-control">
                {{-- <option value="">Status</option> --}}
                <option value="masuk">Masuk</option>
                <option value="cuti">Cuti</option>
                <option value="libur">Libur</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Keluar</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" id="waktu_keluar" value="" name="waktu_keluar">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="ImportAbsensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Absensi Karyawan</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('import-absensi') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="absensi">File Excel</label>
              <input type="file" name="import" id="import">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-submit">Uploads</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
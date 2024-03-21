<div class="modal fade" id="modalFormmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="menu" enctype="multipart/form-data">
          @csrf

          <div id="method"></div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama menu</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_menu" value="" name="nama_menu">
            </div>
          </div>

          <div class="form-group row">
            <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
            <div class="col-sm-8">
              <select name="jenis_id" id="jenis_id" class="form-control">
                {{-- <option value="">Pilih Jenis ID</option> --}}
                @foreach ($jenis as $p)
                <option value="{{ $p->id }}">{{ $p->nama_jenis }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div id="method"></div>
          <div class="input-group mb-3">
            <label for="staticEmail" class="col-sm-4 col-form-label">Harga</label>
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" id="harga" placeholder="Harga" name="harga">
          </div>

          <div id="method"></div>
          <div class="form-group row">
            <label for="fileInput" class="col-sm-4 col-form-label">Pilih gambar</label>
            <div class="col-sm-8">
              <input type="file" class="form-control" id="image" value="" name="image">
            </div>
          </div>

          <div id="method"></div>
          <div class="form-group row">
            <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="deskripsi" value="" name="deskripsi"></textarea>
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

<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Paket</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('import-menu') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="jenis">File Excel</label>
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
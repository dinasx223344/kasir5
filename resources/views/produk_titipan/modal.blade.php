<div class="modal fade" id="modalFormProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Titipan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="jenis">
          @csrf
          <div id="method"></div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_produk" value="" name="nama_produk">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_supplier" value="" name="nama_supplier">
            </div>
          </div>
          <div class="input-group mb-3">
            <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" name="harga_beli">
          </div>
          <div class="input-group mb-3">
            <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="input-group-prepend">
              <span class="input-group-text">Rp.</span>
            </div>
            <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" name="harga_jual">
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="stok" value="" name="stok">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">keterangan</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="keterangan" value="" name="keterangan"></textarea>
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
          <form method="POST" action="{{ route('import-produk_titipan') }}" enctype="multipart/form-data">
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
</div>
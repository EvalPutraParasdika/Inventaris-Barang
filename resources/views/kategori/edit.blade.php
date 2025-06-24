<p class="small">
  Edit data Kategori
</p>
<form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group form-group-default">
        <label for="nama_kategori">Nama Kategori</label>
        <input id="nama_kategori" name="nama_kategori" type="text" class="form-control" placeholder="Edit Nama kategori"
          value="{{ $kategori->nama_kategori }}" required />
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-success">
      Simpan
    </button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">
      Close
    </button>
  </div>
</form>
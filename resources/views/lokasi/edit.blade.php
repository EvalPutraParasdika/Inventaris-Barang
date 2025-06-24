<p class="small">
  Edit data Lokasi
</p>
<form action="{{ route('lokasi.update', $lokasi->id_lokasi) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group form-group-default">
        <label for="nama_lokasi">Nama Lokasi</label>
        <input id="nama_lokasi" name="nama_lokasi" type="text" class="form-control" placeholder="Edit Nama lokasi"
          value="{{ $lokasi->nama_lokasi }}" required />
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
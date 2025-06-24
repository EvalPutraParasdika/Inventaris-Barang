<p class="small">
    Tambahkan data Lokasi baru
</p>
<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_lokasi">Nama Lokasi</label>
        <input id="nama_lokasi" name="nama_lokasi" type="text" class="form-control" placeholder="Nama Lokasi"
            required />
    </div>
    <div class="d-flex justify-content-between mt-3">
        <button type="submit" id="addRowButton" class="btn btn-primary">
            Add
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            Close
        </button>
    </div>
</form>
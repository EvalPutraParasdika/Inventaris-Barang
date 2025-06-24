<p class="small">
    Tambahkan data Kategori baru
</p>
<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input id="nama_kategori" name="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori"
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
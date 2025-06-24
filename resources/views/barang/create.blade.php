<p class="small">
    Tambahkan Data Barang Baru
</p>

<form action="{{ route('barang.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="Nama Barang" required />
    </div>

    <div class="form-group">
        <label for="id_kategori">Kategori</label>
        <select id="id_kategori" name="id_kategori" class="form-control" required>
            <option value="" disabled selected>-- Pilih Kategori --</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_lokasi">Lokasi</label>
        <select id="id_lokasi" name="id_lokasi" class="form-control" required>
            <option value="" disabled selected>-- Pilih Lokasi --</option>
            @foreach ($lokasis as $lokasi)
                <option value="{{ $lokasi->id_lokasi }}">{{ $lokasi->nama_lokasi }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="stok">Stok</label>
            <input id="stok" name="stok" type="number" class="form-control" placeholder="Jumlah Stok" required
                oninput="this.value = this.value.replace(/[^0-9]/g,'')" />
        </div>
        <div class="form-group col-md-6">
            <label for="harga_satuan">Harga</label>
            <input id="harga_satuan" name="harga_satuan" type="number" step="0.01" class="form-control"
                placeholder="Harga Produk" required
                oninput="this.value = this.value.replace(/[^0-9]/g,'')" />
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            Batal
        </button>
    </div>
</form>

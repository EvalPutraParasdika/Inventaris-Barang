<p class="small">
    Edit Data Barang
</p>

<form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input id="nama_barang" name="nama_barang" type="text" class="form-control"
            placeholder="Edit Nama Barang" value="{{ $barang->nama_barang }}" required />
    </div>

    <div class="form-group">
        <label for="id_kategori">Kategori</label>
        <select id="id_kategori" name="id_kategori" class="form-control" required>
            <option disabled>-- Pilih Kategori --</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id_kategori }}"
                    {{ $barang->id_kategori == $kategori->id_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_lokasi">Lokasi</label>
        <select id="id_lokasi" name="id_lokasi" class="form-control" required>
            <option disabled>-- Pilih Lokasi --</option>
            @foreach ($lokasis as $lokasi)
                <option value="{{ $lokasi->id_lokasi }}"
                    {{ $barang->id_lokasi == $lokasi->id_lokasi ? 'selected' : '' }}>
                    {{ $lokasi->nama_lokasi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 pe-0">
            <div class="form-group">
                <label for="stok">Stok</label>
                <input id="stok" name="stok" type="number" class="form-control"
                    placeholder="Edit Jumlah Stok" value="{{ $barang->stok }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="harga_satuan">Harga</label>
                <input id="harga_satuan" name="harga_satuan" type="number" step="0.01"
                    class="form-control" placeholder="Edit Harga"
                    value="{{ $barang->harga_satuan }}" required />
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-success">
            Simpan
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            Batal
        </button>
    </div>
</form>

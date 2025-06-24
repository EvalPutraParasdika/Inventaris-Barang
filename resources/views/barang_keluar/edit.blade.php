<p class="small">
    Edit Data Barang Keluar
</p>

<form action="{{ route('barang_keluar.update', $keluar->id_barang_keluar) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id_barang">Nama Barang</label>
        <select id="id_barang" name="id_barang" class="form-control" required>
            <option disabled>-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id_barang }}"
                    {{ $keluar->id_barang == $barang->id_barang ? 'selected' : '' }}>
                    {{ $barang->nama_barang }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="jumlah">Jumlah Keluar</label>
            <input id="jumlah" name="jumlah" type="number" class="form-control"
                placeholder="Edit Jumlah Barang Keluar" value="{{ $keluar->jumlah }}" required />
        </div>

        <div class="form-group col-md-6">
            <label for="tanggal">Tanggal Keluar</label>
            <input id="tanggal" name="tanggal" type="date" class="form-control"
                value="{{ $keluar->tanggal }}" required />
        </div>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="(Opsional)">
            {{ $keluar->keterangan }}
        </textarea>
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

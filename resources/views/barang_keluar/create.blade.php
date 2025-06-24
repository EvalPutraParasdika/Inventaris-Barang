<p class="small">
    Tambahkan Data Barang Keluar
</p>

<form action="{{ route('barang_keluar.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="id_barang">Nama Barang</label>
        <select id="id_barang" name="id_barang" class="form-control" required>
            <option value="" disabled selected>-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="jumlah">Jumlah Keluar</label>
            <input id="jumlah" name="jumlah" type="number" class="form-control" placeholder="Jumlah Barang Keluar" required
                oninput="this.value = this.value.replace(/[^0-9]/g,'')" />
        </div>

        <div class="form-group col-md-6">
            <label for="tanggal">Tanggal Keluar</label>
            <input id="tanggal" name="tanggal" type="date" class="form-control" required />
        </div>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="(Opsional) Keterangan tambahan"></textarea>
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

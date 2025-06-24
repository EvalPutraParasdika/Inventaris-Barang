<h3>Data Barang Masuk</h3>
<p>Barang <strong>{{ $barangMasuk->barang->nama_barang }}</strong> telah ditambahkan.</p>
<ul>
    <li>Jumlah: {{ $barangMasuk->jumlah }}</li>
    <li>Tanggal: {{ $barangMasuk->tanggal }}</li>
    <li>Keterangan: {{ $barangMasuk->keterangan ?? '-' }}</li>
</ul>

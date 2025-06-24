<h3>Data Barang Keluar</h3>
<p>Barang <strong>{{ $barangKeluar->barang->nama_barang }}</strong> telah dikurangi.</p>
<ul>
    <li>Jumlah: {{ $barangKeluar->jumlah }}</li>
    <li>Tanggal: {{ $barangKeluar->tanggal }}</li>
    <li>Keterangan: {{ $barangKeluar->keterangan ?? '-' }}</li>
</ul>

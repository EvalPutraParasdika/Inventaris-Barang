<!DOCTYPE html>
<html>
<head>
    <title>Data Lokasi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Lokasi</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Lokasi</th>
                <th>Nama Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $lokasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lokasi->id_lokasi }}</td>
                    <td>{{ $lokasi->nama_lokasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Ruang</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h2>Data Peminjaman Ruang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Waktu Pinjam</th>
                <th>Waktu Kembali</th>
                <th>Ruang</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->no }}</td>
                <td>{{ $row->nama_peminjam }}</td>
                <td>{{ $row->tanggal_pinjam }}</td>
                <td>{{ $row->waktu_pinjam }}</td>
                <td>{{ $row->waktu_kembali }}</td>
                <td>{{ $row->ruang }}</td>
                <td>{{ $row->alasan }}</td>
                <td>{{ $row->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
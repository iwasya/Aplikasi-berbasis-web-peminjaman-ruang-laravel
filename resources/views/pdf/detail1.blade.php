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
                <th>Ruangan</th>
                <th>Descripsi</th>
                <th>Kapasitas</th>
                <th>Foto Ruangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->no }}</td>
                <td>{{ $row->ruangan }}</td>
                <td>{{ $row->descripsi }}</td>
                <td>{{ $row->kapasitas }}</td>
                <td>{{ $row->foto_ruangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
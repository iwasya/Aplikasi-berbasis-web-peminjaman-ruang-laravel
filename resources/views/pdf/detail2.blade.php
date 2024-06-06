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
                <th>No </th>
                <th>Name</th>
                <th>Email </th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->id  }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email  }}</td>
                <td>{{ $row->password }}</td>
                <td>{{ $row->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
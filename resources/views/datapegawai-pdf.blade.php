<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

td {
    text-align: center;
}

h2 {
    text-align: center;
}
</style>
</head>
<body>

<h2>Data Pegawai</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Umur</th>
        <th>No. Telepon</th>
        <th>Alamat</th>
    </tr>
@php
    $no=1;
@endphp
    @foreach ($data as $row)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->jeniskelamin }}</td>
        <td>{{ $row->umur }}</td>
        <td> 0{{ $row->notelpon }}</td>
        <td>{{ $row->alamat }}</td>
    </tr>
    @endforeach
    
</table>

</body>
</html>



</body>
</html>
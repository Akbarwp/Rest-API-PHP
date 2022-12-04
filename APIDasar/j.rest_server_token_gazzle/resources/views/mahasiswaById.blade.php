<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa</title>
</head>
<body>
    @foreach ($mahasiswa['data'] as $mhs)
        <ul>
            <li>NIM: {{ $mhs['nim'] }}</li>
            <li>Nama: {{ $mhs['nama'] }}</li>
            <li>Email: {{ $mhs['email'] }}</li>
            <li>Jurusan: {{ $mhs['jurusan'] }}</li>
        </ul>
    @endforeach
</body>
</html>
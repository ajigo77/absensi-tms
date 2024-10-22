<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- @vite('resources/css/app.css') --}}
</head>
<body>
    <div class="container m-10 d-inline-block justify-center items-center">
        <table class="table table-hover">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Divisi</th>
        </tr>
        @foreach ($users as $user )
        <tr>
            <td>{{ $user->Member->nama }}</td>
            <td>{{ $user->Jabatan->nama }}</td>
            <td>{{ $user->Devisi->nama }}</td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
    </div>
</body>
</html>

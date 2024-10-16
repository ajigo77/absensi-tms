<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Attendance Report</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe Absensi</th>
                <th>Shift</th>
                <th>Status</th>
                <th>Waktu Pulang</th>
                <th>Waktu Datang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ $attendance->type }}</td>
                    <td>{{ $attendance->shift->name }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>{{ $attendance->updated_at }}</td>
                    <td>{{ $attendance->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


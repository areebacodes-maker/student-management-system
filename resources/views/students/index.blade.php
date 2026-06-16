<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
</head>
<body>

    <h1>All Students</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

    <a href="/students/create">Add New Student</a>

    <hr>

    <table border="1" cellpadding="10">

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Batch</th>
        </tr>

        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->city }}</td>
            <td>{{ $student->batch->batch_name }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>
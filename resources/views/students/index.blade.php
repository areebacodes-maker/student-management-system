<!-- <!DOCTYPE html>
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
            <th>Actions</th>
        </tr>

        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->city }}</td>
            <td>{{ $student->batch->batch_name }}</td>
            <td>
    <a href="/students/{{ $student->id }}/edit">Edit</a>

    <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
</td>
        </tr>
        @endforeach

    </table>

</body>
</html> -->

@extends('layouts.app')

@section('content')

<h1>All Students</h1>

<form action="/students" method="GET" class="mb-3 d-flex gap-2">

    <input
        type="text"
        name="search"
        value="{{ $search }}"
        class="form-control"
        placeholder="Search by student or batch name">

    <button class="btn btn-primary">
        Search
    </button>

</form>

<a href="/students/create" class="btn btn-primary mb-3">
    Add New Student
</a>

<table class="table table-bordered table-striped">

    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>City</th>
        <th>Batch</th>
        <th>Actions</th>
    </tr>

    @foreach ($students as $student)
    <tr>
        <td>{{ $students->firstItem() + $loop->index }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->city }}</td>
        <td>{{ $student->batch->batch_name }}</td>
        <td>
            <a href="/students/{{ $student->id }}/edit"
               class="btn btn-warning btn-sm">
                Edit
            </a>

            <form action="/students/{{ $student->id }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

               

                <button
    class="btn btn-danger btn-sm"
    onclick="return confirm('Are you sure you want to delete this student?')">
    Delete
</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

<div class="mt-3">
    {{ $students->links() }}
</div>

@endsection
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

    <h1>Add Student</h1>

    <form action="/students" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Student Name">
        <br><br>

        <input type="email" name="email" placeholder="Email">
        <br><br>

        <input type="text" name="phone" placeholder="Phone">
        <br><br>

        <input type="text" name="city" placeholder="City">
        <br><br>

        <select name="batch_id">
            @foreach ($batches as $batch)
                <option value="{{ $batch->id }}">
                    {{ $batch->batch_name }}
                </option>
            @endforeach
        </select>
<a href="/batches/create" target="_blank">+ Add New Batch</a>
        <br><br>

        <button type="submit">Save Student</button>
    </form>

</body>
</html> -->

@extends('layouts.app')

@section('content')

<h1>Add Student</h1>

<form action="/students" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Batch</label>

        <div class="d-flex gap-2">
            <select name="batch_id" class="form-select">
                @foreach ($batches as $batch)
                    <option value="{{ $batch->id }}">
                        {{ $batch->batch_name }}
                    </option>
                @endforeach
            </select>

            <a href="/batches/create"
               target="_blank"
               class="btn btn-success">
                + Batch
            </a>
        </div>
    </div>

    <button class="btn btn-primary">
        Save Student
    </button>

</form>

@endsection
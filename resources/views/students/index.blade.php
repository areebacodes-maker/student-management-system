

@extends('layouts.app')

@section('content')

<h1>All Students</h1>



<a href="/students/create" class="btn btn-primary mb-3">
    Add New Student
</a>

<form method="GET" action="{{ route('students.index') }}" class="row g-3 mb-4">

    <div class="col-md-4">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search student or batch..."
            value="{{ request('search') }}">
    </div>

    <div class="col-md-3">
        <select name="batch_id" class="form-select">
            <option value="">All Batches</option>

            @foreach($batches as $batch)
                <option value="{{ $batch->id }}"
                    {{ request('batch_id') == $batch->id ? 'selected' : '' }}>
                    {{ $batch->batch_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                Name A → Z
            </option>

            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                Name Z → A
            </option>
        </select>
    </div>

    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">
            Apply
        </button>
    </div>

</form>

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
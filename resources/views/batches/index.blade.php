

@extends('layouts.app')

@section('content')

<h1>All Batches</h1>

<a href="/batches/create" class="btn btn-primary mb-3">
    Add New Batch
</a>

<form action="{{ route('batches.index') }}" method="GET" class="mb-3 d-flex gap-2">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        class="form-control"
        placeholder="Search batch name">

    <button class="btn btn-primary">
        Search
    </button>

</form>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Batch Name</th>
        <th>Actions</th>
    </tr>

    @forelse ($batches as $batch)
    <tr>
        <td>{{ $batch->id }}</td>
        <td>{{ $batch->batch_name }}</td>
        <td>
            <a href="/batches/{{ $batch->id }}/edit" class="btn btn-warning btn-sm">
                Edit
            </a>

            <form action="/batches/{{ $batch->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

               <button
    class="btn btn-danger btn-sm"
    onclick="return confirm('Are you sure you want to delete this batch?')">
    Delete
</button>
            </form>
        </td>
    </tr>
    @empty
<tr>
    <td colspan="3" class="text-center text-muted">
        No batches found.
    </td>
</tr>
    @endforelse

</table>

<div class="mt-3">
    {{ $batches->links() }}
</div>

@endsection
@extends('layouts.app')

@section('content')

<h1>Add New Batch</h1>

<form action="/batches" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Batch Name</label>

        <input
            type="text"
            name="batch_name"
            class="form-control"
            value="{{ old('batch_name') }}"
            placeholder="Enter batch name">

        @error('batch_name')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Save Batch
    </button>

    <a href="/batches" class="btn btn-secondary">
        Cancel
    </a>
</form>

@endsection
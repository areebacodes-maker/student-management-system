<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batches</title>
</head>
<body>
    <h1>All Batches</h1>

    @if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif
    
    <a href="/batches/create">Add New Batch</a>

    <hr>

    <ul>
    @foreach ($batches as $batch)
        <li>
            {{ $batch->batch_name }}

            <a href="/batches/{{ $batch->id }}/edit">Edit</a>
            
             <form action="/batches/{{ $batch->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>

        </li>
    @endforeach
</ul>
</body>
</html>
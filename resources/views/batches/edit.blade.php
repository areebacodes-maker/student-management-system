<!DOCTYPE html>
<html>
<head>
    <title>Edit Batch</title>
</head>
<body>

    <h1>Edit Batch</h1>

    <form action="/batches/{{ $batch->id }}" method="POST">
        @csrf
        @method('PUT')

        <input
            type="text"
            name="batch_name"
            value="{{ $batch->batch_name }}"
        >

        <button type="submit">Update Batch</button>
    </form>

</body>
</html>
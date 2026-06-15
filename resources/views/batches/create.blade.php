<!DOCTYPE html>
<html>
<head>
    <title>Create Batch</title>
</head>
<body>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    <h1>Add New Batch</h1>

    <form action="/batches" method="POST">
        @csrf

        <input
            type="text"
            name="batch_name"
            placeholder="Enter batch name"
        >

        <button type="submit">Save Batch</button>
    </form>

</body>
</html>
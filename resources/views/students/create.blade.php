<!DOCTYPE html>
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

        <br><br>

        <button type="submit">Save Student</button>
    </form>

</body>
</html>
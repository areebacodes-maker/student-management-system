<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

    <h1>Edit Student</h1>

    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $student->name }}">
        <br><br>

        <input type="email" name="email" value="{{ $student->email }}">
        <br><br>

        <input type="text" name="phone" value="{{ $student->phone }}">
        <br><br>

        <input type="text" name="city" value="{{ $student->city }}">
        <br><br>

        <select name="batch_id">
            @foreach ($batches as $batch)
                <option value="{{ $batch->id }}"
                    {{ $student->batch_id == $batch->id ? 'selected' : '' }}>
                    {{ $batch->batch_name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Update Student</button>
    </form>

</body>
</html>
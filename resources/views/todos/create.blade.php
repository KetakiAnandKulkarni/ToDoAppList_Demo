<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 40px auto; }
        input, textarea { width: 100%; padding: 8px; margin: 6px 0 14px; box-sizing: border-box; }
        button { padding: 10px 20px; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
    <h1>Add New Task</h1>
    <a href="{{ route('todos.index') }}">&larr; Back</a>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <label>Title *</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <p class="error">{{ $message }}</p> @enderror

        <label>Description</label>
        <textarea name="description" rows="3">{{ old('description') }}</textarea>

        <label>Deadline *</label>
        <input type="date" name="deadline" value="{{ old('deadline') }}">
        @error('deadline') <p class="error">{{ $message }}</p> @enderror

        <button type="submit">Add Task</button>
    </form>
</body>
</html>
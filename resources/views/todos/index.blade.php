<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
        .overdue { color: red; }
        .done { text-decoration: line-through; color: gray; }
        table { width: 100%; border-collapse: collapse; }
        td, th { padding: 10px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
    <h1>My To-Do List</h1>
    <a href="{{ route('todos.create') }}">+ Add New Task</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>Title</th><th>Deadline</th><th>Status</th><th>Actions</th>
        </tr>
        @foreach($todos as $todo)
        <tr>
            <td class="{{ $todo->is_completed ? 'done' : '' }}">
                {{ $todo->title }}
            </td>
            <td class="{{ !$todo->is_completed && $todo->deadline->isPast() ? 'overdue' : '' }}">
                {{ $todo->deadline->format('d M Y') }}
            </td>
            <td>{{ $todo->is_completed ? 'Done' : 'Pending' }}</td>
            <td>
                <form action="{{ route('todos.update', $todo) }}" method="POST" style="display:inline">
                    @csrf @method('PATCH')
                    <button type="submit">
                        {{ $todo->is_completed ? 'Undo' : 'Complete' }}
                    </button>
                </form>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this task?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
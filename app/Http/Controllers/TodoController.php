<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('deadline')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:255',
            'deadline' => 'required|date',
        ]);

        Todo::create($request->only('title', 'description', 'deadline'));

        return redirect()->route('todos.index')->with('success', 'Task added!');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['is_completed' => !$todo->is_completed]);
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Task deleted!');
    }
}
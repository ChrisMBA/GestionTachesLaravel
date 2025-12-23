<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderByDesc('created_at')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => 'todo',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche ajoutée.');
    }

    public function markDone(Task $task)
    {
        $task->update(['status' => 'done']);

        return redirect()->route('tasks.index')->with('success', 'Tâche marquée comme terminée.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée.');
    }
}

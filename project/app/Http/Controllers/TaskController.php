<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 1. View Tasks (Display all saved tasks)
    public function index()
    {
        $tasks = Task::orderBy('due_date', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // 2. Show the "Create" form screen
    public function create()
    {
        return view('tasks.create');
    }

    // 3. Add Task (Save new task to the database)
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }

    // 4. Show the "Edit" form screen
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // 5. Edit Task (Update information in the database)
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // 6. Delete Task (Remove from database)
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted safely!');
    }

    // 7. Update Status (Custom toggle between Pending and Completed)
    public function toggleStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task status switched!');
    }
}


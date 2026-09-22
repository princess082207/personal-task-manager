<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View Tasks Dashboard
    public function index()
    {
        $tasks = Task::orderBy('due_date', 'asc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task Form
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task to Database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show Edit Task Form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update Task Details
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required|date',
            'status' => 'required|in:Pending,Completed'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Quick Update Status Toggle (Pending/Completed)
    public function updateStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect()->back()->with('success', 'Task status updated!');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task removed successfully!');
    }
}

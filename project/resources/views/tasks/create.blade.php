@extends('tasks.layout')

@section('content')
<style>
    .gradient-header { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); padding: 32px; border-radius: 20px; color: white; margin-bottom: 24px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
    .gradient-header h1 { margin: 0 0 8px 0; font-size: 28px; font-weight: 700; letter-spacing: -0.5px; }
    .gradient-header p { margin: 0; color: #e0e7ff; font-weight: 500; font-size: 15px; }
    .back-link { display: inline-block; color: #4f46e5; text-decoration: none; font-weight: 600; font-size: 14px; margin-bottom: 24px; }
    .form-card { background-color: white; border: 1px solid #f1f5f9; border-radius: 20px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto; }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-weight: 700; color: #334155; margin-bottom: 8px; font-size: 14px; }
    .form-input { w-full; width: 100%; box-sizing: border-box; background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px 16px; font-size: 14px; color: #1e293b; outline: none; transition: all 0.2s; }
    .form-input:focus { border-color: #4f46e5; background-color: white; }
    .submit-btn { width: 100%; background-color: #4f46e5; color: white; border: none; font-weight: 700; padding: 14px; border-radius: 12px; cursor: pointer; font-size: 15px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2); }
    .error-msg { color: #ef4444; font-size: 12px; margin-top: 6px; font-weight: 500; }
</style>

<div class="gradient-header">
    <h1>Add New Task</h1>
    <p>Create a new task for your task manager</p>
</div>

<div>
    <a href="{{ route('tasks.index') }}" class="back-link">← Back to My Tasks</a>
</div>

<div class="form-card">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Task Name:</label>
            <input type="text" name="task_name" class="form-input" value="{{ old('task_name') }}">
            @error('task_name') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description:</label>
            <textarea name="description" rows="4" class="form-input" style="resize: vertical;">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Due Date:</label>
            <input type="date" name="due_date" class="form-input" value="{{ old('due_date') }}">
            @error('due_date') <div class="error-msg">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="submit-btn">Add Task</button>
    </form>
</div>
@endsection

@extends('tasks.layout')

@section('content')
<style>
    .gradient-header { background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #c084fc 100%); padding: 32px; border-radius: 20px; color: white; margin-bottom: 24px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
    .gradient-header h1 { margin: 0 0 8px 0; font-size: 28px; font-weight: 700; letter-spacing: -0.5px; }
    .gradient-header p { margin: 0; color: #e0e7ff; font-weight: 500; font-size: 15px; }
    .add-btn { display: inline-block; background-color: #4f46e5; color: white; text-decoration: none; font-weight: 600; padding: 12px 24px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2); transition: all 0.2s; border: none; cursor: pointer; font-size: 14px; }
    .section-title { font-size: 20px; font-weight: 700; color: #0f172a; margin: 32px 0 16px 0; }
    .task-card { background-color: white; border: 1px solid #f1f5f9; border-radius: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); overflow: hidden; }
    .task-item { padding: 20px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
    .task-item:last-child { border-bottom: none; }
    .task-name { font-weight: 700; color: #0f172a; margin: 0 0 4px 0; font-size: 16px; }
    .task-name.completed { text-decoration: line-through; color: #94a3b8; font-weight: 500; }
    .task-desc { color: #64748b; font-size: 14px; margin: 0 0 8px 0; line-height: 1.4; }
    .task-date { color: #94a3b8; font-size: 12px; font-weight: 500; }
    .badge { display: inline-block; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 9999px; margin-left: 8px; }
    .badge-pending { background-color: #fef3c7; color: #92400e; }
    .badge-completed { background-color: #d1fae5; color: #065f46; }
    .actions-group { display: flex; align-items: center; gap: 8px; }
    .btn-action { font-size: 12px; font-weight: 600; padding: 8px 14px; border-radius: 8px; border: 1px solid #e2e8f0; background-color: #f8fafc; color: #475569; cursor: pointer; text-decoration: none; }
    .btn-toggle { background-color: #eef2ff; color: #4f46e5; border-color: #e0e7ff; }
    .btn-delete { background-color: #fff1f2; color: #e11d48; border-color: #ffe4e6; }
    .empty-state { padding: 48px; text-align: center; color: #64748b; }
    .empty-icon { font-size: 40px; margin-bottom: 12px; }
    .alert-success { background-color: #d1fae5; color: #065f46; padding: 16px; border-radius: 12px; margin-bottom: 20px; font-weight: 500; font-size: 14px; border: 1px solid #a7f3d0; }
</style>

<div class="gradient-header">
    <h1>Personal Task Manager</h1>
    <p>Manage and organize your tasks fluidly</p>
</div>

@if(session('success'))
    <div class="alert-success">
        ✨ {{ session('success') }}
    </div>
@endif

<div style="margin-bottom: 24px;">
   <a href="/tasks/create" class="add-btn">+ Add Task</a>
</div>

<div class="section-title">My Tasks</div>

<div class="task-card">
    @forelse($tasks as $task)
        <div class="task-item">
            <div style="flex: 1;">
                <div style="display: flex; align-items: center;">
                    <span class="task-name {{ $task->status === 'Completed' ? 'completed' : '' }}">{{ $task->task_name }}</span>
                    <span class="badge {{ $task->status === 'Completed' ? 'badge-completed' : 'badge-pending' }}">{{ $task->status }}</span>
                </div>
                @if($task->description)
                    <p class="task-desc">{{ $task->description }}</p>
                @endif
                <div class="task-date">📅 Due: {{ $task->due_date }}</div>
            </div>
            
            <div class="actions-group">
                <!-- 1. Toggle Status Form -->
                <form action="/tasks/{{ $task->id }}/toggle" method="POST" style="margin:0;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn-action btn-toggle">Toggle</button>
                </form>

                <!-- 2. Edit Link -->
                <a href="/tasks/{{ $task->id }}/edit" class="btn-action">Edit</a>

                <!-- 3. Delete Form -->
                <form action="/tasks/{{ $task->id }}" method="POST" style="margin:0;" onsubmit="return confirm('Remove task permanently?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty-state">
            <div class="empty-icon">📋</div>
            <div style="font-weight: 600; color: #334155; margin-bottom: 4px;">No tasks yet.</div>
            <div style="font-size: 14px; color: #94a3b8;">Click "+ Add Task" to create your first task structure.</div>
        </div>
    @endforelse
</div>
@endsection

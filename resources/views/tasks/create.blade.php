<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background-color: #f8fafc; padding: 40px 20px; display: flex; justify-content: center; }
        .card { background: white; max-width: 450px; width: 100%; padding: 32px; border-radius: 20px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05); border: 1px solid #f1f5f9; }
        .title { font-size: 24px; font-weight: 700; color: #0f172a; margin-bottom: 24px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 8px; }
        .form-control { width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 14px; box-sizing: border-box; transition: border 0.2s; }
        .form-control:focus { outline: none; border-color: #4f46e5; }
        textarea.form-control { resize: vertical; min-height: 80px; }
        .btn-submit { width: 100%; background-color: #4f46e5; color: white; border: none; font-weight: 600; padding: 14px; border-radius: 12px; font-size: 14px; cursor: pointer; transition: background 0.2s; margin-top: 10px; }
        .btn-submit:hover { background-color: #4338ca; }
        .btn-cancel { display: block; text-align: center; color: #64748b; font-size: 13px; font-weight: 500; text-decoration: none; margin-top: 16px; }
        .btn-cancel:hover { color: #475569; }
    </style>
</head>
<body>

    <div class="card">
        <div class="title">✨ Add New Task</div>

        <!-- The dynamic route action below completely prevents localhost connection refused crashes -->
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" id="task_name" name="task_name" class="form-control" placeholder="What needs to be done?" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" placeholder="Add optional details..."></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" class="form-control" required>
            </div>

            <button type="submit" class="btn-submit">Add Task</button>
            <a href="{{ route('tasks.index') }}" class="btn-cancel">← Cancel and Go Back</a>
        </form>
    </div>

</body>
</html>

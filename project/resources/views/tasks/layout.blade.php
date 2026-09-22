<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f5f9; margin: 0; padding: 0; color: #1e293b; }
        .container { max-width: 800px; margin: 0 auto; padding: 40px 20px; }
        .success-banner { background-color: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 12px 20px; rounded-radius: 12px; margin-bottom: 24px; border-radius: 12px; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="success-banner">✨ {{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            background: url('/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }
        .text-center {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            background-color: #2563eb;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .btn-success {
            background-color: #16a34a;
            border: none;
        }
        .btn-success:hover {
            background-color: #15803d;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="mb-4">Trenini Ventspili</h1>
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .unauthorized-container {
            text-align: center;
            max-width: 500px;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        h1 {
            font-size: 2.5rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        .btn-home {
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="unauthorized-container">
        <!-- Lock Icon from Bootstrap Icons -->
        <i class="bi bi-lock-fill icon"></i>
        <h1>401 - Unauthorized</h1>
        <p>You do not have permission to access this page. Please contact the administrator if you believe this is an error.</p>
        <a href="/" class="btn btn-home">Return to Home</a>
    </div>

    <!-- Bootstrap JS (Optional, if you need Bootstrap's JS features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
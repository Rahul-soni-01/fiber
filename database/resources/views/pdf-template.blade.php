<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            margin: 0;
            color: #4CAF50;
        }

        .content {
            margin-bottom: 20px;
        }

        .content p {
            margin: 0;
        }

        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #555;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Your PDF Title</h1>
        <p>Generated on: {{ date('Y-m-d') }}</p>
    </div>

    <div class="content">
        {!! $content !!}
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
</body>
</html>

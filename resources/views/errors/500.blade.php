<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '500 Internal Server Error')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: url('/error/500error.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 600px;
            padding: 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .error-code {
            font-size: 100px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #ff6b6b;
        }

        .server-error-text {
            font-size: 22px;
            margin-bottom: 30px;
            color: #f1f1f1;
        }

        .back-link {
            text-decoration: none;
            padding: 12px 30px;
            background-color: #ffffff;
            color: #333;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s ease;
        }

        .back-link:hover {
            background-color: #ddd;
        }

        @media (max-width: 600px) {
            .error-code {
                font-size: 70px;
            }

            .server-error-text {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="error-code">500</div>
        <p class="server-error-text">Something went wrong on our server. <br>We're working on it, please try again later.</p>
        <a href="{{ url('/') }}" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
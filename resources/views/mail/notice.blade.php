<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Gentleman Barbershop</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 30px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 120px;
            height: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #051923;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            color: #051923;
            font-weight: 700;
        }

        .description {
            margin: 25px 0;
            line-height: 1.8;
            font-size: 16px;
            color: #555555;
        }

        .image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
            margin: 25px 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }

        .footer a {
            color: #051923;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .description {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Company Logo -->
        <div class="logo">
            <h1> Gentleman Barbershop Logo</h1>
        </div>

        <!-- Notice Title -->
        <div class="header">
            <h1>{{ $title }}</h1>
        </div>

        <!-- Notice Description -->
        <div class="description">
            <p>{{ $description }}</p>
        </div>

        <!-- Image (Optional) -->
        @if ($photopath)
            <img src="{{ asset('images/notices/' . $photopath) }}" alt="{{ $title }}" class="image">
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Gentleman Barbershop. All rights reserved.</p>
            <p><a href="{{ url('/') }}">Visit our website</a></p>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #0f161d;
            color: #fcfcfc;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            margin-bottom: 20px;
        }

        a {
            color: #3490dc;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('images/gentalmanlogo.png') }}" alt="Website Logo" class="logo">
        <h1>500:Server Error</h1>
        <p>Oops! Something went wrong on our end.</p>
        <p>Please try again later or <a href="{{ url('/') }}">go back to the homepage</a>.</p>
    </div>
</body>

</html>

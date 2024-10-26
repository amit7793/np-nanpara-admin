<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Request</title>
    <style>
        /* Resetting basic margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: #fff;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #4cae4c;
        }

        .email-footer {
            font-size: 12px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <h1>Password Reset Request</h1>
        <p>Click the link below to reset your password:</p>
        <a href="{{ $resetLink }}">Reset Password</a>
        <p>If you did not request a password reset, please ignore this email.</p>

        <div class="email-footer">
            <p>If you have any questions, feel free to contact our support team.</p>
        </div>
    </div>

</body>

</html>

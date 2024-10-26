<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Your Password</title>
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            animation: formSlideUp 1s ease-in-out;
        }

        @keyframes formSlideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4cae4c;
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(76, 174, 76, 0.8);
        }

        /* Add some subtle animations for buttons */
        button {
            animation: buttonGlow 1s infinite alternate;
        }

        @keyframes buttonGlow {
            from {
                box-shadow: 0 0 8px rgba(92, 184, 92, 0.6);
            }

            to {
                box-shadow: 0 0 15px rgba(92, 184, 92, 1);
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Reset Your Password</h2>
        <form method="POST" action="{{ route('custom.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter new password" required>

            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm new password" required>

            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>

</html>

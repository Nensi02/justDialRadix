<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        /* Header styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #007bff;
            margin-bottom: 10px;
        }
        /* Body styles */
        .body {
            margin-bottom: 20px;
        }
        /* Button styles */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        /* Footer styles */
        .footer {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Email Verification</h1>
        </div>
        <div class="body">
            <p>Thank you for signing up! To complete your registration, please verify your email address by clicking the button below:</p>
            <p>
                <a href="{{ route('user.verify', $token) }}" class="btn">Verify Email Address</a>
            </p>
            <p>If you did not create an account, no further action is required.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

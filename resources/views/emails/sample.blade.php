<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
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
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
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
            <h1>Contact Form Submission</h1>
        </div>
        <div class="body">
            <p>Dear Admin,</p>
            <p>You have received a new message from the contact form:</p>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{$content['name']}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$content['email']}}</td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>{{$content['message']}}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

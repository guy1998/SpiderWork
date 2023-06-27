<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Failed</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .redirect-msg {
            color: #999;
        }

        .button {
            display: inline-block;
            background-color: purple;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: darkorchid;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up Failed</h1>
        <p>The user already exists. Please try signing up with a different username.</p>
        <!-- <p class="redirect-msg">Redirecting you to the sign-up page...</p> -->
        <button class="button" onclick="window.location.href='../views/log-in.php'">Back</button>
    </div>

</body>
</html>


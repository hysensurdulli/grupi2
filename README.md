<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Login Page</title>
    <style>
        /* Stili i përgjithshëm për faqen */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #1a1a2e;
            font-family: Arial, sans-serif;
            overflow: hidden;
            color: #fff;
        }

        /* Kutia e login-it */
        .login-box {
            position: relative;
            width: 350px;
            padding: 40px;
            background-color: #16213e;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6), 0 0 35px #0f3460;
            border-radius: 10px;
            text-align: center;
            overflow: hidden;
        }

        /* Stili i formës së login-it */
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #0f3460;
            background-color: #0f3460;
            color: #fff;
            border-radius: 5px;
            outline: none;
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #e94560;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-box input[type="submit"]:hover {
            background-color: #ff2e63;
        }

        /* Figurat e lëvizshme */
        .moving-figure {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: rgba(233, 69, 96, 0.2);
            border-radius: 50%;
            animation: float 5s ease-in-out infinite;
        }

        /* Pozicionet dhe animacioni i figurave */
        .moving-figure:nth-child(1) {
            top: -20px;
            left: -20px;
            animation-duration: 6s;
        }

        .moving-figure:nth-child(2) {
            bottom: -20px;
            right: -20px;
            animation-duration: 7s;
        }

        .moving-figure:nth-child(3) {
            bottom: -40px;
            left: 60px;
            animation-duration: 8s;
        }

        /* Animacioni i figurave lëvizëse */
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-30px) translateX(30px);
            }
            100% {
                transform: translateY(0) translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <!-- Figurat që lëvizin -->
        <div class="moving-figure"></div>
        <div class="moving-figure"></div>
        <div class="moving-figure"></div>
        
        <!-- Forma e login-it -->
        <h2>Login</h2>
        <form>
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

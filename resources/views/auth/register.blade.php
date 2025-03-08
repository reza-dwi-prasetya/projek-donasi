<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        /* CSS style (seperti yang diberikan sebelumnya) */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
        }

        .image-section {
            background-color: #f5f5f5;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }

        .image-section img {
            max-width: 100%;
            height: auto;
        }

        .form-section {
            padding: 40px;
            flex: 1;
        }

        .form-section h2 {
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-section label {
            display: block;
            margin-bottom: 5px;
        }

        .form-section input[type="text"],
        .form-section input[type="email"],
        .form-section input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-section .btn {
            background-color: #ff5722;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        .form-section .btn:hover {
            background-color: #ff5722;
        }

        .form-section .options {
            text-align: center;
            margin-top: 20px;
        }

        .form-section .options a {
            color: #343a40;
            text-decoration: none;
        }

        /* Media Query */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .image-section,
            .form-section {
                width: 100%;
            }
            .image-section img {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img alt="Illustration of a person holding a key and another person sitting in front of a computer with a lock on the screen" src="https://storage.googleapis.com/a1aa/image/Et032risYJbcAtvqgebyRnvAu9bawQPO31WoQjjkETFQZhfTA.jpg" />
        </div>
        <div class="form-section">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>

                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>

                <label for="password">Your Password</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <label for="password">Your <Address></Address></label>
                <input type="address" class="form-control" id="address" name="address" required>

                <button type="submit" class="btn">Register</button>
                <div class="options">
                    <a href="{{ route('login-form') }}">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: white;
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
        color: #1a1a1a;
        margin-bottom: 20px;
    }
    .form-section input[type="email"],
    .form-section input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-section .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 10px 0;
    }
    .form-section .options a {
        color: #1a1a1a;
        text-decoration: none;
    }
    .form-section .submit-btn {
        background-color: #ff5722;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        margin: 20px 0;
    }
    .form-section .register {
        text-align: center;
    }
    .form-section .register a {
        color: #1a1a1a;
        text-decoration: none;
        margin-left: 5px;
    }
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }
        .image-section, .form-section {
            flex: none;
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="image-section">
        <img alt="Illustration of a person holding a key and another person sitting in front of a computer with a lock on the screen" src="https://storage.googleapis.com/a1aa/image/Et032risYJbcAtvqgebyRnvAu9bawQPO31WoQjjkETFQZhfTA.jpg" />
    </div>
    <div class="form-section">
        <h2>Login Account</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" required placeholder="Your Email" />
            <input type="password" name="password" required placeholder="Your Password" />
            <div class="options">
                <a href="{{ route('home') }}">Kembali</a>
                <a href="/admin/login">Login Admin</a>
            </div>
            <button class="submit-btn" type="submit">Login</button>
        </form>
        <div class="register">
            Need Account? <a href="{{ route('register-form') }}">Register</a>
        </div>
    </div>
</div>

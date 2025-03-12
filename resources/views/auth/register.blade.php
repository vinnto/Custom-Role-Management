<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Register</h2>
            <form action="" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="register-name" required>
                    <label for="register-name">Full Name</label>
                </div>
                <div class="input-group">
                    <input type="email" id="register-email" required>
                    <label for="register-email">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" id="register-password" required>
                    <label for="register-password">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" id="register-confirm-password" required>
                    <label for="register-confirm-password">Confirm Password</label>
                </div>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>

</html>

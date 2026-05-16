<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form method="POST" action="{{ route('custom.register') }}">
        @csrf
        <div>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <div>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number">
        </div>
        <br>
        <div>
            <label for="type">User Type:</label><br>
            <select id="type" name="type">
                <option value="backend">Backend</option>
                <option value="frontend">Frontend</option>
                <option value="fullstack">Fullstack</option>
                <option value="ai-ml">AI/ML</option>
            </select>
        </div>
        <br>
        <button type="submit">Register</button>
    </form>

    <br>
    <a href="{{ route('custom.login') }}">Already have an account? Login here</a>
</body>
</html>

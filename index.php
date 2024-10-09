<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
        <br>
    </form>

    <p>Or <a href="google-login.php">login with Google</a></p>

    <!-- Home Button (No Login Required) -->
    <form action="home.php" method="get">
        <button type="submit">Go to Home</button> <!-- This button will redirect to home.php -->
    </form>
</body>
</html>

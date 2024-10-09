<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Welcome to the Home Page!</h2>
    <p>This is the home page.</p>

    <!-- Button to redirect to Page 1 -->
    <form action="page1.php" method="get">
        <button type="submit">Go to Page 1</button>
    </form>

    <!-- Button to redirect to Page 2 -->
    <form action="page2.php" method="get">
        <button type="submit">Go to Page 2</button>
    </form>

    <!-- Optional Logout Link -->
    <p><a href="logout.php">Logout</a></p>
</body>
</html>

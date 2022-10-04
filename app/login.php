<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prolangram | Log In</title>
</head>
<body>

    <a href="register.php">Register</a>

    <form action="../src/includes/login_process.php" method="POST">
        <input type="text" name="identity" placeholder="Username / Email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Log In</button>
    </form>
    
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        </head>
    <body>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Login">
            <h3>Don't have an account? <a href="registration-form.php">Register</a></h3>
</body>
</html>
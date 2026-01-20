<!DOCTYPE html>
<html>
    <head>
        <title>User Registration Form</title>
        </head>
    <body>
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullname" name="fullname" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            
            <input type="submit" value="Register">
            <h3>Already have an account? <a href="login-form.php">Login</a></h3>
</body>
</html>
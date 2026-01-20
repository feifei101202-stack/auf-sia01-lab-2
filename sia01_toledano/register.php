<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, passwd) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);
    
    if ($stmt->execute()) {
        error_log("REGISTRATION_SUCCESS: User $username registered");
        echo "Registration successful! <a href='login-form.php'><button>Go to Login</button></a>";
    } else {
         "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
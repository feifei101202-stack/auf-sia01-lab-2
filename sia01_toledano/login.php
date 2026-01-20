<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT username, passwd FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwd'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['login_time'] = time();
            error_log("LOGIN_SUCCESS: User $username logged in");
            header('Location: welcome.php');
            exit();
        } else {
            error_log("LOGIN_FAILED: Invalid password for user $username");
            echo "Invalid password.";
        }
    } else {
        error_log("LOGIN_FAILED: User $username not found");
        echo "User not found.";
    }

    $stmt->close();
}

$conn->close();
?>
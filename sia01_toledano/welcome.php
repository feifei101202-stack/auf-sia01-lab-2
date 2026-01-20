<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login-form.php');
    exit();
}

include 'db.php';


$stmt = $conn->prepare("SELECT fullname, email FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$stmt2 = $conn->prepare("SELECT username, email, fullname FROM users");
$stmt2->execute();
$result2 = $stmt2->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Login successful!</h1>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>
    <a href="logout.php"><button>Logout</button></a>

    <h2>All Registered Users:</h2>
    <ul>
        <?php while ($row = $result2->fetch_assoc()): ?>
            <li><?php echo htmlspecialchars($row['username']) . ' - ' . htmlspecialchars($row['email']) . ' - ' . htmlspecialchars($row['fullname']); ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
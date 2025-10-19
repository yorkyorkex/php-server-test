<?php
session_start();

// define stored credentials
$stored_username = "1111";
$stored_hash = password_hash("1111", PASSWORD_DEFAULT);

// logout functionality
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    echo "<h3>You have been logged out.</h3>";
}

// login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $stored_username && password_verify($password, $stored_hash)) {
        $_SESSION["username"] = $username;
        echo "<h2>✅ Welcome, " . htmlspecialchars($username) . "!</h2>";
        echo "<a href='?logout=true'>Logout</a>";
        exit;
    } else {
        echo "<p style='color:red;'>❌ Incorrect username or password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Login</title>
</head>
<body>
<?php if (!isset($_SESSION["username"])): ?>
    <h2>Login</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
<?php else: ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    <a href="?logout=true">Logout</a>
<?php endif; ?>
</body>
</html>

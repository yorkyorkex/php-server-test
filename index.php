<?php
// if the form is submitted, process the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    echo "<h3>Hello, " . htmlspecialchars($username) . "!</h3>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Form</title>
</head>
<body>
    <h2>Enter your name</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Type your name">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

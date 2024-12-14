<?php
include 'includes/db.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); 
        }

        header("Location: index.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($error)) echo "<p class='alert'>$error</p>"; ?>
    </div>
</body>

</html>
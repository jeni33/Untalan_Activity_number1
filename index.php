<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (isset($_SESSION['username'])) {
        $message = $_SESSION['username'] . " is already logged in. please wait for it to log out first.";
    } else {
            {
            if (empty($username) || empty($password)) {
                $message = "Both fields are required!";
            } else {  
                $_SESSION['username'] = $username;
                $message = "<h3>Logged in: $username</h3>";
            }
        }
    }
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $message = "You have been logged out!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <form method="POST" action=""><br><br>
        <label for="username">Username: <input type="text" id="username" name="username"></label><br><br>
        <label for="password">Password: <input type="password" id="password" name="password"></label><br><br>
        <input type="submit" name="login" value="Login" class="button"><br><br>
        <input type="submit" name="logout" value="Logout" class="button"><br><br>
    </form>

    <p><?php echo $message; ?></p>
</body>
</html>
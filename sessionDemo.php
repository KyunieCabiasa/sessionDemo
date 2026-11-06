<?php
// initialize session
session_start();

// if nakalogin na, mag redirect na sa dashboard.php
if (isset($_SESSION['user_i'])) {
    header("Location: dashboard.php");
    exit;
}

// kunware ay kinuha sa database, since wala pa tayong setup ng database
$correct_username = "admin";
$correct_password = md5("password");

// Variable na maghahawak sa ERROR!
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($username === $correct_username && $password === $correct_password) {
        session_regenerate_id(true);

        // setting up the session name with assigned value
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

// so sa backend natin ininternal ko nalang muna para madali pero pwede nyo
// naman yang gawin na nakahiwalay ang file para mas malinis ang code base nyo!
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Session Demo</title>
</head>
<body>

    <!-- Title -->
    <h1>Login Form with Session</h1>

    <!-- condition if may error -->
    <?php if ($error) { ?>
        <p style="color: red;"><?= $error ?></p>
    <?php } ?>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>

        <label>Password</label>
        <input type="password" name="password" required>
        <br>

        <button type="submit">Login</button>
    </form>

    <p>
        <i>Default Credentials: admin/password</i>
    </p>

</body>
</html>
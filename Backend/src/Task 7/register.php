<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['logout'])) {
    $name = trim($_POST['name'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name === '' || $password === '') {
        $message = 'Please enter both your name and password.';
    } else {
        $_SESSION['registered_user'] = [
            'name' => $name,
            'password' => $password,
        ];

        $message = 'Registration successful. Please log in.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        nav { display: flex; justify-content: flex-end; gap: 10px; align-items: center; }
        .nav-link, .btn { text-decoration: none; border: 1px solid #333; padding: 8px 12px; color: #111; background: #f4f4f4; }
        .box { max-width: 420px; margin: 40px auto; }
        input { width: 100%; padding: 10px; margin: 8px 0 14px; }
        .message { color: green; }
    </style>
</head>
<body>
    <nav>
        <a class="nav-link" href="register.php">Register</a>
        <a class="nav-link" href="login.php">Login</a>
    </nav>

    <div class="box">
        <h2>Register</h2>

        <?php if ($message !== ''): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name">

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">

            <button class="btn" type="submit">Register</button>
        </form>
    </div>
</body>
</html>

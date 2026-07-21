<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        nav { display: flex; justify-content: flex-end; gap: 10px; align-items: center; }
        .btn { border: 1px solid #333; padding: 8px 12px; background: #f4f4f4; color: #111; text-decoration: none; cursor: pointer; }
        .box { max-width: 420px; margin: 40px auto; text-align: center; }
        form { display: inline; }
    </style>
</head>
<body>
    <nav>
        <span><?php echo htmlspecialchars($_SESSION['user']['name']); ?></span>
        <form method="post">
            <button class="btn" type="submit" name="logout" value="1">Logout</button>
        </form>
    </nav>

    <div class="box">
        <h2>Profile</h2>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>.</p>
    </div>
</body>
</html>

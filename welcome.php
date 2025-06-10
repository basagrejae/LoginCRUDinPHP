<?php
require_once 'includes/config_session.inc.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Welcome</title>
</head>

<body>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['user_id']) ?>!</h2>
    <p><a href="includes/logout.php">Logout</a></p>
</body>

</html>
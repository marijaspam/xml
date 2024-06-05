<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Uspješno ste prijavljeni, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="logout.php">Odjava</a>
</body>
</html>

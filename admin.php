<?php
session_start();

$haslo_admina = "admin123";

if (isset($_SESSION['admin'])) {
    header("Location: panel_admina.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $haslo = $_POST["haslo"];
    if ($haslo === $haslo_admina) {
        $_SESSION['admin'] = true;
        header("Location: panel_admina.php");
        exit;
    } else {
        $blad = "Nieprawidłowe hasło!";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Logowanie administratora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Logowanie administratora</h1>
    <?php if (!empty($blad)) echo "<p style='color:red;'>$blad</p>"; ?>
    <form method="POST">
        <label>Hasło:</label>
        <input type="password" name="haslo" required>
        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>

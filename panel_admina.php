<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin.php");
    exit;
}

require 'config.php';

// Pobranie wszystkich rezerwacji
$sql = "SELECT * FROM rezerwacje ORDER BY data_start DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>🔐 Panel administratora</h1>

    <div style="margin-bottom: 20px;">
        <a href="index.php">🏠 Powrót do formularza</a> |
        <a href="wyloguj.php">🚪 Wyloguj</a>
    </div>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Imię i nazwisko</th>
            <th>Auto</th>
            <th>Data od</th>
            <th>Data do</th>
            <th>Akcje</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['imie'] . ' ' . $row['nazwisko']) ?></td>
            <td><?= htmlspecialchars($row['auto']) ?></td>
            <td><?= $row['data_start'] ?></td>
            <td><?= $row['data_koniec'] ?></td>
            <td>
                <a href="edytuj.php?id=<?= $row['id'] ?>">✏️ Edytuj</a> |
                <a href="usun.php?id=<?= $row['id'] ?>" onclick="return confirm('Na pewno usunąć?');">🗑️ Usuń</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

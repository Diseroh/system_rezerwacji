<?php
require 'config.php';

$sql = "SELECT * FROM rezerwacje ORDER BY data_start ASC";
$wynik = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista rezerwacji</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista wszystkich rezerwacji</h1>
    <a href="index.php">➕ Dodaj rezerwację</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Auto</th>
            <th>Od</th>
            <th>Do</th>
        </tr>

        <?php if ($wynik->num_rows > 0): ?>
            <?php while($row = $wynik->fetch_assoc()): ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["imie"] ?></td>
                    <td><?= $row["nazwisko"] ?></td>
                    <td><?= $row["auto"] ?></td>
                    <td><?= $row["data_start"] ?></td>
                    <td><?= $row["data_koniec"] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Brak rezerwacji</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

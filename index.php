<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $auto = $_POST["auto"];
    $data_start = $_POST["data_start"];
    $data_koniec = $_POST["data_koniec"];

    // Sprawdzenie kolizji rezerwacji
    $sql = "SELECT * FROM rezerwacje WHERE auto = ? AND NOT (data_koniec < ? OR data_start > ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $auto, $data_start, $data_koniec);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO rezerwacje (imie, nazwisko, auto, data_start, data_koniec) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $imie, $nazwisko, $auto, $data_start, $data_koniec);
        $stmt->execute();
        echo "<p style='color: green;'>Rezerwacja dodana pomyślnie.</p>";
    } else {
        echo "<p style='color: red;'>To auto jest już zarezerwowane w tym terminie.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj rezerwację</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Dodaj rezerwację</h1>

    <form method="POST">
        <label>Imię:</label>
        <input type="text" name="imie" required>

        <label>Nazwisko:</label>
        <input type="text" name="nazwisko" required>

        <label>Auto:</label>
        <select name="auto" required>
            <option value="Ford Focus">Ford Focus</option>
            <option value="Toyota Corolla">Toyota Corolla</option>
            <option value="Opel Astra">Opel Astra</option>
        </select>

        <label>Data rozpoczęcia:</label>
        <input type="date" name="data_start" required>

        <label>Data zakończenia:</label>
        <input type="date" name="data_koniec" required>

        <button type="submit">Zarezerwuj</button>
    </form>

    <div style="margin-top: 20px;">
        <a href="lista.php">📋 Zobacz istniejące rezerwacje</a> |
        <a href="admin.php">🔐 Panel administratora</a>
    </div>
</body>
</html>

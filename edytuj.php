<?php
require 'config.php';

// Sprawdzenie, czy przekazano ID
if (!isset($_GET['id'])) {
    echo "Brak ID rezerwacji!";
    exit;
}

$id = (int) $_GET['id'];

// Jeśli formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auto = $_POST['auto'];
    $data_start = $_POST['data_start'];
    $data_koniec = $_POST['data_koniec'];

    $stmt = $conn->prepare("UPDATE rezerwacje SET auto = ?, data_start = ?, data_koniec = ? WHERE id = ?");
    $stmt->bind_param("sssi", $auto, $data_start, $data_koniec, $id);
    $stmt->execute();

    header("Location: panel_admina.php");
    exit;
}

// Pobranie danych rezerwacji
$stmt = $conn->prepare("SELECT * FROM rezerwacje WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$rezerwacja = $result->fetch_assoc();

if (!$rezerwacja) {
    echo "Nie znaleziono rezerwacji.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj rezerwację</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>✏️ Edycja rezerwacji</h1>

    <form method="POST">
        <label>Auto:</label><br>
        <input type="text" name="auto" value="<?= htmlspecialchars($rezerwacja['auto']) ?>" required><br><br>

        <label>Data od:</label><br>
        <input type="date" name="data_start" value="<?= $rezerwacja['data_start'] ?>" required><br><br>

        <label>Data do:</label><br>
        <input type="date" name="data_koniec" value="<?= $rezerwacja['data_koniec'] ?>" required><br><br>

        <button type="submit">💾 Zapisz zmiany</button>
    </form>

    <br>
    <a href="panel_admina.php">↩️ Powrót</a>
</body>
</html>

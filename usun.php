<?php
require 'config.php';

if (!isset($_GET['id'])) {
    echo "Brak ID rezerwacji!";
    exit;
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM rezerwacje WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: panel_admina.php");
exit;

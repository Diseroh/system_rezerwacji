<?php
$host = "localhost";
$user = "root";
$password = ""; 
$dbname = "rezerwacja_auta";

$conn = new mysqli($host, $user, $password, $dbname);

// Sprawdzamy połączenie
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}
?>

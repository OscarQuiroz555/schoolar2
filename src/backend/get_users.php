<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['email'])) {
    echo json_encode(["username" => "Invitado", "debug" => "No hay email en sesión"]);
    exit();
}

echo json_encode(["username" => "Invitado", "debug" => "Email en sesión: " . $_SESSION['email']]);
exit();
?>

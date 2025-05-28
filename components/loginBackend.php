<?php
session_start();
require_once("dbaccess.php");
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SICHERE Variante mit Prepared Statement
    $stmt = $db_obj->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $message = "Login erfolgreich! 🟢";// hier dan verlinkung zu KD login
    } else {
        $message = "User nicht vorhanden!"; 
    }
    $stmt->close();
}
?>
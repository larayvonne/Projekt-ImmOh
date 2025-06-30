<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data['productId'])) {
    $id = intval($data['productId']);
    $type = isset($data['type']) ? $data['type'] : 'default';

    if (!isset($_SESSION['cart'][$type])) {
        $_SESSION['cart'][$type] = [];
    }

    if (!isset($_SESSION['cart'][$type][$id])) {
        $_SESSION['cart'][$type][$id] = 1;
    } else {
        $_SESSION['cart'][$type][$id]++;
    }

    echo json_encode(['success' => true]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Ungültige Anfrage.']);
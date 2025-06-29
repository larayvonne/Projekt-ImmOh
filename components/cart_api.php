<?php
session_start();
require_once 'dbaccess.php';
require_once 'products.php';

header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($action === 'add') {
    if ($id <= 0) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Fehlende Produkt-ID.']);
        exit;
    }
    $product = getWohnungById($conn, $id);
    if (!$product) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Produkt nicht gefunden.']);
        exit;
    }

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => (float)$product['price'],
            'qty' => 1
        ];
    } else {
        $_SESSION['cart'][$id]['qty'] += 1;
    }

    echo json_encode(['success' => true, 'name' => $product['name']]);
    exit;
}

if ($action === 'remove') {
    if ($id > 0 && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
        echo json_encode(['success' => true]);
        exit;
    }
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Produkt nicht gefunden.']);
    exit;
}

http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Ungültige Anfrage.']);

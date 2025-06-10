<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$action = $_POST['action'] ?? '';
$id = $_POST['id'] ?? '';
if ($action === 'add') {
    $name = $_POST['name'] ?? '';
    $price = (float)($_POST['price'] ?? 0);
    if ($id !== '') {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = ['id' => $id, 'name' => $name, 'price' => $price, 'qty' => 1];
        } else {
            $_SESSION['cart'][$id]['qty'] += 1;
        }
    }
    echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
    return;
}
if ($action === 'remove') {
    if ($id !== '' && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
    echo json_encode(['success' => true, 'cart' => $_SESSION['cart']]);
    return;
}
echo json_encode(['success' => false]);

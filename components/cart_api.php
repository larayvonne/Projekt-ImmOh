<?php 
session_start();
require_once 'dbaccess.php';
require_once 'products.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

header('Content-Type: application/json');

if ($action === 'add') {
    if ($id <= 0) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Fehlende Produkt-ID.']);
        return;
    }
    if ($id === '') {
        $item = getWohnungById($conn, $id);
    if (!$item) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Produkt nicht gefunden.']);
        return;
    }

        $name = $item['name'];
    $description = $item['description'];
    $price = (float)$item['price'];

    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'qty' => 1
        ];
    } else {
        $_SESSION['cart'][$id]['qty'] += 1;
    }

         if (isset($_SESSION['user_id'])) {
        $uid = (int)$_SESSION['user_id'];
        $stmt = $conn->prepare(
            "INSERT INTO cart_items (user_id, item_id, name, description, price, quantity) VALUES (?, ?, ?, ?, ?, 1) " .
            "ON DUPLICATE KEY UPDATE quantity = quantity + 1"
        );
        if ($stmt) {
            $stmt->bind_param('iissd', $uid, $id, $name, $description, $price);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    http_response_code(200);
    echo json_encode(['success' => true, 'name' => $name]);
    return;
}

if ($action === 'remove') {
     if ($id > 0 && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
        if (isset($_SESSION['user_id'])) {
            $uid = (int)$_SESSION['user_id'];
            $stmt = $conn->prepare('DELETE FROM cart_items WHERE user_id = ? AND item_id = ?');
            if ($stmt) {
                $stmt->bind_param('ii', $uid, $id);
                $stmt->execute();
                $stmt->close();
            }
        }
        http_response_code(200);
        echo json_encode(['success' => true]);
        return;
    }

     http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Produkt nicht gefunden.']);
    return;
}
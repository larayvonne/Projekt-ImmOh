<?php 
session_start();
require_once 'dbaccess.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';
$id = $_POST['id'] ?? '';

if ($action === 'add') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = (float)($_POST['price'] ?? 0);

    if ($id === '') {
        http_response_code(400); // fehlermeldung
        echo "Fehlende Produkt-ID.";
        return;
    }

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

    http_response_code(200); // Korrekte Bearbeitung prod. hinzugefügt
    echo "Produkt hinzugefügt.";
    return;
}

if ($action === 'remove') {
    if ($id !== '' && isset($_SESSION['cart'][$id])) {
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
        http_response_code(200); // Korrekte bearbeitung prod. entfernt
        echo "Produkt entfernt.";
        return;
    }

    http_response_code(400); // fehlermeldung 
    echo "Produkt nicht gefunden.";
    return;
}

http_response_code(400); // fehlermeldung 
echo "Ungültige Aktion.";

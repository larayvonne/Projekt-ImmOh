<?php 
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_POST['action'] ?? '';
$id = $_POST['id'] ?? '';

if ($action === 'add') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = (float)($_POST['price'] ?? 0);

    if ($id !== '') {
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

        http_response_code(200); // Korrekte bearbeitung prod. hinzugefügt 
        echo "Produkt hinzugefügt.";
        return;
    }

    http_response_code(400); // fehlermeldung 
    echo "Fehlende Produkt-ID.";
    return;
}

if ($action === 'remove') {
    if ($id !== '' && isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
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

<?php
session_start();

// JSON einlesen
$data = json_decode(file_get_contents("php://input"), true);

// Validierung
if (!isset($data['productId'])) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "productId fehlt"]);
    exit;
}

$productId = intval($data['productId']);
$cartKey = "secondhand_" . $productId;

// Menge erhöhen oder neu setzen
$prev = isset($_SESSION['cart'][$cartKey]) ? (int)$_SESSION['cart'][$cartKey] : 0;
$_SESSION['cart'][$cartKey] = $prev + 1;

echo json_encode(["success" => true, "message" => "Produkt zum Warenkorb hinzugefügt."]);
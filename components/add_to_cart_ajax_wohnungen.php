<?php
session_start();

// Prüfen, ob die Anfrage per POST kam und der Parameter vorhanden ist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wohnung_id'])) {
    $wohnungId = intval($_POST['wohnung_id']);

    // Session initialisieren, falls nicht vorhanden
    if (!isset($_SESSION['cart']['wohnungen'])) {
        $_SESSION['cart']['wohnungen'] = [];
    }

    // Wohnung hinzufügen oder Anzahl erhöhen
    if (!isset($_SESSION['cart']['wohnungen'][$wohnungId])) {
        $_SESSION['cart']['wohnungen'][$wohnungId] = 1;
    } else {
        $_SESSION['cart']['wohnungen'][$wohnungId]++;
    }

    // Antwort als JSON zurücksenden 
    echo json_encode([
        'success' => true,
        'wohnung_id' => $wohnungId
    ]);
    exit;
}

// Falls die Anfrage ungültig ist, Fehlermeldung senden
echo json_encode([
    'success' => false,
    'message' => 'Ungültige Anfrage oder fehlender Parameter.'
]);
exit;
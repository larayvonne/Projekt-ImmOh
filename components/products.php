<?php
function getWohnungen(mysqli $conn): array {
    $wohnungen = [];
    $stmt = $conn->prepare('SELECT id, name, description, price, image, detail_page FROM wohnungen');
    if ($stmt && $stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $wohnungen[] = $row;
        }
        $stmt->close();
    }
    return $wohnungen;
}

function getWohnungById(mysqli $conn, int $id): ?array {
    $stmt = $conn->prepare('SELECT id, name, description, price FROM wohnungen WHERE id = ?');
    if (!$stmt) {
        return null;
    }
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        $stmt->close();
        return null;
    }
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    return $data ?: null;
}

function searchWohnungen(mysqli $conn, string $query): array {
    $wohnungen = [];
    $stmt = $conn->prepare('SELECT id, name, description, price, image, detail_page FROM wohnungen WHERE name LIKE ?');
    if ($stmt) {
        $like = '%' . $query . '%';
        $stmt->bind_param('s', $like);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $wohnungen[] = $row;
            }
        }
        $stmt->close();
    }
    return $wohnungen;
}
?>

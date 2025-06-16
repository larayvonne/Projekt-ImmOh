<?php
Session_start();
require_once "../components/dbaccess.php";
if (!$conn) {
  die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}


$meldung = null;
$fehlerFelder = [];

$vorname = $nachname = $adresse = $plz = $ort = $land = $email = $password = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $vorname  = trim($_POST['vorname'] ?? '');
  $nachname = trim($_POST['nachname'] ?? '');
  $adresse  = trim($_POST['adresse'] ?? '');
  $plz      = trim($_POST['plz'] ?? '');
  $ort      = trim($_POST['ort'] ?? '');
  $land     = trim($_POST['land'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (empty($vorname)) $fehlerFelder[] = 'vorname';
  if (empty($nachname)) $fehlerFelder[] = 'nachname';
  if (empty($adresse)) $fehlerFelder[] = 'adresse';
  if (empty($plz)) $fehlerFelder[] = 'plz';
  if (empty($ort)) $fehlerFelder[] = 'ort';
  if (empty($land)) $fehlerFelder[] = 'land';
  if (empty($email)) $fehlerFelder[] = 'email';
  if (empty($password)) $fehlerFelder[] = 'password';

  if (count($fehlerFelder) > 0) {
    $meldung = "Bitte alle Felder ausfüllen.";
  }
  if (!preg_match('/^(\d{4}|\d{5})$/', $plz)) {
    $meldung = "Bitte eine gültige PLZ mit 4 oder 5 Ziffern eingeben.";
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //E-Mail prüfen
    $check = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
      $meldung = "Diese E-Mail ist bereits registriert.";
    } else {
      $stmt = $conn->prepare(
        "INSERT INTO user (vorname, nachname, adresse, plz, ort, land, email, password)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
      );

      if ($stmt) {
        $stmt->bind_param("ssssssss", $vorname, $nachname, $adresse, $plz, $ort, $land, $email, $hashedPassword);
        if ($stmt->execute()) {
          $_SESSION['meldung'] = "Registrierung erfolgreich!";
          header("Location: index.php");
          exit;
        } else {
          $meldung = "Fehler beim Speichern: " . $stmt->error;
        }
        $stmt->close();
      } else {
        $meldung = "Statement konnte nicht vorbereitet werden.";
      }
    }
    $check->close();
  }
  $conn->close();
}

if ($stmt->execute()) {
  $_SESSION['meldung'] = "Registrierung erfolgreich!";
  unset($_SESSION['form']);
  if (!headers_sent()) {
    header("Location: regis.php");
    exit;
  } else {
    echo "<p>Keine Weiterleitung möglich – bitte im Backend prüfen.</p>";
  }

  header("Location: index.php");
  exit;
}

?>

<?php if (isset($meldung)) echo "<script>alert('$meldung');</script>"; ?>
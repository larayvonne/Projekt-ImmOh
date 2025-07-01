<?php
session_start();
if (!isset($_SESSION['rolle']) || $_SESSION['rolle'] !== 'admin') {
  header("Location: login.php");
  exit();
}
require_once "../components/dbaccess.php";

?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Benutzerverwaltung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="resources/immohIcon.png" />
  <link rel="stylesheet" href="../css/cssLayout.css" />
  <link rel="stylesheet" href="../css/cssAdmin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<?php include("../components/header.php"); ?>

<body>
  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Benutzerverwaltung</li>
      </ol>
    </nav>
    <div class="container">
      <h2 class="mb-4">Benutzerverwaltung</h2>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Rolle</th>
            <th>Status</th>
            <th>Aktion</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $stmt = $conn->prepare("SELECT id, vorname, nachname, rolle, aktiv FROM user");
          $stmt->execute();
          $result = $stmt->get_result();
          while ($row = $result->fetch_assoc()) {
            $statusText = $row['aktiv'] ? 'Aktiv' : 'Inaktiv';
            $rowClass = $row['aktiv'] ? '' : 'inaktiv';
            echo "<tr class='$rowClass'>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['vorname']}</td>";
            echo "<td>{$row['nachname']}</td>";
            echo "<td>{$row['rolle']}</td>";
            echo "<td>$statusText</td>";
            echo "<td>";
            if ($row['aktiv']) {
              echo "<form method='POST' action='deactivate_user.php' onsubmit='return confirm(\"Benutzer wirklich deaktivieren?\");'>";
              echo "<input type='hidden' name='id' value='{$row['id']}'>";
              echo "<button type='submit' class='btn btn-sm btn-danger'>Deaktivieren</button>";
              echo "</form>";
            } else {
              echo "-";
            }
            echo "</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </main>

  <script src="../js/function.js"></script>
  <?php include("../components/footer.php"); ?>

</body>

</html>
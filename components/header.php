<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
  if (!isset($conn)) require_once "../components/dbaccess.php";
}
?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light replace-bg-light sticky-top">
    <div class="container-fluid">

      <!-- Logo immOH! -->
      <div class="immohGrid">
        <span id="imm"><a href="../php/index.php">imm</a></span>
        <span id="O"><a href="../php/index.php">O</a></span>
        <span id="H"><a href="../php/index.php">H</a></span>
        <span id="Rufzeichen"><a href="../php/index.php">!</a></span>
      </div>
      </a>

      <!-- Toggler Button für Mobilgeräte -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Navigation umschalten">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigationsinhalt -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="bauDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Unternehmen
            </a>
            <ul class="dropdown-menu" aria-labelledby="bauDropdown">
              <li><a class="dropdown-item" href="https://www.bkms-system.net/bkwebanon/report/clientInfo?cin=23WS19&c=-1&language=ger">Hinweis geben</a></li>
              <li><a class="dropdown-item" href="../php/team.php">Team</a></li>
            </ul>
          </li>

          <!-- Dropdown Bauprojekte -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="bauDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Bauprojekte
            </a>
            <ul class="dropdown-menu" aria-labelledby="bauDropdown">
              <li><a class="dropdown-item" href="../php/bauvorhaben.php">Bauvorhaben</a></li>
              <li><a class="dropdown-item" href="../php/rothneusiedl.php">Rothneusiedl</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../php/wohnungen.php">Wohnungen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../php/news.php">News</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../php/kontakt.php">Kontakt</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../php/cart.php">Warenkorb</a>
          </li>

        </ul>

        <!-- Login & Registrieren -->
        <ul class="navbar-nav ms-auto">
          <?php if (isset($_SESSION['user_email'])): ?>
            <li class="nav-item">
              <span class="nav-link disabled">
                Willkommen, <?= htmlspecialchars($_SESSION['vorname'] ?? 'Nutzer') ?>!
              </span>
            </li>

            <!-- Profilbild laden -->
            <?php
            if (!isset($conn)) require_once "../components/dbaccess.php";

            $profilbild = 'default.png';
            if (isset($_SESSION['user_id'])) {
              $stmt = $conn->prepare("SELECT profilbild FROM user WHERE id = ?");
              $stmt->bind_param("i", $_SESSION['user_id']);
              $stmt->execute();
              $stmt->bind_result($bild);
              if ($stmt->fetch() && $bild) {
                $profilbild = $bild;
              }
              $stmt->close();
            }
            ?>

            <li class="nav-item">
              <img src="../uploads/<?= htmlspecialchars($profilbild) ?>"
                alt="Profilbild"
                class="rounded-circle"
                style="width: 40px; height: 40px; object-fit: cover; margin-left: .5rem; margin-right: .5rem;">
            </li>


            <?php if (isset($_SESSION['user_id'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="profil.php">Mein Profil</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link text-primary" href="logout.php">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link text-primary" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="regis.php">Registrieren</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Bootstrap JS notwendig für Dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
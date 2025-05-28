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
            <a class="nav-link" href="../php/warenkorb.php">Warenkorb</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../php/usermenu.php">Mein Konto</a>
          </li>
        </ul>

        <!-- Login & Registrieren -->
        <div class="d-flex">
          <a class="text-decoration-none me-3" href="../php/login.php">Login</a>
          <a class="text-decoration-none" href="../php/regis.php">Registrieren</a>
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- Bootstrap JS notwendig für Dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


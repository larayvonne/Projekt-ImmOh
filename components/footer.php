<footer class="footer-darkblue text-white pt-3">
  <div class="d-flex justify-content-center gap-3 mb-3">
    <a href="https://at.linkedin.com/company/immoh"
      class="btn btn-outline-light btn-md rounded-circle border-2" style="width: 2.5rem;"
      aria-label="LinkedIn">
      <i class="fab fa-linkedin-in"></i></a>

    <a href="https://www.facebook.com/profile.php?id=100090517007322"
      class="btn btn-outline-light btn-md rounded-circle border-2" style="width: 2.5rem;" aria-label="Facebook">
      <i class="fab fa-facebook-f"></i></a>
  </div>

  <div class="container text-center">
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
      <a href="../php/kontakt.php" class="btn btn-outline-light btn-sm">Kontakt</a>
      <a href="../php/agb.php" class="btn btn-outline-light btn-sm">AGB</a>
      <a href="../php/datenschutz.php" class="btn btn-outline-light btn-sm">Datenschutz</a>
      <a href="../php/impressum.php" class="btn btn-outline-light btn-sm">Impressum</a>
    </div>

    <div class="small">
      © 2025 immOH! - Alle Rechte vorbehalten.
    </div>
  </div>

  <div class="container mt-3"></div>
  <div class="d-flex justify-content-between mb-3">
    <?php if (isset($_SESSION['rolle']) && $_SESSION['rolle'] === 'Admin'): ?>
      <a href="../php/admin.php" class="btn btn-outline-light btn-sm ms-5">Admin</a>
    <?php endif; ?>
    <button onclick="scrollToTop()" class="btn btn-outline-light btn-sm me-5 d-lg-none" id="back-to-top">↑ Nach oben </button>
  </div>
</footer>
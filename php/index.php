<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hauptseite</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="resources/immohIcon.png" />
  <link rel="stylesheet" href="../css/cssLayout.css" />
  <link rel="stylesheet" href="../css/cssIndex.css" />
  <link rel="stylesheet" href="../css/cssParalax.css" />
  <link rel="stylesheet" href="../css/cssCarusel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<script>
  window.addEventListener("DOMContentLoaded", function() {
    const toastEl = document.getElementById('toastRegistrierung');
    if (toastEl) {
      const toast = new bootstrap.Toast(toastEl, {
        delay: 3000
      });
      toast.show();
    }
  });
</script>

<?php include("../components/header.php"); ?>
<body class="replace-bg-dark">

  <?php if (isset($_SESSION['meldung'])): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div class="toast show align-items-center toast-custom-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <?= htmlspecialchars($_SESSION['meldung']) ?>
          </div>
          <button type="button" class="btn-close custom-close-blue me-2 m-auto" data-bs-dismiss="toast" aria-label="Schließen"></button>
        </div>
      </div>
    </div>
    <?php unset($_SESSION['meldung']); ?>
  <?php endif; ?>

  <div class="position-relative overflow-hidden">
    <div class="geo-bg">
    <img src="../resources/immoh.webp" class="w-100 h-100 object-fit-cover z-n1" draggable="false">
    </div>
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="text-container position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end align-items-center text-center text-white p-3">
      <h5>Verwaltung mit System, Service mit Herz</h5>
      <a href="../php/team.php" class="btn btn-outline-light btn-sm">Mehr Infos</a>
    </div>
  </div>

  <main>
    <p>
      <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../resources/news/news1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../resources/news/news2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../resources/news/news3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../resources/news/news4.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </p>
    <?php echo $_SESSION['rolle']; ?>
  </main>
  
  <?php include("../components/footer.php"); ?>
  <script src="../js/parallax.js"></script>
  <script src="../js/function.js"></script>

</body>
</html>
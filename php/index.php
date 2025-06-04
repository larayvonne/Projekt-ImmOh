<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hauptseite</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="resources/immohIcon.png" />
  <link rel="stylesheet" href="../css/cssIndex.css" />
  <link rel="stylesheet" href="../css/cssLayout.css" />
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

<body>
  <?php include("../components/header.php"); ?>

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
    <img src="../resources/immoh.webp" class="w-100 h-100 object-fit-cover z-n1" alt="Hintergrundbild">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="text-container position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end align-items-center text-center text-white p-3">
      <h5>Verwaltung mit System, Service mit Herz</h5>
      <a href="../php/team.php" class="btn btn-outline-light btn-sm">Mehr Infos</a>
    </div>
  </div>

  <main class="replace-bg-dark">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quae nemo aut, corrupti quidem ipsum saepe cupiditate quas ea ad debitis eligendi architecto sit esse ullam voluptate. Veniam, incidunt earum?</p>
  </main>

  <?php include("../components/footer.php"); ?>
  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  </script>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
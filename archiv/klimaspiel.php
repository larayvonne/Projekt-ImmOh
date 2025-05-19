<!--hier muss noch struktur gemacht werdne und spiel am besten in eine contaienr, damit Start button,usw, bei spielstart verschwinden muss das inn js festgelegt werden-->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klimaspiel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssklimaspiel.css">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>

  </style>
</head>

<body class="replace-bg-klimaspiel">
  <?php include("../components/header.php"); ?>
  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.html">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Klimaspiel </li>
      </ol>
    </nav>
    <div class="headline">
      </head>

      <body>
        <div class="gamestart">
          <h1>Klimaspiel: Sammle den Müll!</h1>
          <p>Säubere die Umwelt – fang so viele Müllstücke wie möglich in 10 Sekunden!</p>
          <button id="start-btn">Los geht’s!</button>
        </div>
        <div id="score">Gesammelter Müll: 0</div>
        <div id="game-area"></div>

        <script src="../js/klimaspiel.js"></script>
    </div>
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
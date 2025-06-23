<?php
require_once "../components/dbaccess.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wohnungen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssWohnungen.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<?php include("../components/header.php"); ?>

<body class="replace-bg-dark">

  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark " href="index.html">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          KlimaWohnungen </li>
      </ol>
    </nav>
    <div class="headline">
      <h1 class="replace-text-primary">ImmOH! KlimaWohnungen - nachhaltig und günstig wohnen</h1>
      <p>Leistbares und umweldfreundliches Wohnen, damit Sie im Altag Gutes für die Umwelt und Ihre Geldbörse tun. </p>
      <br>
    </div>
    <div class="box">
      <div class="section reverse">
        <div class="text">
          <h2>Familienwohnung mit Gartenzugang</h2>
          <h2>(4-Zimmer, 95 m²)</h2>
          <h5>Ideal für Familien, die naturnah und dennoch urban wohnen möchten.</h5>

          <p> ⋅ Großzügiger Wohn-Essbereich mit offener Küche</p>

          <p> ⋅ Drei Schlafzimmer, ideal für Kinder oder Homeoffice</p>

          <p> ⋅ Direktzugang zum privaten Gartenanteil</p>

          <p> ⋅ Barrierefrei & mit hochwertiger Holzbauweise</p>

          <p> ⋅ Nur wenige Gehminuten zu Kindergarten und Schule</p>

          <p> ⋅ Fernwärme & Solarenergie sorgen für geringe Betriebskosten</p>

          <p> ⋅ Kaufpreis: ab € 1.250,- / m²</p>
          <a class="button" href=../php/w1.php>Weitere Informationen</a>
          <button class="addToCart button" data-id="1" data-name="Familienwohnung mit Gartenzugang" data-description="4-Zimmer, 95 m²" data-price="1250">Zum Warenkorb hinzufügen</button>
        </div>
        <div class="image">
          <img src="../resources/products/wohnung1.jpg" alt="Bild 1">
        </div>
      </div>


      <div class="section">
        <div class="text">
          <h2>Smart-Apartment für Singles oder Paare</h2>
          <h2>(2-Zimmer, 52 m²)</h2>
          <h5>Perfekt für Berufstätige, Studierende oder Paare mit modernem Lebensstil.</h5>

          <p> ⋅ Effiziente Raumaufteilung mit viel Stauraum</p>

          <p> ⋅ Wohnküche mit Zugang zur Loggia mit Grünblick</p>

          <p> ⋅ Nachhaltige Materialien wie Lehmputz und Ziegel</p>

          <p> ⋅ Nähe zur U1-Endstation: 15 Minuten in die City</p>

          <p> ⋅ Fahrradabstellraum & E-Ladestation im Haus</p>

          <p> ⋅ Kaufpreis: ab € 790,- / m²</p>
           <a class="button" href=../php/wohnungen/w2.php>Weitere Informationen</a>
          <button class="addToCart button" data-id="2" data-name="Smart-Apartment" data-description="2-Zimmer, 52 m²" data-price="790">Zum Warenkorb hinzufügen</button>
        </div>
        <div class="image">
          <img src="../resources/products/wohnung2.jpg" alt="Bild 2">
        </div>
      </div>


      <div class="section reverse">
        <div class="text">
          <h2>Dachgeschoss-Loft mit Weitblick</h2>
          <h2>(3-Zimmer, 78 m²)</h2>
          <h5>Für Individualisten, Kreative oder Paare mit Wunsch nach etwas Besonderem.</h5>

          <p> ⋅ Offenes Loft-Design mit sichtbaren Holzbalken</p>

          <p> ⋅ Große Dachterrasse mit Blick über die Grünräume Rothneusiedls</p>

          <p> ⋅ Begrüntes Dach sorgt für gutes Mikroklima</p>

          <p> ⋅ Smart-Home-Steuerung für Licht, Heizung, Sicherheit</p>

          <p> ⋅ Nähe zu Ateliers, Co-Working-Spaces & Cafés</p>

          <p> ⋅ Kaufpreis: ab € 1.150,- / m²</p>
           <a class="button" href=../php/wohnungen/w3.php>Weitere Informationen</a>
          <button class="addToCart button" data-id="3" data-name="Dachgeschoss-Loft" data-description="3-Zimmer, 78 m²" data-price="1150">Zum Warenkorb hinzufügen</button>
        </div>
        <div class="image">
          <img src="../resources/products/wohnung3.jpg" alt="Bild 3">
        </div>
      </div>


      <div class="section">
        <div class="text">
          <h2>Generationenwohnung – barrierefrei & gemeinschaftsnah</h2>
          <h2>(3-Zimmer, 68 m²)</h2>
          <h5>Für Senioren oder generationenübergreifendes Wohnen mit Komfort.</h5>

          <p> ⋅ Ebenerdig mit Zugang zu gemeinschaftlichem Innenhof & Garten</p>

          <p> ⋅ Zwei Schlafzimmer und ein flexibel nutzbarer Raum</p>

          <p> ⋅ Nähe zu Nahversorgung, medizinischer Betreuung & Freizeitangeboten</p>

          <p> ⋅ Teil eines "Mehrgenerationenhauses" mit Gemeinschaftsräumen</p>

          <p> ⋅ Nachhaltige Bauweise mit Lehm und Holz</p>

          <p> ⋅ Kaufpreis: ab € 880,- / m²</p>
           <a class="button" href=../php/wohnungen/w4.php>Weitere Informationen</a>
          <button class="addToCart button" data-id="4" data-name="Generationenwohnung" data-description="3-Zimmer, 68 m²" data-price="880">Zum Warenkorb hinzufügen</button>
        </div>
        <div class="image">
          <img src="../resources/products/wohnung4.jpg" alt="Bild 4">
        </div>
      </div>
    </div>

    <div class="end">
      <h2>Ein nachhaltiger Stadtteil für Wien </h2>
      <div class="container end">
        <div class="row row-cols-1 row-cols-md-3">
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tree" viewBox="0 0 16 16">
                <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507" />
              </svg>
              Nachhaltige Materialien</h5>
            <p>Verwendung von Holz, Lehm, Ziegeln und anderen Naturbaustoffen, die wenig Energie bei der Herstellung verbrauchen und gut recycelt werden können.</p>
          </div>
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
              </svg>
              Energieeffizienz</h5>
            <p>Optimale Wärmedämmung, Nutzung passiver Solarwärme und Installation erneuerbarer Energien wie Solar- oder Wärmepumpen.</p>
          </div>
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
                <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
              </svg>
              Ganzheitliche Betrachtung</h5>
            <P>Berücksichtigung der gesamten Lebensdauer eines Gebäudes, von der Planung bis zur Entsorgung, und Optimierung von Ressourcenverbrauch, Flächennutzung und CO2-Ausstoß.</P>
          </div>

        </div>
      </div>
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
  <script src="../js/cart.js"></script>
</body>

</html>
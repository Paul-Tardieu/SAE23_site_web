<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical + - Pôle Chirurgie, Oncologie & Services Médico Techniques</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="../img/logo.png" alt="logo">
    </div>
    <?php
  // Démarrer la session
  session_start();

  // Message de Bonjour avec nom et prénom
  echo '<h1>Bonjour, ' . $_SESSION["prenom"] . ' ' . $_SESSION["nom"] . '</h1>';

  ?>
    <a href="compte.php">Se déconnecter</a>
    <nav>
      <ul>
        <li><a href="edt.php">Emploi du temps</a></li>
        <li><a href="rdv.php">Rendez-vous</a></li>
        <li><a href="patient.php">Patients</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
        <?php
        // Affichage du pole correspondant
        if (isset($_SESSION['pole'])) {
          if ($_SESSION['pole'] == 'pole1') {
              echo '<h3>Pôle Chirurgie, Oncologie & Services Médico Techniques</h3>';
              
          } else if ($_SESSION['pole'] == 'pole2') {
              echo'<h3>Pôle Geriatrie Autonomie</h3>';

          } else if ($_SESSION['pole'] == 'pole3') {
            echo'<h3>Pôle Médecine, Femme, Mère & Enfant</h3>';
          }
        }
        ?>
        <img src="../img/f.jpg" alt="image du pôle" class="center-image">
    </section>
  </main>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical + - Patient</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <header>
    <div class="logo">
        <a href="pole1-2-3.php"><img class="logo" src="../img/logo.png" alt="Logo"></a>
    </div>
    <h1>Medical +</h1>
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
      <h3>Patient</h3>

      <form>
        <div class="partie-formulaire">
          <h3>Sélectionnez le patient :</h3>
          <select id="patient-select">
            <option value="patient1">Patient 1</option>
            <option value="patient2">Patient 2</option>
            <option value="patient3">Patient 3</option>
            <!-- Ajoutez d'autres options pour les autres patients -->
          </select>
        </div>

        <div id="dossier-patient">
          <h3>Dossier du patient</h3>
          <p>Informations du dossier patient</p>
        </div>

        <input type="submit" value="Rechercher">
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>

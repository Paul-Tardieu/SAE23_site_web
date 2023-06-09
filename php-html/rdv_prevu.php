<!DOCTYPE html>
<html>
<head>
  <title>Rendez-vous prévu</title>
  <link rel="stylesheet" type="text/css" href="../css/rdv_prevu.css">
</head>
<body>
  <header>
    <a href="acceuil.html"><img class="logo" src="../img/logo.png" alt="Logo"></a>
    <h1>Rendez-vous prévu</h1>
  </header>
  
  <section>
    <h2>Gestion des rendez-vous prévus</h2>
    <div class="actions">
      <button id="voirPatientBtn">Voir un patient</button>
      <button id="selectionnerMedecinBtn">Sélectionner un médecin</button>
    </div>
    
    <div class="recherche">
      <h3>Rechercher un rendez-vous :</h3>
      <label for="date">Date :</label>
      <input type="date" id="date" name="date">
      <label for="heure">Heure :</label>
      <input type="time" id="heure" name="heure">
      <input type="submit" value="Rechercher">
    </div>
    
    <div class="resultat-recherche">
      <h3>Rendez-vous prévu :</h3>
      <table>
        <thead>
          <tr>
            <th>Heure</th>
            <th>Salle</th>
            <th>Pôle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>09:00</td>
            <td>Salle A</td>
            <td>Pôle Cardiologie</td>
          </tr>
          <tr>
            <td>10:30</td>
            <td>Salle B</td>
            <td>Pôle Pédiatrie</td>
          </tr>
          <!-- Ajoutez ici les autres rendez-vous prévus -->
        </tbody>
      </table>
    </div>
  </section>
  
  <script src="script.js"></script>
</body>
</html>

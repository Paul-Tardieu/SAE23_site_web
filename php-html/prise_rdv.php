<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical_data";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
<head>
  <title>Prise de RDV</title>
  <link rel="stylesheet" type="text/css" href="../css/prise_rdv.css">
</head>
<body>
  <header>
    <a href="acceuil.html"><img class="logo" src="../img/logo.png" alt="Logo"></a>
    <h1>Prise de RDV</h1>
  </header>
  
  <section>
    <h2>Informations du rendez-vous</h2>
    <form action="traitement_formulaire.php" method="post">
      <div class="partie-formulaire">
        <h3>Choix du patient existant :</h3>
        <select name="patient">
            <option value="">Sélectionnez un patient</option>
            <?php
            $stmt = $conn->query('SELECT id, nom, prenom FROM patients');
            while ($row = $stmt->fetch())
            {
                echo '<option value="'.$row['id'].'">'.$row['prenom'].' '.$row['nom'].'</option>';
            }
            ?>
        </select>
      </div>
      
      <div class="partie-formulaire">
        <h3>Choix du médecin existant :</h3>
        <select name="medecin">
            <option value="">Sélectionnez un médecin</option>
            <?php
            $stmt = $conn->query('SELECT id, nom FROM users WHERE status IN ("pole1", "pole2", "pole3")');
            while ($row = $stmt->fetch())
            {
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
            }
            ?>
        </select>
      </div>
      
      <div class="partie-formulaire">
        <h3>Date et heure du rendez-vous :</h3>
        <input type="datetime-local" name="date_heure" required>
      </div>
      
      <input type="submit" value="Prendre RDV">
    </form>
  </section>
</body>
</html>
<?php
$conn->close();
?>

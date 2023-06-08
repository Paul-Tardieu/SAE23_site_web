<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Création de compte et Connexion</title>
  <link rel="stylesheet" type="text/css" href="../css/compte.css">
</head>
<body>
  <a href="index.html"><img class="logo" src="../img/logo.png" alt="Logo"></a>
  <?php
      // Démarrer la session
      session_start();

      // Vérifier s'il y a un message d'erreur
      if (isset($_SESSION['erreur'])) {

        // Afficher le message d'erreur
        echo '<div class="error-message ">' . $_SESSION['erreur'] . '</div>';

        // Supprimer le message d'erreur de la session
        unset($_SESSION['erreur']);
      }
      // Supression totale des données de session en cas de retour a la page de connexion
      session_destroy();
      ?>
  <div class="container">
    <div class="form-container">
      
      <h2>Création de compte</h2>
      <form id="creation-form" action="traitement_creation_compte.php" method="POST">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <label for="confirmation_mot_de_passe">Confirmation mot de passe :</label>
        <input type="password" id="confirmation_mot_de_passe" name="confirmation_mot_de_passe" required><br>

        <label for="pole">Pôle :</label>
        <select id="pole" name="pole">
          <option value="pole1">Pôle Chirurgie, Oncologie & Services Médico Techniques</option>
          <option value="pole2">Pôle Geriatrie Autonomie</option>
          <option value="pole3">Pôle Médecine, Femme, Mère & Enfant</option>
          <option value="pole4">Acceuil</option>
        </select><br>

        <input type="hidden" name="action" value="inscription">

        <input type="submit" value="Créer un compte">
      </form>

    </div>
    <div class="form-container">

      <h2>Connexion</h2>
      <form id="connexion-form" action="traitement_connexion.php" method="POST">
        <label for="email_connexion">Email :</label>
        <input type="email" id="email_connexion" name="email_connexion" required><br>

        <label for="mot_de_passe_connexion">Mot de passe :</label>
        <input type="password" id="mot_de_passe_connexion" name="mot_de_passe_connexion" required><br>

        <input type="hidden" name="action" value="connexion">

        <input type="submit" value="Se connecter">

      </form>

    </div>
  </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Nouveau Patient</title>
  <link rel="stylesheet" type="text/css" href="../css/nouveau_patient.css">
</head>
<body>
  <header>
    <a href="acceuil.html"><img class="logo" src="../img/logo.png" alt="Logo"></a>
  </header>
  
  <section>
    <h1>Nouveau Patient</h1>
    <form action="traitement_formulaire.php" method="post">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>
      
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>
      
      <label for="date_naissance">Date de naissance :</label>
      <input type="date" id="date_naissance" name="date_naissance" required>
      
      <label for="email">E-mail :</label>
      <input type="email" id="email" name="email" required>
      
      <label for="num_secu_sociale">Numéro de sécurité sociale :</label>
      <input type="text" id="num_secu_sociale" name="num_secu_sociale" required>
      
      <label for="num_telephone">Numéro de téléphone :</label>
      <input type="tel" id="num_telephone" name="num_telephone" required>
      
      <label for="antecedents_medicaux">Antécédents médicaux :</label>
      <textarea id="antecedents_medicaux" name="antecedents_medicaux" rows="4" required></textarea>
      
      <input type="submit" value="Enregistrer">
    </form>
  </section>
</body>
</html>


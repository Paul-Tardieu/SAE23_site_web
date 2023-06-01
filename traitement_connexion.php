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

// Traitement de la connexion au compte:
// Récupérer les données du formulaire
$email = $_POST['email_connexion'];
$password = $_POST['mot_de_passe_connexion'];

$sql = "SELECT * FROM Users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si le couple e-mail/mot de passe correspond, rediriger vers la sous-page
    echo "Connexion réussie";
    header("Location: souspage.html");
} else {
    // Si le couple e-mail/mot de passe ne correspond pas, afficher une erreur
    echo "E-mail ou mot de passe incorrect";
}

$conn->close();
?>
<?php
$//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "medical_data";

$servername = "194.199.227.110";
$username = "u22106412";
$password = "335460";
$dbname = "db_TARDIEU_2";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Traitement de l'inscription:
// Récupérer les données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['mot_de_passe'];
$password_confirm = $_POST['confirmation_mot_de_passe'];
$status = $_POST['pole'];

// Vérifier si l'email existe déjà
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si l'email existe déjà
    echo "Cet email est déjà utilisé";
    } else {
        // Vérifier si les mots de passe correspondent entre eux
        if ($password != $password_confirm) {
            echo "Les mots de passe ne correspondent pas";
            exit;
            }
        // Si l'email n'existe pas encore, insérer les données dans la base de données
        $sql = "INSERT INTO users (prenom, nom, email, password, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nom, $prenom, $email, $password, $status);

        if ($stmt->execute()) {
            echo "Inscription réussie";
            // Redirection vers la sous-page
            header("Location: souspage.html");
            } else {
                echo "Erreur : " . $sql . "<br>" . $conn->error;
                }
    }
$conn->close();
?>
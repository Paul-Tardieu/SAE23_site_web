<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical_data";

//$servername = "localhost";
//$username = "u22106412";
//$password = "335460";
//$dbname = "db_TARDIEU_2";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
sftp://u22106412@194.199.227.110/home/TARDIEU-Paul/public_html/SAE23_site_web/traitement_creation_compte.php

// Démarrer la session
session_start();

// Traitement de l'inscription:
// Récupérer les données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['mot_de_passe'];
$password_confirm = $_POST['confirmation_mot_de_passe'];
$status = $_POST['pole'];

// Stockage des varibales dans la session
$_SESSION['email_connexion'] = $email;
$_SESSION['pole'] = $status;
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;

// Vérifier si l'email existe déjà
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si l'email existe déjà, stocker le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Cet email est déjà utilisé";
    // Rediriger vers la page de connexion
    header('Location: compte.php');
    exit();
    } else {
        // Vérifier si les mots de passe correspondent entre eux
        if ($password != $password_confirm) {
            // si les mots de passe ne sont pas identiques
            $_SESSION['erreur'] = "Les mots de passe ne correspondent pas";
            // Rediriger vers la page de connexion
            header('Location: compte.php');
            exit;
            }
        // Si l'email n'existe pas encore, insérer les données dans la base de données
        $sql = "INSERT INTO users (prenom, nom, email, password, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nom, $prenom, $email, $password, $status);

        if ($stmt->execute()) {
            echo "Inscription réussie";
            // Redirection vers la sous-page en fonction du pole:
            if (isset($_SESSION['pole'])) {
                if ($_SESSION['pole'] == 'pole1' || $_SESSION['pole'] == 'pole2' || $_SESSION['pole'] == 'pole3') {
                    header('Location: pole1-2-3.php');
                    exit;
                } else if ($_SESSION['pole'] == 'pole4') {
                    header('Location: acceuil.php');
                    exit;
                }
            }
            } else {
                echo "Erreur : " . $sql . "<br>" . $conn->error;
                }
    }
$conn->close();
?>
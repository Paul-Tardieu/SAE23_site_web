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

// Démarrer la session
session_start();

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
    // Si le couple e-mail/mot de passe correspond:

    // Préparation de la requête SQL afin d'obtenir toutes variables de sessions de l'utilisateur avec l'email $email
    $sql = "SELECT * FROM users WHERE email = ?";

    // Préparation de la requête
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bind_param("s", $email);

    // Exécution de la requête
    $stmt->execute();

    // Obtention du résultat
    $result = $stmt->get_result();

    // Récupération de la ligne de résultat sous forme de tableau associatif
    $row = $result->fetch_assoc();

    // Stockage des varibales dans la session
    $_SESSION['email_connexion'] = $email;
    $_SESSION['pole'] = $row['status'];
    $_SESSION['nom'] = $row['nom'];
    $_SESSION['prenom'] = $row['prenom'];
 
    // Rediriger vers la page de l'utilisateur en fonction du pole
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
    // Si le couple e-mail/mot de passe ne correspond pas, stocker le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Mot de passe ou e mail incorrect";
    // Rediriger vers la page de connexion
    header('Location: compte.php');
    exit();
}

$conn->close();
?>
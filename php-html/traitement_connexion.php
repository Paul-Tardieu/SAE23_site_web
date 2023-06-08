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

// Récupérer les données du formulaire
$email = $_POST['email_connexion'];
$password = $_POST['mot_de_passe_connexion'];

$sql = "SELECT * FROM Users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Vérifier le mot de passe
    if (password_verify($password, $user['password'])) {
        // Stockage des varibales dans la session
        $_SESSION['email_connexion'] = $email;
        $_SESSION['pole'] = $user['status'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
 
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
        // Si le mot de passe est incorrect, stocker le message d'erreur dans une variable de session
        $_SESSION['erreur'] = "Mot de passe incorrect";
        // Rediriger vers la page de connexion
        header('Location: compte.php');
        exit();
    }
} else {
    // Si l'email n'existe pas, stocker le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "E-mail incorrect";
    // Rediriger vers la page de connexion
    header('Location: compte.php');
    exit();
}

$conn->close();
?>

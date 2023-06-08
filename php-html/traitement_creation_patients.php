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

// Démarrer la session
session_start();

// Récupérer les données du formulaire
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$birthdate = $_POST['date_naissance'];
$num_secu = $_POST['num_secu_sociale'];
$num_tel = $_POST['num_telephone'];
$antecedents = $_POST['antecedents_medicaux'];

// Vérifier si le numéro de sécurité sociale existe déjà
$sql = "SELECT * FROM Patients WHERE num_secu = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $num_secu);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si le numéro de sécurité sociale existe déjà, faire un message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Ce numéro de sécurité sociale est déjà utilisé";
    // Rediriger vers la page de création de patient
    header('Location: creation_patient.php');
    exit();
} else {
    // Si le numéro de sécurité sociale n'existe pas encore, insérer les données dans la base de données
    $sql = "INSERT INTO Patients (prenom, nom, birthdate, num_secu, num_tel, antecedents) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Association des valeurs aux paramètres dans la requête SQL. s=string, d=date
    $stmt->bind_param("ssssss", $prenom, $nom, $birthdate, $num_secu, $num_tel, $antecedents);

    if ($stmt->execute()) {
        echo "Création du patient réussie";
        // Redirection vers la page appropriée après la création
        header('Location: acceuil.php');
        exit;
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

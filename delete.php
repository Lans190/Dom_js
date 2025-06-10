<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bibliotheque_db';

$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Préparer la requête DELETE
$stmt = $conn->prepare("DELETE FROM livres WHERE categorie = ?");

// Catégorie à supprimer
$categorie = "Romans historiques";

$stmt->bind_param("s", $categorie);

if ($stmt->execute()) {
    echo "Suppression réussie des livres de la catégorie '$categorie'.";
} else {
    echo "Erreur lors de la suppression : " . $conn->error;
}

$stmt->close();
$conn->close();
?>

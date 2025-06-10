<?php
// Informations de connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = ''; 
$dbname = 'bibliotheque_db';

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les livres de la catégorie "Science-fiction"
$sql = "SELECT image FROM livres WHERE categories = 'Science-fiction'";
$result = $conn->query($sql);

// Affichage des noms de fichiers image
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['image']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun livre trouvé dans la catégories Science-fiction.";
}


$conn->close();
?>

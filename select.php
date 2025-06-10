<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$dbname = 'bibliotheque_db';


$conn = new mysqli($host, $user, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête pour sélectionner les livres de Jean Dupont
$sql = "SELECT titre, image FROM livres WHERE auteur = 'Jean Dupont'";

$result = $conn->query($sql);

// Affichage des résultats dans un tableau HTML
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Titre</th><th>Image</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['titre']) . "</td>";
        echo "<td><img src='" . htmlspecialchars($row['image']) . "' width='100'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun livre trouvé pour l'auteur jean Dupont.";
}

$conn->close();
?>

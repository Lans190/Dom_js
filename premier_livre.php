<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bibliotheque_db';


$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Requête SQL : tri alphabétique, limitation à 5
$sql = "SELECT titre FROM livres ORDER BY titre ASC LIMIT 5";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<ul>\n";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['titre']) . "</li>\n";
    }
    echo "</ul>\n";
} else {
    echo "Aucun livre trouvé.";
}

$conn->close();
?>

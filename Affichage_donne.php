<?php
$host = 'localhost'; 
$username = 'root';  
$password = '';     
$dbname = 'bibliotheque_db'; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


$sql = "SELECT titre, auteur FROM livres";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Titre</th><th>Auteur</th></tr>";
    
    // Affichage des résultats ligne par ligne
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["titre"]) . "</td><td>" . htmlspecialchars($row["auteur"]) . "</td></tr>";
    }
    
    // Fin du tableau HTML
    echo "</table>";
} else {
    echo "Aucun livre trouvé.";
}


$conn->close();
?>

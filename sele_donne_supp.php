<?php
$host = 'localhost'; 
$username = 'root';  
$password = '';      
$dbname = 'bibliotheque_db'; 


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour sélectionner les livres publiés après 2000
$sql = "SELECT titre, annee_publication FROM livres WHERE annee_publication > 2000";

// Exécution de la requête
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    echo "<table><tr><th>Titre</th><th>Année de publication</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["titre"] . "</td><td>" . $row["annee_publication"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Aucun livre trouvé.";
}

// Fermeture de la connexion
$conn->close();
?>

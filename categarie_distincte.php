<?php

$host = 'localhost';   
$username = 'root';           
$password = '';               
$dbname = 'bibliotheque_db';     


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


$sql = "SELECT DISTINCT categories FROM livres ORDER BY categories ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<ul>\n";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row['categories']) . "</li>\n";
    }
    echo "</ul>\n";
} else {
    echo "Aucune catégories trouvée.";
}

$conn->close();
?>

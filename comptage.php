<?php
$host = 'localhost';
$username = 'root';  
$password = '';      
$dbname = 'bibliotheque_db';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


$sql = "SELECT COUNT(*) AS total_livres FROM livres";


$result = $conn->query($sql);


if ($result) {
   
    $row = $result->fetch_assoc();
    echo "Nombre total de livres : " . $row['total_livres'];
} else {
    echo "Erreur lors de la récupération du nombre de livres : " . $conn->error;
}


$conn->close();
?>

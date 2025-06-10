<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bibliotheque_db';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$annee_publication = '';
$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la nouvelle année depuis le formulaire
    $nouvelle_annee = isset($_POST['annee_publication']) ? (int)$_POST['annee_publication'] : 0;

    if ($nouvelle_annee > 0) {
        // Mettre à jour la base
        $stmt = $conn->prepare("UPDATE livres SET annee_publication = ? WHERE titre = ?");
        $titre = "Le mystère des sables";
        $stmt->bind_param("is", $nouvelle_annee, $titre);
        if ($stmt->execute()) {
            $message = "Mise à jour réussie !";
        } else {
            $message = "Erreur lors de la mise à jour : " . $conn->error;
        }
        $stmt->close();
    } else {
        $message = "Veuillez saisir une année valide.";
    }
}

// Récupérer les données actuelles pour afficher dans le formulaire
$stmt = $conn->prepare("SELECT annee_publication FROM livres WHERE titre = ?");
$titre = "Le mystère des sables";
$stmt->bind_param("s", $titre);
$stmt->execute();
$stmt->bind_result($annee_publication);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour année de publication</title>
</head>
<body>
    <h2>Mise à jour de l'année de publication du livre "Le mystère des sables"</h2>

    <?php if ($message): ?>
        <p><strong><?php echo htmlspecialchars($message); ?></strong></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="annee_publication">Année de publication actuelle :</label><br>
        <input type="number" id="annee_publication" name="annee_publication" value="<?php echo htmlspecialchars($annee_publication); ?>" required><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>

<?php
$connection = mysqli_connect('localhost', 'root', 'daniel2468', 'c_gestionStock');

// Vérifier la connexion
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Récupération des données du formulaire
// $counter_query = "SELECT count(*) as counter FROM Famille";
// $counter_result = mysqli_query($connection, $counter_query);
// $counter_row = mysqli_fetch_assoc($counter_result);
// $counter = $counter_row['counter'] + 1;
// $id_famille = 'FAM'. $counter;

$nom_famille = $_POST["nom_famille"];

// Insertion des données dans la base de données
$req = "INSERT INTO famille(ID_Famille, Nom_Famille, ID_Admin) VALUES ('', '$nom_famille', 'ADMIN1')";

$result = mysqli_query($connection, $req);

// Vérifier si l'insertion a réussi
if ($result) {
    echo "Insertion réussie dans la table 'famille'";
} else {
    echo "Erreur lors de l'insertion : ". mysqli_error($connection);
}

// Fermer la connexion à la base de données
mysqli_close($connection);
?>

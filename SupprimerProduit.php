<?php
$connection = mysqli_connect('localhost', 'root', 'daniel2468', 'c_gestionStock');

// Vérifier la connexion
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Récupérer l'ID du produit à supprimer depuis la requête AJAX
$idProduit = $_POST['idProduit'];

// Requête SQL pour supprimer le produit
$sql = "DELETE FROM Produit WHERE ID_Produit = '$idProduit'";
$result = $connection->query($sql);

// Vérifier si la suppression a réussi
if ($result) {
    echo "Suppression réussie";
} else {
    echo "Erreur lors de la suppression : " . mysqli_error($connection);
}

// Fermer la connexion à la base de données
mysqli_close($connection);
?>

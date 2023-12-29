<?php
require "connexion.php";

$nom_produit = $_POST["name"];
$id_famille_produit = $_POST["productFamily"];
$nbreunit = $_POST["nombre_unitaire"];
$prix = $_POST["PU"];
$description = $_POST["description"];
$Admin = $_POST["Admin"];
$image_url = $_POST["productImage"];

// Génération de l'identifiant du produit
// $counter_query = "SELECT count(*) as counter FROM Produit";
// $counter_result = mysqli_query($connection, $counter_query);
// $counter_row = mysqli_fetch_assoc($counter_result);
// $counter = $counter_row['counter'] + 1;
// $ID_Produit = 'PROD'. $counter;

// Insertion des données dans la table "Produit"
$Nbpresent = 0;
$req = "INSERT INTO QuantiteStock (Nbre_Unitaire,Nbre_produit_present) VALUES ('$nbreunit','$Nbpresent')";
$resultat=mysqli_query($connection,$req);
$last_id = mysql_insert_id($connection);

$req_produit = "INSERT INTO Produit (ID_Produit, ID_Famille, Libelle, descript,ID_Admin, PU, ID_Quantite,ImageURL)
VALUES (\"\",\"$id_famille_produit\",\"$nom_produit\",\"$description\",\"$Admin\", $prix, $last_id ,\"$image_url\")";

$result_produit = mysqli_query($connection, $req_produit);

// Vérification de l'insertion
if ($result_produit) {
    echo "Insertion réussie dans la table Produit";
} else {
    echo mysqli_error($connection);
}

// Fermer la connexion à la base de données
mysqli_close($connection);
?>

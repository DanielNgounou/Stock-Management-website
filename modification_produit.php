<?php

require "connexion.php";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Récupération des données du formulaire
        $idProduit = $_POST["ID_Produit"] ?? "";
        $nomProduit = $_POST["name"] ?? "";
        $familleProduit = $_POST["productFamily"] ?? "";
        $stockProduit = $_POST["quantite"] ?? "";
        $descriptionProduit = $_POST["description"] ?? "";
        $prix=$_POST["PU"] ?? "";
        // Mettre à jour les données du produit
        $sql = "UPDATE produit SET
        ID_Famille = '$familleProduit',
        Libelle = '$nomProduit',
        descript = '$descriptionProduit',
        PU = $prix;
        ID_Quantite = $stockProduit,
        WHERE ID_Produit = $idProduit";
        // Exécuter la requête
        $resultat = mysqli_query($connection, $sql);
        // Vérifier si la requête a réussi
        if ($resultat)
        {
            // Rediriger vers la page de liste des produits
            header('Location:"Liste produits.php"');
        }
        else
        {
            // Afficher une erreur
            echo "Erreur lors de la mise à jour du produit";
        }
    }

?>

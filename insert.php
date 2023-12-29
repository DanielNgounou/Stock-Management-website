<?php
require("confi.php");

   
    if(isset($_POST["nom"]) && isset($_POST["email"]) ){        // && isset($_POST["contact"]
        $conn=connect();
        $nom=$_POST["nom"];
        $localite=$_POST["email"];
     $requete="INSERT INTO fournisseur(ID_Fournisseur,Nom,email) VALUES('','$nom','$localite') ";
     $resultat=mysqli_query($conn,$requete);
     if(!$resultat){
        echo("erreur");

     }
     header("location:adminbar.php");

    }













?>
<?php

require("confi.php");

function Selection(){
    $conn= connect();
    $requete="SELECT * from Fournisseur ";
   // $requete="select *
 ///    * from Fournisseur,fournir where fournir.ID_Fournisseur=Fournirsseur.ID_Fournisseur";
    $resultat = mysqli_query($conn,$requete);
    if($resultat){
        return $resultat;
    }
    else {
        echo("erreur");
    }

}













?>
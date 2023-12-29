<?php

require("confi.php");

if(isset($_POST['nom']) && isset($_POST['localite']) && isset($_POST['contact']) &&  isset($_POST['id'])){
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $id=$_POST['id'];
    $conn=connect();
    $requete="UPDATE  Fournisseur SET Nom='$nom' , email='$email' where ID_Fournisseur='$id' ";
    $resultat=mysqli_query($conn,$requete);
    if(!$resultat){
        echo("erreur");
    }
}
header("location:adminbar.php");

?>
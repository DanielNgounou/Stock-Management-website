<?php
require("confi.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
    $conn=connect();
    $requete="delete from fournisseur where id_fournisseur='$id'";
    $resultat=mysqli_query($conn,$requete);

    if(!$resultat){
       echo("erreur");
    }
  
}
 header("location:adminbar.php");
?>
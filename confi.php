<?php

function connect(){
 
    $connexion = mysqli_connect("localhost","root","daniel2468","c_gestionStock");
    if($connexion){
        return $connexion;
    }
    else{
        return "echec de connexion";
    }
    mysqli_close($connexion);

}


?>
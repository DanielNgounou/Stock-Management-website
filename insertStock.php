<?php
//Database credentials
$host = "localhost";
$user = "root";
$pass = "daniel2468";
$db = "c_gestionStock";

// Connect to the database
$conn = mysqli_connect($host,$user,$pass) or die ("Connection failed: " . mysqli_error());

//select the database
mysqli_select_db ($conn, $db) or die ("Database selection failed:" .mysqli_error($conn));

date_default_timezone_set('Africa/Douala');
$actualDate = date('Y-m-d');
$chaine =  $_POST ['produit'];
$produit = explode("#",$chaine);
$id_prod = $produit[0];
$id_quantite = $produit[2];
$qte_present = intval($produit[1]);

$qtefourni =  mysqli_real_escape_string($conn, intval($_POST ['Qte_fourni']));

$new_quantite = $qte_present + $qtefourni;


$id_fn = mysqli_real_escape_string($conn, $_POST ['fournisseur']);



//Creating the sql query
$sql = "INSERT INTO Fournir (ID_Produit,ID_Fournisseur,Date_Fourni,Nbre_Produit) VALUES ('$id_prod','$id_fn','$actualDate','$qtefourni')";
$sql2 = "UPDATE QuantiteStock set Nbre_Groupe = 0, Nbre_produit_present = '$new_quantite' where ID_Quantite = '$id_quantite';";

//Execute the query
$result1 = mysqli_query($conn,$sql) or die ("Query failed: " . mysqli_error($conn));
$result2 = mysqli_query($conn,$sql2) or die ("Query failed: " . mysqli_error($conn));

// Check if the query was successful
// if ($result1) {
//     echo "Data inserted successfully";
//   } else {
//     echo "Data insertion failed";
//   }
//   if ($result2) {
//     echo "Data upadated successfully";
//     echo $qte_present; 
//   } else {
//     echo "Data update failed";
//   }


?>
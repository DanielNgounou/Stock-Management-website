<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      :root{
        --color-sage: #006c58
        --back:#FFE7CE;
      }
      input[type=text]{
    box-shadow: isset 1px 0px 0px;
    height:35px;    
   width:80%;  
   background-color:  #D9D9D9;
   color:black;

    border-radius:7px;   
}

.for{
      color:#FFE7CE;
    width:38%;
    border:1px solid black;
    background-color: white;

    animation: transition(-50%,50%);
    height: 350px;
    position: absolute;
    align-items:center;
     z-index:1000;
     left:30%;
     top:10%;

  }
  
input[type=submit]{
    background-color:var(--back);
    height:35px;
     color:var(--back);

    background-color: #006c58;
    width: 90px;
 }
input[type=reset]{
    height:35px;
     box-shadow:2px 0px 2px 0px;
     background-color: #006c58;
     color:var(--color-sage);
     width: 90px;



 }


    </style>
</head>
<body>
    

<?php



$id=$_GET['id'];


?>
<form action="modifier.php" method="post" class="for"><br>
<div class="head">
   <h2 color="#FFE7CE">Modification d'un fournisseur</h3><br></div>

        <input type="text"  name="id" value="<?= $id?>" readonly="readonly"><br><br>
        <input type="text"  value="" placeholder=" Entrer le nouveau nom" name="nom" required><br><br>

        <input type="text" value="" placeholder=" Entrer le nouveau email" name="email" required><br><br>
        <!-- <input type="number" value="" placeholder="entrer son contact" name="contact" required><br><br> -->
        <input type="submit" value="Modifier"> <input type="reset" value="Annuler">
</form>


 
</body>
</html>
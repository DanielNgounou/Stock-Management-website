<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       table thead  tr{
            height:30px;

        }
        tr th{
            border: 1px solid black;

           width:250px;
        }
        h1{
            text-align:center;
            font-family:arial;
        }
        tbody td{
            height:35px;
            text-align:center;
             border:1px solid black; 
        }
        .matable{
    
        width:15%;
        border-collapse:collapse;
         /* //font-weight:100px;  */

        }
    </style>
</head>
<body>
    
        <h1>Liste des Fournisseurs</h1>

    <table class="matable">
        <thead>
        <tr>
        <th>NOM du fournisseur </th>
        <th> email </th>
        <th> produit  fournir </th></tr>
        </thead>
        <tbody>
        <?php
        require("select.php");
            $valeur1=Selection();
        while($valeur=mysqli_fetch_assoc($valeur1)){
            ?>
            <tr>
                <td><?=$valeur['Nom'] ?></td>
                <td><?= $valeur['email']  ?></td>
                <td><?= $valeur['Nom']  ?></td>
            </td>


            </tr>
            
        <?php  
        }?>
    
   
    </tbody>

    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion De Stock</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100;600;700&family=Freckle+Face&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">
    <link rel="stylesheet" href="./style-2.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        /* img{
            height: 35px;
            width:28px; 
           background-color: #006c5890;
            decoration:white;
            justify-content:space-evenly;


        } */
        /* i{
            height: 35px;
            width:28px; 
        } */
        tr td a i{
            height: 35px;
            width:28px; 
        }
    </style>
</head>
<body>

<?php
    // Create connection
    $connection = mysqli_connect("localhost", "root", "daniel2468","c_gestionStock");

    // Check connection
    if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    }

    // Select data
    $sql1 = mysqli_query($connection, "SELECT ID_Client,Nom,Prenom FROM Client");
    $sql2 = mysqli_query($connection, "SELECT ID_Produit,Libelle,PU,produit.ID_Quantite,QuantiteStock.Nbre_produit_present as quantite from produit,QuantiteStock where produit.ID_Quantite = QuantiteStock.ID_Quantite;");
    $sql3 = mysqli_query($connection, "SELECT ID_Fournisseur,Nom FROM Fournisseur" );
?>

<!-- sideBar -->

<div class="sideBar">
    <div class="loginPad">
        <p class="logo">OnlineShop</p>
        <div class="account">
            <i class="uis uis-user-md"></i><p>Mon compte</p>
        </div>
    </div>
    <div class="menuPad">
        <a href="" class="links">
            <div class="link-content">
                <i class="uil uil-chart-line"></i><div class="headlines">Tableau de bord</div> 
            </div>
        </a>
        <a href="" class="links">
            <div class="link-content">
                <i class="uil uil-file-info-alt"></i><div class="headlines">Rapport</div> 
            </div>            
        </a>
        <a href="Liste produit.php" class="links">
            <div class="link-content">
                <i class="uil uil-box"></i><div class="headlines"> Produit</div>
            </div>        
        </a>
        <a href="adminbar.php" class="links">
            <div class="link-content">
                <i class="uil uil-truck"></i><div class="headlines">Fournisseurs</div> 
            </div>            
        </a>
        <div class="dropdown">
            <a class="links">
                <div class="link-content">
                    <i class="uil uil-truck-loading"></i><div class="headlines">Bon de Commande</div> 
                </div>        
            </a>
            <div class="dropdown-content">
                <a href="commFournisseurs.php" class="links">
                    <div class="link-content">
                        <div class="headlines">Commande Fournisseurs</div> 
                    </div>        
                </a>
                <a href="commClient.php" class="links">
                    <div class="link-content">
                        <div class="headlines">Commande Clients</div> 
                    </div>        
                </a>
            </div>
        </div>
        <div class="dropdown">
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-user"></i><div class="headlines">Utilisateur</div> 
                </div>           
            </a>
            <div class="dropdown-content">
                <a href="Client.php" class="links">
                    <div class="link-content">
                        <div class="headlines">Clients</div> 
                    </div>        
                </a>
                <a href="" class="links">
                    <div class="link-content">
                        <div class="headlines">Admin</div> 
                    </div>        
                </a>
            </div>
        </div>



    </div>
</div>

<!-- End sideBar -->


<!-- main -->
<div class="main">
    
    <!-- ---------------------------- Fournisseur-------------------------------------------- -->
 
    <div class="headpad">
        <h1>Fournisseur</h3>
        <p>consulter la liste de vos fournisseurs et en ajouter ou supprimer!</p>
    </div>
    
   
    <div class="headings">
        <i class="uil uil-list-ul"></i>
        <h3>Liste des fournisseurs</h3>
    </div>
   <table id = "table">
    <tbody>
        <tr>
            <th><p>Nom Fournisseur</p></th>
            <th><p>Email</p></th>
            <th><p>ID_Fournisseur</p></th>
            <th><p>Action</p></th>
        </tr>
        
    <?php
    require("select.php");
         $valeur1=Selection();
     while($valeur=mysqli_fetch_assoc($valeur1)){
        ?>
        <tr>
            <td><?=$valeur['Nom'] ?></td>
            <td><?= $valeur['email']  ?></td>
            <td><?= $valeur['ID_Fournisseur']  ?></td>
            <td><a href="deletefournisseur.php?id=<?=$valeur['ID_Fournisseur']?> "> <i class="uil uil-trash-alt"></i><a href="Formulairemodifier.php?id=<?= $valeur['ID_Fournisseur']?>  
            "><i class="uil uil-edit"></i></a>
           </td>
        </tr>
        
    <?php  
     }?>
   </table>

    <a type="button" onclick="togglePopup() " class="button-links">
        <i class="uil uil-plus-circle"></i> <div class="content">Ajouter un fournisseur</div> 
    </a>

    <a href="gen.php" class = "button-links">Cliquez pour telecharger la liste</a>
   </div>

    <!-- ----------------------------End panier-client-------------------------------------------- -->
</div>
    <!-- ============================================POPUP ============================== -->
    <div class="wholePopup" id="popupI">
        <div class="popup-bg"></div>
        <div class="popup">
        <div class="popupHead">
            <h1>Nouveau fournisseur</h1>
        </div>

        <form action="insert.php" method="post" >
            <div class="popupBody">
                
                <div class="fill">
                    <label for="Qte_fourni">Nom du fournisseur</label>
                    <input type="text"  placeholder="entrer le nom du fournisseur" name="nom" required>
                </div>

                <div class="fill">
                    <label for="Qte_fourni">Email du fournisseur</label>
                    <input type="text" placeholder="entrer son email" name="email" required>
                </div>
            </div>
            <div class="popupfooter">
                <button type="submit" onclick="togglePopup()">Enregistrer</button>
                <button onclick="togglePopup()">Annuler</button>
            </div>
        </form>
        
    </div>
    </div>
<!-- End main -->
<script defer >
    
    // function afficherFormulaire(){
    //         var formulaire= document.getElementById("monFormulaire");
    //         formulaire.style.display='block';

    //     }
    //     document.getElementId("monFormulaire").addEventListener('submit',function(){
    //         var formulaire=document.getElementById("monFormulaire");

    //         //formulaire.remove();
    //         formulaire.style.display='none';


    //     })

    //     function remove(){
    //     let bt= document.getElementId("boutton2");
    //      let form=document.getElementId("monFormulaire");
    //     bt.addEventListenner('click', function(){
            
    //     })}

        function togglePopup(){
        document.getElementById("popupI").classList.toggle("active");
    }
</script>

</body>
</html>
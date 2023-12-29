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
    <link rel="stylesheet" href="./style.css">
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
    $sql3 = mysqli_query($connection, "SELECT Libelle,Nom, Date_fourni, Nbre_produit from produit, fournisseur, fournir where produit.ID_Produit = fournir.ID_Produit and fournisseur.ID_Fournisseur = fournir.ID_Fournisseur ORDER BY Date_fourni DESC;" );
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
        <a href="./Rapport.php" class="links">
            <div class="link-content">
                <i class="uil uil-file-info-alt"></i><div class="headlines">Rapport</div> 
            </div>            
        </a>
        <a href="./Liste produit.php" class="links">
            <div class="link-content">
                <i class="uil uil-box"></i><div class="headlines"> Produit</div>
            </div>        
        </a>
        <a href="./adminbar.php" class="links">
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
                <a href="./commFournisseurs.php" class="links">
                    <div class="link-content">
                        <div class="headlines">Commande Fournisseurs</div> 
                    </div>        
                </a>
                <a href="./commClient.php" class="links">
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
    <div class="headpad">
        <h1>Liste des produits fourni</h3>
        <p>Retrouver ici les differents produits deja fourni par les fournisseurs </p>
    </div>

    <div class="headings">
        <h3>La liste des produits fourni est organiser par ordre d'arriver</h3>
    </div>

    <table id="table">
        <tr>
            <th><p>Produit</p></th>
            <th><p>Fournisseur</p></th>
            <th><p>Date Fourni</p></th>
            <th><p>Quantite Fourni</p></th>
        </tr>

        <?php
            while ($row = mysqli_fetch_assoc($sql3)) {
                echo "<tr>";
                echo "<td>" . $row['Libelle'] . "</td>";
                echo "<td>" . $row['Nom'] . "</td>";
                echo "<td>" . $row['Date_fourni'] . "</td>";
                echo "<td>" . $row['Nbre_produit'] . "</td>";
                echo "</tr>";
            }
        ?>

    </table>


    

    
</div>
<!-- End main -->
<script>
    function updatetime(){
        var today = new Date();
        var time = today.toLocaleTimeString();
        document.getElementById("time").innerHTML = time;

        var date = today.toLocaleDateString();
        document.getElementById("date").innerHTML = date;
    }

    setInterval(updatetime,1000);
   
    function glower1(){
        var glow = document.getElementById("glow")
        glow.style.backgroundColor = "#00a284";
    }

    function glower2(){
        var glow = document.getElementById("glow")
        glow.style.backgroundColor = "#006c58";
    }
    
    var current = 1;

    function switcher(){
        if (current == 1){
            glower1();
            current = 2;
        } else {
            glower2();
            current = 1;
        }
    }

    setInterval(switcher,300);
</script>
</body>
</html>
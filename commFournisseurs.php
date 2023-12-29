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
        <h1>Commande Fournisseurs</h3>
        <p>Retrouvez ici la gestion d'Approvisionnement.</p>
    </div>

    <div class="headings">
        <h3>OPERATIONS</h3>
    </div>

    <div class="options">
        <a href="mailto:fourn@gmail.com" class="option-items">
            <h4>Passer une commande</h4>
            <img src="./img/mail.svg" alt="" class="image">
        </a>

        <a href="#" class="option-items" onclick="togglePopup()">
            <h4>Stocker produit fourni</h4>
            <img src="./img/delivery.svg" alt="" class="image">
        </a>

        <a href="./listefourni.php" class="option-items">
            <h4>Liste des produits fourni</h4>
            <img src="./img/product.svg" alt="" class="image">
        </a>

        
    </div>

    <!-- ============================================POPUP ============================== -->
    <div class="wholePopup" id="popupI">
        <div class="popup-bg"></div>
        <div class="popup">
        <div class="popupHead">
            <h1>Stocker Produit</h1>
        </div>

        <form action="insertStock.php" method = "POST">
            <div class="popupBody">
                <div class="fill">
                    <label for="produit">Produit</label>
                    <select name="produit" id="listproduit" >
                    <?php
                        // Loop through the result set
                        while ($row = mysqli_fetch_assoc($sql2)) {
                          // Echo the option element
                          echo "<option value=\"". $row['ID_Produit'] . "#". $row['quantite'] . "#".$row['ID_Quantite'] . "#" .$row['quantite']."\">" . $row['Libelle'] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="fill">
                    <label for="fournisseur">Fournisseur</label>
                    <select name="fournisseur" id="listfournisseur">
                    <?php
                        // Loop through the result set
                        while ($row = mysqli_fetch_assoc($sql3)) {
                          // Echo the option element
                          echo "<option value=\"". $row['ID_Fournisseur'] ."\">" . $row['Nom'] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="fill">
                    <label for="Qte_fourni">Quantite fourni</label>
                    <input type="number" placeholder="Ex0: 15" name="Qte_fourni" required>
                </div>
            </div>
            <div class="popupfooter">
                <button type="submit" class="button-links" onclick="togglePopup()">Ok</button>
                <a class = "button-links"onclick="togglePopup()">Annuler</a>
            </div>
        </form>
        
    </div>
</div>
    
<!-- End main -->
<script>


    function togglePopup(){
        document.getElementById("popupI").classList.toggle("active");
    }
</script>
</body>
</html>
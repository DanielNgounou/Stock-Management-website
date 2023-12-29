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
    <script>
        function togglePopup(){
            document.getElementById("popupI").classList.toggle("active");
        }
    </script>
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
    $sql3 = mysqli_query($connection, "SELECT ID_Client,Nom,Prenom,Email from client;" );
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
        <a href="./Rapport.html" class="links">
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
                <a href="" class="links">
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
        <h1>Gestion Clients</h3>
        <p>Retrouvez ici la liste des clients en meme temps la possibilite d'ajouter un clients</p>
    </div>
    <div class="grid">
        <div class="grid1">
            <table id="table">
                <tr>
                    <th><p>ID_Client</p></th>
                    <th><p>Nom</p></th>
                    <th><p>Prenom</p></th>
                    <th><p>Email</p></th>
                </tr>

                <?php
                    while ($row = mysqli_fetch_assoc($sql3)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID_Client'] . "</td>";
                        echo "<td>" . $row['Nom'] . "</td>";
                        echo "<td>" . $row['Prenom'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        
        <a type="button" onclick="togglePopup() " class="button-links">
            <i class="uil uil-plus-circle"></i> <div class="content">Ajouter un Client</div> 
        </a>
        
        
    </div>
    
    <div class="wholePopup" id="popupI">
        <div class="popup-bg"></div>
        <div class="popup">
            <div class="popupHead">
                <h1>Nouveau Client</h1>
            </div>
            <form action="" method = "POST">
                <div class="popupBody">
                    <div class="fill">
                        <label for="Nom">Nom</label>
                        <input type="text" placeholder="Ex: Ngounou" name="Nom" required>
                    </div>

                    <div class="fill">
                        <label for="Prenom">Prenom</label>
                        <input type="text" placeholder="Ex: Daniel" name="Prenom" required>
                    </div>

                    <div class="fill">
                        <label for="Email">Email</label>
                        <input type="text" placeholder="Ex: example@gmail.com" name="Email" required>
                    </div>

                    <div class="fill">
                        <label for="phone">Telephone</label>
                        <input type="number" placeholder="Ex: 6754391708" name="phone" required>
                    </div>

                    <div class="fill">
                        <label for="password">Mot de passe</label>
                        <input type="password"  name="password" required>
                    </div>

                    <div class="fill adresse">
                        <label >Adresse</label>
                        <div class="button-addresses">
                            <a href="" class="address-button">
                                <img src="./img/choose-home.svg" alt="">
                                <h4>Choisir une Adresse</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="popupfooter">
                    <button type="submit" class="button-links" onclick="togglePopup()">Ok</button>
                    <a class = "button-links"onclick="togglePopup()">Annuler</a>
                </div>
            </form>
    
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
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
        <a href="" class="links">
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
            <a  class="links">
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
        <h1>Commande Client</h3>
        <p>Retrouvez ici la gestion des factures, ventes, modifications des clients </p>
    </div>

    <div class="headings">
        <h3>OPERATIONS</h3>
    </div>

    <div class="options">
        <a href="./vente.php" class="option-items">
            <h4>Nouvelle vente du client</h4>
            <img src="./img/shopping (1).svg" alt="" class="image">
        </a>

        <a href="#" class="option-items">
            <h4>Regler Facture</h4>
            <img src="./img/invoice.svg" alt="" class="image">
        </a>

        <a href="#" class="option-items">
            <h4>Liste des factures</h4>
            <img src="./img/list.svg" alt="" class="image">
        </a>

        
    </div>
    
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
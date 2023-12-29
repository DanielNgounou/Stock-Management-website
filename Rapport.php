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
        <h1>Rapport</h3>
        <p>Exporter vos different rapport au forat pdf ou excel </p>
    </div>

    <div class="export">
        <div class="export-items">
            <p>Exporter la liste des produits</p>
            <div class="export-actions">
                <button>PDF</button>
                <button>EXCEL</button>
            </div>
        </div>
        <div class="export-items">
            <p>Exporter la liste des Fournisseurs</p>
            <div class="export-actions">
                <button>PDF</button>
                <button>EXCEL</button>
            </div>
        </div>
        <div class="export-items">
            <p>Exporter la liste des livraisons</p>
            <div class="export-actions">
                <button>PDF</button>
                <button>EXCEL</button>
            </div>
        </div>
        <div class="export-items">
            <p>Exporter la liste des bons de commande</p>
            <div class="export-actions">
                <button>PDF</button>
                <button>EXCEL</button>
            </div>
        </div>
        <div class="export-items">
            <p>Exporter la liste des produits en rupture</p>
            <div class="export-actions">
                <button>PDF</button>
                <button>EXCEL</button>
            </div>
        </div>
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
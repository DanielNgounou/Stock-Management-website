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
    <script src = "./java.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src = "./enregistrer_panier.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        <a href="" class="links">
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
            <a  class="links">
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
        <h1>Nouvelle Vente</h3>
        <p>Editer les panier de vos clients ici !!</p>
    </div>
    <!-- --------------------------------pad-vente-------------------------------- -->
    <form action="">
       <div class="pad-vente">
            <?php
                // Create connection
                $connection = mysqli_connect("localhost", "root", "daniel2468","c_gestionStock");

                // Check connection
                if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
                }

                // Select data
                $sql1 = mysqli_query($connection, "SELECT ID_Client,Nom,Prenom FROM Client");
                $sql2 = mysqli_query($connection, "SELECT ID_Produit,Libelle,PU,QuantiteStock.Nbre_produit_present from produit,QuantiteStock where produit.ID_Quantite = QuantiteStock.ID_Quantite;");
            ?>
            <div class="sub header">
                <div class="datetime">
                    <i class="uil uil-clock"></i>
                    <span id="time"></span>
                    <i class="uil uil-calendar-alt"></i>
                    <span id="date"></span>
                </div>

                <div class="field">
                    <label for="client">Clients</label>
                    <select name="client" id="listclient">
                    <?php
                        // Loop through the result set
                        while ($row = mysqli_fetch_assoc($sql1)) {
                          // Echo the option element
                          echo "<option value='" . $row['ID_Client'] . "'>" . $row['Nom'] ." ". $row ['Prenom'] . "</option>";
                        }
                    ?>
                    </select>
                </div>

                <div class="field" id="glow">
                    <label for="produit">Produit</label>
                    <select name="produit" id="listproduit" onchange = "fill()">
                    <?php
                        // Loop through the result set
                        while ($row = mysqli_fetch_assoc($sql2)) {
                          // Echo the option element
                          echo "<option value=\"". $row['ID_Produit'] . "#"  . $row['Libelle'] . "#" . $row['Nbre_produit_present'] . "#" . $row['PU'] . "\">" . $row['Libelle'] . "</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="sub footer">
                <div class="field">
                    <label for="Libelle">Libelle</label>
                    <input type="text" name = "Libelle" id = "libelle"readonly>
                </div>

                <div class="field">
                    <label for="QteStck">Qte en Stock</label>
                    <input type="number" name = "QteStck" id ="QteStck"readonly>
                </div>

                <div class="field">
                    <label for="PU">PU</label>
                    <input type="number" name = "PU" id ="PU"readonly>
                </div>

                <div class="field">
                    <label for="QteCmd">Qte Cmd</label>
                    <input type="number" name="QteCmd" id = "QteCmd" >
                </div>
                <input type="text" name = "id" hidden>
                <input type="button" class="Ok" value = "OK" onclick="addRow()">
            </div>
        </div> 
    </form>




    <!------------------------- End pad-vente------------------------------- -->
    
    <!-- ----------------------------panier-client-------------------------------------------- -->
    <input type="hidden" name="lines" id=lines>
    <form class="panier-client">
        <div class="panier-client-pad">
            <p>PANIER DU CLIENT</p>

            <div class="total">
                <p>TOTAL</p>
                <input type="number" value =0 class="result" name = "total" readonly>
            </div>
            
            <button class="enregistrer" type="submit" onclick="ErgClient()"> Enregistrer le panier</button>
            
        </div>
        
        <table id="table">
            <tbody>
                <tr>
                    <th><p>ID du produit</p></th>
                    <th><p>Libelle</p></th>
                    <th><p>PU</p></th>
                    <th><p>Quantite</p></th>
                </tr>

            </tbody>
        </table>
        
    </form>
    <!-- ----------------------------End panier-client-------------------------------------------- -->
</div>
<!-- End main -->
<script>
    function enregistrerPanier(){
        // Get all the table cells
        var cells = document.querySelectorAll("#myTable td");

        // Create an array to store the cell values
        var data = [];

        // Loop through the cells and push their values to the array
        cells.forEach(function(cell) {
        data.push(cell.innerHTML);
        });

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the type of request, the URL, and whether it is asynchronous
        xhr.open("POST", "insert.php", true);

        // Set the request header to indicate the data type
        xhr.setRequestHeader("Content-type", "application/json");

        // Define a function to handle the response
        xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // The request was successful, do something with the response
            console.log(xhr.responseText);
        }
        };

        // Send the request with the data as a JSON string
        xhr.send(JSON.stringify(data));

    }
</script>
</body>
</html>
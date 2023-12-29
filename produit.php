<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Liste produit.css">
    <title>page de liste de Produit</title>
    <script>
        function afficherFormulaire()
        {
            // Créer un nouvel élément div pour la section "Nouveau produit"
            var newProductSection = document.createElement("div");
            newProductSection.classList.add("nouveau-produit-section"); //ici il s'agit du style de la page
            newProductSection.innerHTML = `
                <form id="formulaire" class="form" action="ajout_produit.php" method="post">
                    <div class="contenu2">
                        <div class="entete1">
                            <h3>Nouveau produit</h3>
                        </div>
                        <div class="entete22">
                            <label for="productName">Nom du produit</label><br>
                            <input type="text" class="largeur" name="name" placeholder="ex: Chaussure" required><br>
                            <?php
                                require "connexion.php";
                                $ret = "SELECT * from Famille";
                                $rep = "SELECT * from ADMIN";
                                $a=mysqli_query($connection,$ret) or die (mysqli_error($connection));
                                $b=mysqli_query($connection,$rep) or die (mysqli_error($connection));
                            ?>
                            <label for="productFamily">Famille de produit</label><br>
                            <select id="productFamily" name="productFamily">
                            
                            <?php
                                while($ligne=mysqli_fetch_row($a))
                                {
                                    echo"<option id='$ligne[0]'  value='$ligne[1]'>$ligne[1]</option>";
                                }
                                echo"</select>";
                            ?>

                            <label for="productDescription">Description</label><br>
                            <input type="text" class="largeur" name="description" placeholder="ex: Description du produit" required><br>
                            <!-- Ajoutez d'autres options au besoin -->

                            </select>
                            <label for="productName">Quantite</label><br>
                            <input type="number" class="largeur" name="quantite" placeholder="ex: Numero " required><br>
                            
                            <label for="Administrateur">Admin</label><br>
                            <select id="admin" name="Admin">

                            <?php
                                while($ligne=mysqli_fetch_row($b))
                                {
                                    echo"<option id='$ligne[0]'  value='$ligne[1]'>$ligne[1]</option>";
                                }
                                echo"</select>";
                            ?>

                            <label for="productName">Prix Unitaire</label><br>
                            <input type="number" class="largeur" name="PU" placeholder="ex: Numero " required><br>
                            <!-- Ajoutez d'autres options au besoin -->
                            </select>
                            <label for="productImage">Lien de l'image du produit</label><br>
                            <input type="text" class="largeur" name="productImage" placeholder="ex: URL de l'image" required><br>
                            <input type="submit" value="OK" class="bouton" onclick=" CloseNewProduit() ">
                            <input type="button" value="Annuler" class="bouton" onclick=" CloseNewProduit() ">
                        </div>
                    </div>
                </form>
            `;
            // Ajouter la nouvelle section au corps principal
            document.body.appendChild(newProductSection);

            // Attendre un court instant pour déclencher l'animation
            setTimeout(function () {
                newProductSection.style.opacity = "1";
            }, 100);
        }
        function afficherFamille() {
            // Créer un nouvel élément div pour la section "Nouvelle famille"
            var newFamilleSection = document.createElement("div");
            newFamilleSection.classList.add("nouveau-famille-section"); // Vous pouvez styliser cette classe
            newFamilleSection.innerHTML = `
            <form id="formulaire" class="form" action="ajout_famille.php" method="post">
                <div class="contenu">
                    <div class="entete1">
                        <p>Nouvelle Famille</p>
                    </div>
                    <div class="entete2">
                        
                        <label for="nom_famille">Nom de la famille</label>
                        <input type="text" class="largeur" id="nom_famille" name="nom_famille" placeholder="Exo:Chaussures" required>
                        <input type="submit" value="OK" class="bouton" onclick="CloseNewFamille()">
                        <input type="button" value="Annuler" class="bouton" onclick="CloseNewFamille()">
                </div>
                </div>
                
            </form>
            `;

            // Ajouter la nouvelle section au corps principal
            document.body.appendChild(newFamilleSection);

            // Attendre un court instant pour déclencher l'animation
            setTimeout(function () {
                newFamilleSection.style.opacity = "1";
            }, 100);
        }
        function CloseNewProduit()
        {
            // Trouver la section "Nouveau produit"
            var newProductSection = document.querySelector(".nouveau-produit-section");
            if (newProductSection) {
                // Masquer la section en douceur
                newProductSection.style.opacity = "0";

                // Supprimer la section après l'animation de disparition
                setTimeout(function () {
                    document.body.removeChild(newProductSection);
                }, 100); // Le délai (100 ms) correspond à la durée de l'animation CSS
            }
        }
        function CloseNewFamille()
        {
            // Trouver la section "Nouvelle famille"
            var newFamilleSection = document.querySelector(".nouveau-famille-section");
            if (newFamilleSection) {
                // Masquer la section en douceur
                newFamilleSection.style.opacity = "0";

                // Supprimer la section après l'animation de disparition
                setTimeout(function () {
                    document.body.removeChild(newFamilleSection);
                }, 100); // Le délai (500 ms) correspond à la durée de l'animation CSS
            }
        }
        function supprimerProduit(ID_Produit)
        {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                // Utilisation d'AJAX pour envoyer une requête au serveur PHP
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "supprimerProduit.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Envoyer l'ID du produit au serveur
                xhr.send("idProduit=" + ID_Produit);

                // Gérer la réponse du serveur
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Rafraîchir la page après la suppression (ou effectuer d'autres actions nécessaires)
                        location.reload();
                    }
                };
            }
        }
    </script>
    <style>
        .largeur
        {
            background-color: #8d8585;
        }

        input::placeholder
        {
            color: #006c58;
            align-items: center;
            justify-content: center;
        }

        .bouton
        {
            background-color: var(--color-green);
            border: none;
        }

        select
        {
            width: 100%;
            border: none;
            background-color: #8d8585;
        }

        input
        {
            border: none;
        }

        .entete2
        {
            width: 100%;
            background-color: #fff;
        }
        .entete22
        {
            width: 100%;
            background-color: #fff;
            left:30%;
            justify-content:center;
            align-items:center;
    
        }

        .entete1
        {
            border-radius: var(--border-radius-card) var(--border-radius-card) 0 0;
            background-color: #006c58;
            align-items: center;
            justify-content: center;
            position: relative;
            top: 0;
            text-align: center;
            left: 0;
            width: 100%;
            color: var(--color-sage);
        }

        .form .bouton
        {
            margin-top: 5px;
        }

        .form .entete2
        {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form input,
        .form select
        {
            margin-bottom: 16px;
            height: 30px;
        }

        .form
        {
            flex-direction: column;
        }

        .form label
        {
            margin-bottom: 10px;
        }

        .contenu
        {
            top: 50%;
            left: 40%;
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: var(--border-radius-card) var(--border-radius-card) var(--border-radius-card) var(--border-radius-card);
        }
        .image
        {
            width:50%;
            height:50%;
        }
        .contenu2
        {
            left: 40%;
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: var(--border-radius-card) var(--border-radius-card) var(--border-radius-card) var(--border-radius-card);
        }
        /* Ajoutez ces styles CSS pour l'animation */
        .nouveau-produit-section
        {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.219);
            padding: 20%;
            z-index: 999;
            width: 100%;
            border-radius: 5px 5px 5px 5px;
        }

        .nouveau-famille-section
        {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.219);
            padding: 5%;
            z-index: 999;
            width: 100%;
            border-radius: 5px 5px 5px 5px;
        }
    </style>
</head>
<body>
    <!-- sideBar -->
    <div class="sideBar">
        <div class="loginPad">
            <p class="logo">OnlineShop</p>
            <div class="account">
                <i class="uis uis-user-md"></i>
                <p>Mon compte</p>
            </div>
        </div>
        <div class="menuPad">
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-chart-line"></i>
                    <div class="headlines">Tableau de bord</div>
                </div>
            </a>
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-file-info-alt"></i>
                    <div class="headlines">Rapport</div>
                </div>
            </a>
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-box"></i>
                    <div class="headlines"> Produit</div>
                </div>
            </a>
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-truck"></i>
                    <div class="headlines">Fournisseurs</div>
                </div>
            </a>
            <div class="drop-down">
                <a href="" class="links">
                    <div class="link-content">
                        <i class="uil uil-truck-loading"></i>
                        <div class="headlines">Bon de Commande</div>
                    </div>
                </a>
            </div>
            <a href="" class="links">
                <div class="link-content">
                    <i class="uil uil-user"></i>
                    <div class="headlines">Utilisateur</div>
                </div>
            </a>
        </div>
    </div>
    <!-- End sideBar -->
    <!-- main -->
    <div class="main">
        <div class="headpad">
            <h1>Produit</h1>
            <p>Consultez la liste des produits présents dans votre entrepôt et ajoutez-en si vous le souhaitez.</p>
        </div>
        <form action="" method="post">
            <main>
                <!-- Creation du menu pour le coté administrateur -->
                <div class="sous_section">
                    <h2>Liste des produits</h2><br>
                </div>
                <table class="sous_section4">
                <?php
                    // Connexion à la base de données
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "c_gestionStock";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Requête SQL pour récupérer les données de la table Produit
                    $sql = "SELECT * FROM Produit";
                    $result = $conn->query($sql);

                    // Vérifier s'il y a des résultats
                    if ($result->num_rows > 0)
                    {
                        echo "<table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nom du produit</th>
                                    <th>Famille</th>
                                    <th>Stock</th>
                                    <th>Description</th>
                                    <th>Créé par</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                            // Parcourir les résultats de la requête
                            while($row = $result->fetch_assoc())
                            {
                                echo "<tr>
                                    <td><img class='image' src='{$row['ImageURL']}' alt='{$row['Libelle']}'></td>
                                    <td>{$row['Libelle']}</td>
                                    <td>{$row['ID_Famille']}</td>
                                    <td>{$row['ID_Quantite']}</td>
                                    <td>{$row['descript']}</td>
                                    <td>{$row['ID_Admin']}</td>
                                    <td>
                                        <button class='sous_section2' onclick='afficherModification(\"{$row['ID_Produit']}\", \"{$row['Libelle']}\", \"{$row['ID_Famille']}\", \"{$row['ID_Quantite']}\", \"{$row['descript']}\", \"{$row['ID_Admin']}\",\"{$row['ImageURL']}\")' value='Editer'> Editer </button>
                                        <button class='sous_section2' onclick='supprimerProduit(\"{$row['ID_Produit']}\")'>Supprimer</button>
                                    </td>
                                </tr>";
                            }
                            echo "</tbody></table>";
                    } else
                    {
                        echo "Aucun résultat trouvé";
                    }
                    
                    // Fermer la connexion à la base de données
                    $conn->close();
                ?>
                <input type="button" class="sous_section2" onclick="afficherFormulaire()" value="Ajouter un produit"><br><br>
                <input type="button" class="sous_section2" onclick="afficherFamille()" value="Ajouter une famille de produit"><br><br>
            </main>
        </form>
    </div>
</body>

</html>
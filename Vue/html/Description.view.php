<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Description.css">
    <title>HopeField</title>
</head>
<body>

    <header id="topbar_container" class="sticky">
        
        <img id="first_img" src="../Vue/img/logo.png">

        <div id="topbar_container_nav_elements" class="sticky">
            <a href="accueil.ctrl.php">Accueil</a>
            <a href="encheres.ctrl.php">Nos enchères</a>
            <a href="vendre.ctrl.php"> Mettre en vente</a>
            <a href="A_propos.ctrl.php"> À propos de nous</a>
            <div id="topbar_container_compte" class="sticky">
                <a><img src="../Vue/img/user.png">
                    <div id="connexion">
                    <?php
                        //Remplace le bouton "connexion" par un bouton déconnexion si l'utilisateur est connecté
                        if(isset($_SESSION['login'])){
                            echo "<a href='deconnexion.ctrl.php'>Deconnexion</a>";
                        }
                        else {
                            echo "<a href='inscrire.ctrl.php'>Connexion</a>";
                        }
                        ?>
                        <a href=""> Mes ventes</a>
                        <a href="compte.ctrl.php"> Mon compte</a>

                    </div>
                </a>
            </div>
        </div>  
    </header>

    <main id="main_container">
        <article id="article_container" for= 'souhaitExpertise'>
            <?php
                if($souhaitExpertise == 1){
                    echo "<p>Article expertisé</p>";
                }
                else{
                    echo "<p>Article non expertisé</p>";
                }
            ?>
            <nav id="article">
                <div id="img_container">
                    <div class="img-wrapper">
                        <div class="control">
                            <button class="orbit-previous" onclick="changeImg()"><span class="show-for-sr">Image précédente</span>&#9664;&#xFE0E;</button>
                            <button class="orbit-next" onclick="changeImg()"><span class="show-for-sr">Image suivante</span>&#9654;&#xFE0E;</button>                      
                        </div>
                        <ul class="img-container" for="image">
                            <?php
                                for($i = 0; $i < count($image); $i++){
                                    ?>
                                    <li class="orbit-slide">
                                        <img class="orbit-image" src="../data/img/<?= $image[$i] ?>" alt="Space">
                                    </li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div id="enchere_description">
                    <div id="enchere_temps">
                        <p>Date de fin</p>
                        <p id="timer" for= 'dateFin'><?=$dateFin?></p>
                    </div>
                    <div id="enchere_prix">
                        <p>Prix actuel</p>
                        <p for= 'prixActuel'> <?=$prixActuel?>€</p>
                    </div>
                </div>
                <div id="article_description" for= 'titre' for='etat' for='description' for='hauteur' for='longueur' for='largeur'>
                    <p>Titre : <?=str_replace("_"," ",$titre)?></p>
                    <p>Etat : <?=$etat?></p>
                    <p>Description : <?=str_replace("_"," ",$description)?></p>
                    <div id="mesure_article">
                        <p>Hauteur : <?=$hauteur?> cm</p>
                        <p>Largeur : <?=$largeur?> cm</p>
                        <p>Longueur : <?=$longueur?> cm</p>
                    </div>
                </div>
                <form id="btn_container" action="encherissement.ctrl.php" method="post">
                    <input type="number" name="prix" placeholder="Prix" required>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="vendeur" value="<?=$vendeur?>">
                    <button id="btn_enchere" type="submit">Enchérir</button>
                </form>
            </nav>
        </article>
    </main>
    <footer id="footer_container">
        <div id="footer__container__left">
            <a href="cgu.ctrl.php" style="color: black"><h1>Conditions d'utilisation</h1></a>
        </div>
        <div id="footer__container__right">
            <h1>Comment nous contacter</h1>
        </div>
    </footer>

    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script>
    <script src = "../Vue/js/main.js"></script>

</body>
</html>
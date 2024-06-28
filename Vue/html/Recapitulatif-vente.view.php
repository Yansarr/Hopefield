<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Recapitulatif-vente.css">
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
        <div id="article_container">
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
                <span id="delimiter"></span>
                <div id="informations-article">
                    <section id="info-gauche">
                        <div id="info-gauche-nom">
                            <h2>Nom de l'article</h2>
                                - Nom de l'enchère : <?= str_replace("_"," ",$nom) ?> </label></input>
                        </div>
                        <div id="info-gauche-etat">
                            <h2>État de l'article : </h2>
                                - <?= $etat ?> </label></input>
                        </div>
                        <div id="info-gauche-details">
                            <h2>Détails de l'article</h2>
                            <ul id="mesure">
                                <li> Hauteur : <?= $hauteur ?> </input></li>
                                <li> Largeur : <?= $largeur ?></input></li>
                                <li> Longueur : <?= $longueur ?></input></li>
                            </ul>
                        </div>  
                    </section>
                    <section id="info-droite">
                        <h2>Description de l'article</h2>
                        <textarea name="description" id="description" cols="30" rows="10" readonly> <?= str_replace("_"," ",$description) ?></textarea>
                    </section>
                </div>
                <span id="delimiter"></span>
                <div id="information-annonces">
                    <div id="info-gauche">
                        <section id="info-gauche-prix">
                            <h2>Prix de départ</h2>
                            <label for="prix">  - Prix : <?=$prix?> €</label></input>
                        </section>
                        <section id="info-gauche-expertisation">
                            <h2>Demande d'expertisation : </h2>
                            <label for="expert">  - <?= $expertisation ?> </label></input>        
                        </section>
                    </div>
                    <div id="info-droite">
                        <section id="info-droite-durée">
                            <h2>Durée de l'enchere </h2>
                            <label for="duree">  - <?= $duree ?> jours </label></input>
                        </section>
                        <section id="info-droite-vente">
                            <h2>Article visible immediatement ? </h2>
                            <label for="vente">  - <?= $vente ?> </label></input>
                        </section>
                    </div> 
                </div>
            </nav>
            <div id="container-button">
                <button type=button id="Modifier" onclick="window.location.href='vendre.ctrl.php'">Modifier</button>
                <button type=button  id="Valider"  onclick="openForm()">Valider</button>
            </div>
            <div class="login-popup">
                <form method="post" action="miseEnEnchere.ctrl.php"  class="form-popup" id="popupForm">
                    <div class="form-container">
                        <h2>Etes vous sur de confirmer cette annonce ?</h2>
                        <input type="hidden" name="images" value=<?= serialize($image)?>>
                        <input type="hidden" name="nom" value=<?=$nom?>><label for="nom">
                        <input type="hidden" name="etat" value=<?=$etat?>><label for="intact">
                        <input type="hidden" name="hauteur" value=<?=$hauteur?>>
                        <input type="hidden" name="largeur" value=<?=$largeur?>>
                        <input type="hidden" name="longueur" value=<?=$longueur?>>
                        <input type="hidden" name="description" value=<?=$description?>>
                        <input type="hidden" name="prix" value=<?=$prix?>>
                        <input type="hidden" name="expertisation" value=<?=$expertisation?>>
                        <input type="hidden" name="duree" value=<?=$duree?>>
                        <input type="hidden" name="vente" value=<?=$vente?>>
                        <button type="submit" class="btn">Oui</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Non</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer id="footer_container">
        <div id="footer__container__left">
            <a href="cgu.ctrl.php" style="color: black"><h1>Conditions d'utilisation</h1></a>
        </div>
        <div id="footer__container__right">
            <h1>Comment nous contacter</h1>
        </div>
    </footer>

    <script src = "../Vue/js/main.js"></script>

</body>
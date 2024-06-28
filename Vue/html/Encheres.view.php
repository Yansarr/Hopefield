<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Enchere.css">
    <script src = "../Vue/js/test.js"></script>
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
                        <a href="inscrire.ctrl.php">Connexion</a>
                        <a href=""> Mes ventes</a>
                        <a href="compte.ctrl.php"> Mon compte</a>
                    </div>
                </a>
            </div>
        </div>  
    </header>

    <main id="main_part" >
        <form id="Categorie" action="encheres.ctrl.php" method="get">
            <button type="submit" value="<?=$pagePrec?>">Page précédente</button>
            <button type="submit" value="<?=$page?>"> <?= $page?></button>
            <button type="submit" value="<?=$pageSuiv?>"> Page suivante</button>
        </form>

        <div id="main_part_container">
            <div id="main_part__container" for="encheres">
                <?php 
                    foreach($encheres as $idEnchere){ 
                        $idEnchereArray = explode("-",$idEnchere);
                        $arrayInfoFossile = Fossile::recupInfoFossile($idEnchereArray[1]);
                        $arrayInfoEnchere = Enchere::recupInfoEnchere($idEnchere);
                        ?>
                        <article id ="enchere">
                            <img src="../../data/img/<?=$arrayInfoFossile['image']?>" alt="img">
                            <div id="enchere_carac">
                                <h1><?=str_replace("_"," ",$arrayInfoFossile['nom'])?></h1>
                                <div id="enchere_carac__container">
                                    <p>État : <?= $arrayInfoFossile['etat']?></p>
                                    <p>Fin de l'enchère : <?=$arrayInfoEnchere['datefin'] ?></p>
                                </div>  
                                <form action="description.ctrl.php" method="post">
                                    <input type="hidden" name="id" value="<?=$idEnchereArray[1]?>">
                                    <button type="submit" value = "<?=$idEnchereArray[1]?>">Voir plus</button>
                                </form>
                            </div>
                        </article>
                        <?php
                    }
                ?>
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
</body>
</html>
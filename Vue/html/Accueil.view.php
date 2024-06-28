<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" type="text/css" href="../Vue/style/Accueil.css">
    <link rel="stylesheet" type="text/css" href="../Vue/style/Botbar.css">
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


    <section id="landingpage_container">
        <article class="welcome_message_container">
            <h1>Bienvenue <br> sur  <span id="companyname_element">HopeField</span></h1>
            <h2>Site de vente aux enchères <br> orienté sur les fossiles </h2>
        </article>
        <div class="curveTop"></div>
    </section>


    <div class="login-popup hidden">
        <div class="form-popup" id="popupForm">
            <h1>CGU<h1>
            <p>Les cookies opérationnels utilisés par le CGU ne peuvent pas être désactivés dans la mesure où ils sont essentiels 
                afin de vous fournir nos services.</p>
                <a href="cgu.ctrl.php">En savoir plus</a>
            <div class="checkBox">
                <input type="checkbox" class="checkbox">
                <label for="checkbox">Je certifie avoir lu et accepté les Conditions Générales d'Utilisation et je consentie a partager mes données</label>
            </div>
            <div action="encherissement.ctrl.php" class="form-container accept">
                <button type="submit" class="btn"><a href="">Accepter et continuer</a></button>
            </div>
        </div>
    </div>

    <main id="main_container">
        <section id="idea">
            <div id="page">
            </div>
        </section>
        <section id="idea">
            <div id="page">
                <p> 
                Chers particuliers, ici vous avez la possiblité de vendre vos fossiles a l'aide d'un expert ou pas, visualiser les différents enchères en cours et pourquoi pas enchérir sur un fossile qui vous intéresse !  
                </p>
            </div>
            <div id="image">
                <img src="../Vue/img/Personas.png">
            </div>
        </section>
        <section id="idea">
            <div id="image">
                <img src="../Vue/img/tyrannosaurus-g210180977_1280-min.jpg">
            </div>
            <div id="page">
                <p> Notre site vous assure des fossiles 100% conformes aux lois et réglements des fossiles, pour etre encore plus sûr vous pouvez consulter nos experts.  </p>
            </div>
        </section>
    </main>

    <footer id="footer_container">
        <div id="footer__container__left">
            <a href="cgu.ctrl.php" style="color: black"><h1>Conditions d'utilisation</h1></a>
        </div>
        <div id="footer__container__right">
            <h1>Comment nous contacter</h1>
        </div>
    </footer>

    <script src = "../Vue/js/test.js"></script>
    <script src = "../Vue/js/pophup.js"></script>

</body>
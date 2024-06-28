<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Accueil.css">
    <link rel="stylesheet" href="../Vue/style/Botbar.css">
    <script src = "../Vue/js/test.js"></script>
    <title>HopeField</title>
</head>


<body>

    <header id="topbar_container" class="sticky">
        
        <img id="first_img" src="../Vue/img/logo.png">

        <div id="topbar_container_nav_elements" class="sticky">
            <a href="Accueil.ctrl.php">Accueil</a>
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
                        <a href="accueil.ctrl.php"> Mes ventes</a>
                        <a href="compte.ctrl.php"> Mon compte</a>
                    </div>
                </a>
            </div>
        </div>  
    </header>


    <section id="compte">
        <div id="compte_container">
            <div id="">
                <div id="compte_container_right_img">
                    <img src="../Vue/img/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.png">
                </div>
                <div id="compte_container_right_info">
                    <h1>Informations</h1>
                    <p>Prénom: </p>
                    <p>Nom: </p>
                    <p>Adresse: </p>
                    <p>Code postal: </p>
                    <p>Ville: </p>
                    <p>Numéro de téléphone: </p>
                    <p>Adresse mail: </p>
                </div>
            </div>
        </div>
    </section>

    
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Inscrire.css">
    <script src="../Vue/js/main.js"></script>
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

    <h3> <label for="erreur"> <?= $erreur ?> </label> </h3>

        <article id ="inscription">
            <div id="Barre">
                <label id="Barre_label"></label>
            </div>
            <section id ="connexion_container">
                <h1>Connexion</h1>
                <form id="container_connexion" action="connexion.ctrl.php" method="post">
                    <div id="connexion_label">
                        <label for="login">Nom d'utilisateur</label>
                        <input type="login" name="login" id="login" placeholder="Nom d'utilisateur">
                    </div>
                    <div id="connexion_label">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div id="button_container">
                        <article id="bouton-container-haut">
                            <button type="submit" name="button" value="connecter">Se connecter</button>
                            <button type="button" id="ConnexionToInscrire" class="on-off" onclick="deplacerGauche()">S'inscrire</button>
                        </article>
                        <article id="bouton-container-bas">
                            <a href="deconnexion.ctrl.php">Mot de passe oublié ?</a>
                        </article>
                    </div>
                </form>
            </section>
            <section id="container__menu">
                <h1>S'inscrire</h1>
                <form id="container_inscription" action="inscription.ctrl.php" method="post">
                    <div id="label_nom">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Ex: Moalapince">
                    </div>
                    <div id="label_prenom">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Ex: Serge">
                    </div>
                    <div id="login">
                        <label for="Login">Nom d'utilisateur</label>
                        <input type="text" name="login" id="login" placeholder="Ex: Sergem">
                    </div>
                    <div id="label_email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Ex: serge.moalapince@gmail.com">
                    </div>
                    <div id="label_password">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe 8 caractères minimum ">
                    </div>
                    <div id="label_password2">
                        <label for="password2">Confirmer le mot de passe</label>
                        <input type="password" name="password2" id="password2" placeholder="Confirmer le mot de passe">
                    </div>
                    <div id="button_container">
                        <article id="bouton-container-haut">
                            <button type="submit" name="button" value="inscription">S'inscrire</button>
                            <button type="button" id="InscrireToConnexion" class="on-off" onclick="deplacerDroite()">J'ai déjà un compte</button>
                        </article>
                        <article id="bouton-container-bas">
                            <a href="inscrire-expert.ctrl.php">Je suis un expert ?</a>
                        </article>
                    </div>
                </form>
            </section>
        </article>
    </main>

</body>
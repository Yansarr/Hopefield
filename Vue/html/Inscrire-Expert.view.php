<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" href="../Vue/style/Inscrire-Expert.css">
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
        <article id ="inscription">
            <section id="container__menu">
                <h1>S'inscrire</h1>
                <section id="container_inscription">
                    <div id="label_nom">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Nom">
                    </div>
                    <div id="label_prenom">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="prenom">
                    </div>
                    <div id="login">
                        <label for="Login">Nom d'utilisateur</label>
                        <input type="text" name="login" id="login" placeholder="Nom d'utilisateur">
                    </div>
                    <div id="label_email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="email">
                    </div>
                    <div id="label_password">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div id="label_password2">
                        <label for="password2">Confirmer le mot de passe</label>
                        <input type="password" name="password2" id="password2" placeholder="Confirmer le mot de passe">
                    </div>
                    <div id="button_container">
                        <button type="button" name="button" onclick="window.location.href='accueil.ctrl.php'">S'inscrire</button>
                        <button type="button" name="button" onclick="window.location.href='inscrire.ctrl.php'">J'ai deja un compte</button>
                    </div>
                </section>
            </section>
            <section id="upload">
                <div id="upload_container_upload">
                    <h2>Dépot d'image</h2>
                    <p>Deposer ici votre diplôme</p>
                    <button>+</button>
                </div>
                <div id="upload_container_img">                                    
                    <img src="../Vue/img/diplome.jpg">
                </div>
            </section>
        </article>
    </main>

</body>
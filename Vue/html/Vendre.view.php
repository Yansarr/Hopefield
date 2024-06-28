<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Vendre</title>
        <link rel="stylesheet" href="../Vue/style/Topbar.css">
        <link rel="stylesheet" href="../Vue/style/Vendre.css">
    </head>

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

    <main>
        <h3> <label for="erreur"> <?= $erreur ?></label> </h3>
        <form action="recapitulatif-vente.ctrl.php" method="post" class="info-box" id="form-id" enctype="multipart/form-data">
            <ul>
                <li><a href="#" class="active tab">Dépôt d'image</a></li>
                <li><a href="#" class="tab">Information article</a></li>
                <li><a href="#" class="tab">Mise en annonce</a></li>
            </ul>
            <section class="panels">
                <article class="active-panel">
                    <section id="upload">
                        <div id="upload_container">
                            <div id="upload_container_upload">
                                <h2>Dépôt d'image</h2>
                                <p>Vous pouvez déposer jusqu'à 5 images de votre article</p>
                                <input type="file" multiple name="file[]" id="1" onchange="handleFiles(files)" accept=".jpg, .jpeg, .png">
                            </div>
                            <div id="upload_container_img">
                            </div>
                        </div>
                    </section>
                </article>
                <article >
                    <div id="informations-article">
                        <section id="info-gauche">
                            <div id="info-gauche-nom">
                                <h2>Nom de l'article : *</h2>
                                <input type="text" name="Nom" placeholder="Nom de l'article">
                            </div>
                            <div id="info-gauche-etat">
                                <h2>État de l'article : *</h2>
                                <div id="info-gauche-etat-input">
                                    <input type="radio" id="intact" name="etat" value="intact">
                                        <label for="intact">Intact</label>
                                    </input>
                                    <input type="radio" id="bon" name="etat" value="bon">
                                        <label for="bon">Bon</label>
                                    </input>
                                    <input type="radio" id="delabre" name="etat" value="delabre">
                                        <label for="delabre">Délabré</label>
                                    </input>
                                </div>
                            </div>
                            <div id="info-gauche-details">
                                <h2>Détails de l'article : </h2>
                                <section id="informations">
                                    <div id="hauteur">
                                        <label for="hauteur">Hauteur : *</label>
                                        <input name="Hauteur" type="text" placeholder="Hauteur (en cm)">
                                    </div>
                                    <div id="largeur">
                                        <label for="largeur">Largeur : *</label>
                                        <input name="Largeur" type="text" placeholder="Largeur (en cm)">
                                    </div>
                                    <div id="longueur">
                                        <label for="longueur">Longueur : *</label>
                                        <input name="Longueur" type="text" placeholder="Longueur (en cm)">
                                    </div>
                                </section>
                            </div>  
                        </section>
                        <section id="info-droite">
                            <h2>Description de l'article : </h2>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </section>
                    </div>
                </article>
                <article >
                    <div id="information-annonces">
                        <div id="info-gauche">
                            <section id="info-gauche-prix">
                                <h2>Prix de départ : *</h2>
                                <input for="prix" name="prix" type="text" placeholder="Prix de départ (en euros)">
                            </section>
                            <section id="info-gauche-expertisation">
                                <h2>Demande d'expertisation : </h2>
                                <div id="button-expert">
                                    <input type="radio" id="oui-expert" name="expertisation" value="oui">
                                        <label for = "oui-expert">Oui</label>
                                    </input>
                                    <input type="radio" id="non-expert" name="expertisation" value="non">
                                        <label for = "non-expert">non</label>
                                    </input>
                                </div>
                                
                            </section>
                        </div>
                        <div id="info-droite">
                            <section id="info-droite-durée">
                                <h2>Durée de l'enchère : *</h2>
                                <select name="durée" form="form-id">
=======
                                <h2>Durée de l'enchère : *</h2>
                                <select name="duree" form="form-id">
                                    <option value="2">2 jours</option>
                                    <option value="3">3 jours</option>
                                    <option value="5">5 jours</option>
                                    <option value="7">7 jours</option>
                                </select>
                            </section>
                            <section id="info-droite-vente">
                                <h2>Vente directe :</h2>
                                <div id="button-vente">
                                    <input type="radio" id="oui-vente" name="vente" value="oui">
                                        <label for = "oui-vente">Oui</label>
                                    </input>
                                    <input type="radio" id="non-vente" name="vente" value="non">
                                        <label for = "non-vente">non</label>
                                    </input>
                                </div>
                            </div>
                        </div> 
                    </div>
                </article>
            </section>
            <div id="button-page-info">
                <button class="prev-tab" type="reset" onclick="window.location.href='accueil.ctrl.php'"><a id="page-prec" href="accueil.ctrl.php">Revenir à l'accueil</a></button>
                <button class="next-tab" type="submit">Vérifier votre enchère</button>
            </div>
        </form>
    </main>
    <script src = "../Vue/js/main.js"></script>
</html>
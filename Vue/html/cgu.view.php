<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="../Vue/style/Topbar.css">
    <link rel="stylesheet" type="text/css" href="../Vue/style/cgu.css">
    <link rel="stylesheet" type="text/css" href="../Vue/style/Botbar.css">
    <title>HopeField</title>
</head>
<body>
    <header id="topbar_container" class="sticky">
        
        <img id="first_img" src="../Vue/img/logo.jpg">

        <div id="topbar_container_nav_elements" class="sticky">
            <a href="accueil.ctrl.php">Accueil</a>
            <a href="encheres.ctrl.php">Nos enchères</a>
            <a href="vendre.ctrl.php"> Mettre en vente</a>
            <a href="A_propos.ctrl.php"> A propos de nous</a>
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
        <h1>Conditions Générales d'Utilisation</h1>
        <div>
            <section>
            <p>Les présentes conditions générales d'utilisation (dites « CGU ») ont pour objet l'encadrement juridique des modalités de mise à disposition du site et des services par Unicom et de définir les conditions d’accès et d’utilisation des services par « l'Utilisateur ».
            Les présentes CGU sont accessibles sur le site à la rubrique «Conditions d'Utilisation».</p>
            <p>Toute inscription ou utilisation du site implique l'acceptation sans aucune réserve ni restriction des présentes CGU par l’utilisateur. Lors de l'inscription sur le site via le formulaire d’inscription, chaque utilisateur accepte expressément les présentes CGU en cochant la case précédant le texte suivant : « Je reconnais avoir lu et compris les CGU et je les accepte ».
            En cas de non-acceptation des CGU stipulées dans le présent contrat, l'Utilisateur se doit de renoncer à l'accès des services proposés par le site.
            Hopefield se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes CGU.
            </p>
            </section>

            <section>
                <h2>Les mentions légales</h2>
                <p>L'édition du site Hopefield est assurée par la société Unicom, dont le siège social est situé à l'IUT2 de Grenoble.<br>
                Numéro de téléphone :  07.51.64.53.82<br>
                Adresse e-mail : hopefield@gmail.com<br>
                Le Directeur de la publication est : Yanis Girardin
                </p>
            </section>

            <section>
                <h2>Accès au site</h2>
                <p>Le site Hopefield permet à l'Utilisateur un accès gratuit aux services suivants :</p>
                    <ul>
                        <li>Mise en enchère de fossile</li>
                        <li>Enchérissement d'enchères de fossile</li>
                        <li>Naviguer dans la liste des enchères disponibles</li>
                    </ul>
                <p>Le site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.</p>
                <p>L’Utilisateur non membre a accès aux services proposés à l'exception de la mise en enchère et l'enchérissement d'une enchère. Pour y remédier, il doit s’inscrire en remplissant le formulaire d'inscription. En acceptant de s’inscrire aux services réservés, l’Utilisateur membre s’engage à fournir des informations sincères et exactes concernant son état civil et ses coordonnées, notamment son adresse email.
                Pour accéder aux services, l’Utilisateur doit ensuite s'identifier à l'aide de son nom d'utilisateur et de son mot de passe qu'il aura choisie lors de son inscription.
                Tout Utilisateur membre régulièrement inscrit pourra également solliciter sa désinscription en envoyant un mail à hopefield@gmail.com.
                Tout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du site ou serveur et sous réserve de toute interruption ou modification en cas de maintenance, n'engage pas la responsabilité de Hopefield. Dans ces cas, l’Utilisateur accepte ainsi ne pas tenir rigueur à l’éditeur de toute interruption ou suspension de service, même sans préavis.
                L'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse email de l’éditeur communiqué dans les mentions légales.
                </p>
            </section>

            <section>
                <h2>Collecte des données</h2>
                <p>Le site assure à l'Utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément au Réglement Général sur la Protection des Données (RGPD), aux fichiers et aux libertés.
                En vertu du RGPD, l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et d'opposition de ses données personnelles. L'Utilisateur exerce ce droit : par mail à l'adresse email : hopefield@gmail.com.</p>
            </section>

            <section>
                <h2>Traitements des données.</h2>
                <p>Nous collectons des données personnelles de l'Utilisateur via le formulaire d'inscription. Les données sont les suivantes :</p>
                <ul>
                    <li>Nom de l'Utilisateur</li>
                    <li>Prénom de l'Utilisateur</li>
                    <li>Adresse mél de l'Utilisateur</li>
                    <li>Le mot de passe de l'Utilisateur</li>
                </ul>
                <p>Le nom et le prénom servira à identifier le vendeur d'une enchère par son état civil. Son adresse mél permettra à Unicom de contacter l'Utilisateur dans le cadre de l'application. Son mot de passe sera indispensable pour pouvoir se connecter à l'application. Il sera crypté dans la base de données de Hopefield.</p>
            </section>

            <section>
                <h2>Propriété intellectuelle</h2>
                <p>Les marques, logos, signes ainsi que tous les contenus du site (textes, images, son…) font l'objet d'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d'auteur. La marque Hopefield est une marque déposée par Unicom. Toute représentation et/ou reproduction et/ou exploitation partielle ou totale de cette marque, de quelque nature que ce soit, est totalement prohibée. 
                    L'Utilisateur doit solliciter l'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus. Toute représentation totale ou partielle de ce site par quelque procédé que ce soit, sans l’autorisation expresse de l’exploitant du site Internet constituerait une contrefaçon sanctionnée par l’article L 335-2 et suivants du Code de la propriété intellectuelle. 
                    Il est rappelé conformément à l’article L122-5 du Code de propriété intellectuelle que l’Utilisateur qui reproduit, copie ou publie le contenu protégé doit citer l’auteur et sa source.
                </p>
            </section>

            <section>
                <h2>Responsabilité</h2>
                <p>Les sources des informations diffusées sur le site Hopefield sont réputées fiables mais le site ne garantit pas qu’il soit exempt de défauts, d’erreurs ou d’omissions.
                    Les informations communiquées sont présentées à titre indicatif et général sans valeur contractuelle. Malgré des mises à jour régulières, le site Hopefield ne peut être tenu responsable de la modification des dispositions administratives et juridiques survenant après la publication. De même, le site ne peut être tenue responsable de l’utilisation et de l’interprétation de l’information contenue dans ce site.
                    L'Utilisateur s'assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite. Il assume les risques liés à l'utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.
                    Le site Hopefield ne peut être tenu pour responsable d’éventuels virus qui pourraient infecter l’ordinateur ou tout matériel informatique de l’Internaute, suite à une utilisation, à l’accès, ou au téléchargement provenant de ce site.
                    La responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d'un tiers.
                    </p>
            </section>

            <section>
                <h2>Liens hypertextes</h2>
                <p>Des liens hypertextes peuvent être présents sur le site. L’Utilisateur est informé qu’en cliquant sur ces liens, il sortira probablement du site Hopefield. Ce dernier n’a pas de contrôle sur les pages web sur lesquelles aboutissent ces liens et ne saurait, en aucun cas, être responsable de leur contenu.</p>
            </section>

            <section>
                <h2>Publication par l’Utilisateur</h2>
                <p>Le site permet aux membres de publier des enchères de fossiles. Dans ses publications, le membre s’engage à respecter les règles de la Netiquette (règles de bonne conduite de l’internet) et les règles de droit en vigueur.
                Le site peut exercer une modération sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.
                Le membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle.</p>
                <p>Le Membre cède notamment le droit d'utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.
                La société éditrice s'engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.
                Tout contenu mis en ligne par l'Utilisateur est de sa seule responsabilité. L'Utilisateur s'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l'Utilisateur.
                Le contenu de l'Utilisateur peut être à tout moment et pour n'importe quelle raison supprimé ou modifié par le site, sans préavis.
                </p>
            </section>

            <section>
                <h2>Droit applicable et juridiction compétente</h2>
                <p>La législation française s'applique au présent contrat. En cas d'absence de résolution amiable d'un litige né entre les parties, les tribunaux français seront seuls compétents pour en connaître.
                        Pour toute question relative à l’application des présentes CGU, vous pouvez joindre l’éditeur aux coordonnées inscrites aux mentions légales.
                </p>
            </section>

            <section>
                <h2>Réglementation de vente de fossile</h2>
                <p>Pour pouvoir vendre un fossile, l'utilisateur doit être certain que ce fossile ne soit pas scientifiquement significatif. De plus, il doit être en mesure de présenter une facture commerciale qui justifie la possession de ce fossile.</p>
            </section>
        </div>
    </main>
    
</body>
</html>
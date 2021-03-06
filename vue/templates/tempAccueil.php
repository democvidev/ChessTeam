<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><?= $title; ?></title>
    <meta name="description" content="<?= $description; ?>"/>
    <!-- ===css perso== -->
    <link rel="icon" type="image/png" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/caroussel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/burger.css" type="text/css">
    <link rel="stylesheet" href="assets/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/icomoon.css" type="text/css">
    <link rel="stylesheet" href="assets/sass/styles.css" type="text/css">


</head>
<body>
<div id="main_wrapper">
    <header>
        <div class="en-tete">

            <div class="logo">
                <a href="?action=home"><img src="assets/img/logo/logo.png" alt="Le logo du Chess Team Nogent sur Marne"
                                            title="Logo"/></a>
            </div>
            <div class="objet">
                <nav class="navigation">
                    <div id="menu-bar">
                        <div id="menu" onclick="onClickMenu()">
                            <div id="bar1" class="bar"></div>
                            <div id="bar2" class="bar"></div>
                            <div id="bar3" class="bar"></div>
                        </div>
                        <ul class="navigate" id="navigate">
                            <li>
                                <div class="list_style"><a href="?action=home">Accueil</a></div>
                            </li>
                            <li class="has-children">
                                <div class="list_style"><a
                                        href="?action=allCategory">Catégories</a>
                                </div>

                                <ul class="sous-menu">
                                    <?php foreach ($allCategory as $cat => $values) : ?>
                                        <li>
                                            <div class="list_style">
                                                <a href="?action=categoryId&amp;id=<?= $values->getId() ?>"><?=$values->getTitle(); ?></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li>
                                <div class="list_style"><a href="?action=allArticles">Articles</a></div>
                            </li>


                            <?php if (\Democvidev\App\ControllerStatut::isConnected()) : ?>
                                <li>
                                    <div class="list_style"><a
                                            href="?action=myAccount&amp;id=<?= $_SESSION['id_user'] ?>">Mon Compte</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="list_style"><a
                                            href="?action=myArticlesId&amp;id=<?= $_SESSION['id_user'] ?>">Mes
                                            articles</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="list_style"><a href="?action=createArticleId">Créer article</a></div>
                                </li>


                                <?php if (\Democvidev\App\ControllerStatut::isAdmin()) : ?>

                                    <li>
                                        <div class="list_style"><a href="?action=allMembers">Membres</a></div>
                                    </li>
                                    <li>
                                        <div class="list_style"><a href="?action=allComments">Commentaires</a></div>
                                    </li>
                                    <li>
                                        <div class="list_style"><a href="?action=allVs">VS</a></div>
                                    </li>


                                <?php endif; ?>
                                <li>
                                    <div class="list_style"><a href="?action=deconnect">Déconnexion</a></div>
                                </li>

                            <?php else : ?>
                                <li>
                                    <div class="list_style"><a href="?action=connexion">Connection</a></div>
                                </li>
                                <li>
                                    <div class="list_style"><a href="?action=inscription">Inscription</a></div>
                                </li>
                            <?php endif; ?>


                        </ul>
                    </div>
                </nav>
                <div class="memberInfo"><span><?= \Democvidev\App\ControllerStatut::helloUser(); ?></span></div>

            </div>
            <div class="menu-bg" id="menu-bg"></div>
            <div class="photo">
                <?php if (empty($_SESSION['user_image'])) : ?>
                    <a href="assets/img/logo/pawn_logo.jpg"><img src="assets/img/logo/pawn_logo.jpg"
                                                                 alt="Photo de profil"
                                                                 title="Cliquez pour agrandir"/></a>
                <?php else : ?>
                    <a href="assets/img/uploads/<?= $_SESSION['user_image'] ?>"><img
                            src="assets/img/uploads/<?= $_SESSION['user_image'] ?>" alt="Photo de profil"
                            title="Cliquez pour agrandir" height="100em"/></a>
                <?php endif; ?>
            </div>

        </div>
    </header>
    <?php if (isset($_GET['alert']) and ($_GET['alert'] == 'contact')) {
    echo '<h4>Votre message vient d\'être ajouté !</h4>';
}
    ?>

    <div class="timer-body">
        <h3 class="timer-body__title">Le nouvel An arrive dans</h3>
        <div class="timer-container">
            <div class="timer-element">
                <p class="timer-element__text" id="days"></p>
                <span class="whitesmoke">jours</span>
            </div>
            <div class="timer-element">
                <p class="timer-element__text" id="hours"></p>
                <span class="whitesmoke">heures</span>
            </div>
            <div class="timer-element">
                <p class="timer-element__text" id="minutes"></p>
                <span class="whitesmoke">minutes</span>
            </div>
            <div class="timer-element">
                <p class="timer-element__text" id="seconds"></p>
                <span class="whitesmoke">secondes</span>
            </div>
        </div>
    </div>
    <main class="container">

        <?= $template; ?>

    </main>
    <footer>
        <div class="pied-page">
            <div class="middle">
                <ul class="menu">
                    <li class="item" id="profile">
                        <a href="#profile" class="btn">Notre adresse</a>

                        <div class="smenu">
                            <h5>15 rue Général Faidherbe</h5>
                            <h5>94130 Nogent sur Marne</h5>
                            <h5>0783554818</h5>
                            <h5>cnvvc_vlad@yahoo.fr</h5>
                        </div>
                    </li>

                    <li class="item" id="message">
                        <a href="#message" class="btn">Réseaux Sociaux</a>

                        <div class="smenu">
                            <a href="https://www.facebook.com/">Facebook<span class="icon-facebook"></span></a>
                            <a href="https://www.twitter.com/">Twitter<span class="icon-twitter"></span></a>
                            <a href="https://www.whatsapp.com/">Whatsapp<span class="icon-whatsapp"></span></a>
                        </div>
                    </li>

                    <li class="item" id="settings">
                        <a href="#settings" class="btn">FAQ / CGU / CONTACT</a>

                        <div class="smenu">
                            <a href="vue/questions.php">Questions fréquentes</a>
                            <a href="vue/conditions.php">Condition d'utilisation</a>
                            <a href="vue/mentions.php">Mentions légales</a>
                            <a href="vue/contact.php">Contactez-nous</a>

                        </div>
                    </li>
                    <?php if (\Democvidev\App\ControllerStatut::isConnected()) : ?>
                        <li class="item"><a href="?action=deconnect" class="btn">Déconnexion</a><div class="separate"></div><a
                                class="btn" href="">#top</a></li>
                    <?php else : ?>
                        <li class="item"><a href="https://www.chess.com/" target="_blank" class="btn">Chess.com</a><div class="separate"></div><a
                                class="btn" href=""><i class="fas fa-arrow-up"></i>#top</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; Copyright 2019 </p>
        </div>

    </footer>


</div>


<!-- ==javaScript perso== -->
<script defer src="assets/js/caroussel.js" type="text/javascript"></script>
<script defer src="assets/js/burger.js" type="text/javascript"></script>
<script defer src="assets/js/script.js" type="text/javascript"></script>


</body>


</html>
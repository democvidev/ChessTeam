<?php ob_start(); ?>

<?php $title = 'Article du blog'; ?>
<?php $description = 'Cette page affiche tous les articles du site web'; ?>


<?php if (!empty($allArticles)): ?>


    <div class="bienvenue">
        <div class="search_bouton">
            <label for="article-search">Recherchez un article :</label>
            <input type="search" id="article-search"
                   aria-label="Recherchez un article">
            <button>Search</button>
        </div>
        <div class="bouton_commande">
            <a href="" class="bouton_rouge">Voir l'article <img src="assets/img/by_default/flecheblanchedroite.png"
                                                                alt="le bouton rouge"/></a>
        </div>
    </div>
    <?php foreach ($allArticles as $key => $values): ?>

        <div class="top_article">

            <h1><img src="assets/img/by_default/ico_epingle.png" alt="Catégorie"
                     class="ico_categorie"/><?= $values->getArt_title() ?></h1>

            <div class="banniere_bouton">
                <?php if (isAdmin()) : ?>
                    <div class="bouton_commande"><a href="?action=allArticles&amp;updateA=<?= $values->getId() ?>">Modifier</a>
                    </div>
                <?php endif; ?>
                <div class="bouton_commande">
                    <a href="?action=allArticles&amp;id=<?= $values->getId() ?>" class="bouton_rouge">Voir l'article
                        <img src="assets/img/by_default/flecheblanchedroite.png" alt="le bouton rouge"/></a>
                </div>
            </div>
            <p>Ecrit par
                <mark><?= showNameAuthor($values->getArt_author()) ?></mark>
                le <em><?= $values->getArt_date_creation() ?></em> dans la catégorie
                <strong><?= showNameCategory($values->getCategory_id()) ?></strong></p>

            <div id="detail_art" class="justify_article">

                <img src="assets/img/uploads/<?= $values->getArt_image() ?>" alt="Image de l'article">

                <span><?= $values->getArt_description() ?><a href="#cache"> [Lire la suite...] </a></span>

                <div id="cache"><span><?= $values->getArt_content() ?></span><a href="#detail_art"> [Voir moins]</a>
                </div>

            </div>
            <p>
                <a href="?action=allArticles&amp;id=<?= $values->getId() ?>">(<?= count(getAllCommentsOfArticle($values->getId())); ?>
                    ) Commentaires </a></p>
        </div>

    <?php endforeach; ?>
<?php endif; ?>
    <div class="back-page">
        <?php if (backPageId()) : ?>
            <div class="back-page"><a href="?action=home">Retour</a></div>
        <?php else : ?>
            <div class="back-page"><a href="?action=home">Retour</a></div>
        <?php endif; ?>
        <?php if (isAdmin()) : ?>
            <div class="back-page"><a href="?action=allCategory">Consulter autres catégories</a></div>
        <?php endif; ?>

    </div>


<?php $template = ob_get_clean(); ?>

<?php
require 'templates/tempAccueil.php';
?>
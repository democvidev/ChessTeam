<?php ob_start(); ?>

<?php $title = 'Liste des commentaires'; ?>
<?php $description = 'Voir les commentaires des internautes sur différents sujets des échecs'; ?>

<?php if (isset($allComments)) : ?>
    <h3>Tous les commentaires</h3>

    <?php foreach ($allComments as $key => $value) : ?>

        <div class="comment-added">

            <div class="comment-author">
                <p>
                    <mark><?= showNameAuthor($value->getCom_author()) ?></mark>
                    le ( <?= $value->getCom_date_creation() ?> )
                </p>
            </div>
            <div class="comment-description"><p><?= $value->getCom_content() ?></p></div>

            <div class="comment-modify">
                <a href="?action=allComments&amp;modifyC=<?= $value->getId() ?>" class="comment-modify">Modifier</a>
            </div>

        </div>
        <?php endforeach; ?>

<?php endif ?>
<?php $template = ob_get_clean(); ?>

<?php require 'templates/tempAccueil.php'; ?>

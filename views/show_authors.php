<!--/**
 * show_authors.php
 * Créé par : Jimmy Letecheur
 * Date : 8/03/16
 -->

<h1>
    Vous êtes sur la page de l'auteur : <?php echo $data['author']->name; ?> <!-- Le nom de l'auteur -->
</h1>

<?php if ($data['author']->photo): ?> <!-- L'image -->
    <div class="photo">
        <img src="<?php echo $data['author']->photo; ?>"
             alt=""> <!-- cover est un nom de colonne dans la database -->
    </div>
<?php endif; ?>

<?php if ($data['author']->bio): ?> <!-- Le résumé du livre --> <!-- summary est un nom de colonne dans la database -->
    <div class="bio">
        <?php echo $data['author']->bio; ?>
    </div>
<?php endif; ?>


<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Allez vers Tous les livres</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>
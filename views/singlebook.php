<?php
/**
 * singlebook.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */
?>



<h1>
    <?php echo $data['book']->title; ?> <!-- Le titre du livre -->
</h1>

<?php if ($data['book']->cover): ?> <!-- L'image -->
<div class="cover">
    <img src="<?php echo $data['book']->cover; ?>"
         alt=""> <!-- cover est un nom de colonne dans la database -->
</div>
<?php endif; ?>

<?php if ($data['book']->summary): ?> <!-- Le résumé du livre --> <!-- summary est un nom de colonne dans la database -->
    <div class="summary">
        <?php echo $data['book']->summary; ?>
    </div>
<?php endif; ?>


<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Allez vers Tous les livres</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>

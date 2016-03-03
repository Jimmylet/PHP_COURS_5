<?php
/**
 * singlebook.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */
?>



<h1>
    <?php echo $book->title; ?> <!-- Le titre du livre -->
</h1>

<?php if ($book->cover): ?> <!-- L'image -->
<div class="cover">
    <img src="<?php echo $book->cover; ?>"
         alt=""> <!-- cover est un nom de colonne dans la database -->
</div>
<?php endif; ?>

<?php if ($book->summary): ?> <!-- Le résumé du livre --> <!-- summary est un nom de colonne dans la database -->
    <div class="summary">
        <?php echo $book->summary; ?>
    </div>
<?php endif; ?>


<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Allez vers Tous les livres</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>

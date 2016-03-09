

<ul>
        <?php foreach ($data['books'] as $book) : ?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?a=show&e=books&id=<?php echo $book->id; ?>"><?php echo $book->title; ?></li>
<?php endforeach; ?>
</ul>

<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Allez vers Tous les auteurs</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>
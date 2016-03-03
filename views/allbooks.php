

<ul>
        <?php foreach ($data['books'] as $book) : ?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $book->id; ?>"><?php echo $book->title; ?></li>
<?php endforeach; ?>
</ul>



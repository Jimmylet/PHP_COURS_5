<!--
/**
 * File: show_editors.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:20
 */
 -->
<h1> <?php echo $data['editor'] -> name; ?></h1>
<?php if($data['editor'] ->logo): ?>
    <div class="logo">
        <img src="<?php echo $data['editor']->logo; ?>" alt="">
    </div>
<?php endif; ?>
<?php if($data['editor']->url): ?>
    <div class="url">
        <?php echo 'Son site web: '.$data['editor']->url;?>
    </div>
<?php endif; ?>
<?php if($data['editor']->summary): ?>
    <div class="summary">
        <?php echo 'Son résumé: '.$data['editor']->summary;?>
    </div>
<?php endif; ?>
<div class="alleditors">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>">Retour vers la page des Editeurs </a>
</div>
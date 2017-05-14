<?php $view->extend('PsiAppBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_content') ?>
-- View --
    
    <?php /* insert runes.html.php example */ ?>
    <?php echo $view->render('PsiAppBundle:Summoner:runes.html.php', []) ?>
   
    <?php /* insert masteries.html.php example */ ?>
    <?php echo $view->render('PsiAppBundle:Summoner:masteries.html.php', []) ?>

<?php $view['UI']->stop() ?>
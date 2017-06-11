<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>

<h2>Welcome <?php echo $user->getEmail(); ?></h2>

<?php $view['UI']->stop(); ?>
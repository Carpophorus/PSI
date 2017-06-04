<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'Login') ?>

<?php $view['UI']->start('_content') ?>
<?php echo $view['form']->form($form) ?>
<?php $view['UI']->stop(); ?>
<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'New User') ?>

<?php $view['UI']->start('_content') ?>
<div class="anu-container">
<?php echo $view['form']->form($form) ?>
<?php $view['UI']->stop(); ?>
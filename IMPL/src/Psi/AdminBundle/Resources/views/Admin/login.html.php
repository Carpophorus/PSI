<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'Login') ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.12.1.min.js"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_content') ?>
<?php echo $view['form']->form($form) ?>
<?php $view['UI']->stop(); ?>
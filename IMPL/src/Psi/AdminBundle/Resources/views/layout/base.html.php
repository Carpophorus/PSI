<?php $view->extend('PsiAdminBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_styles'); ?>
<link href="<?php echo $view['assets']->getUrl('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/bootstrap-theme.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/app.css') ?>" rel="stylesheet" type="text/css" />
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/app.js') ?>"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_header') ?>
<div class="header">
    <nav class="">
        <?php $view['UI']->output('_menu'); ?>
    </nav>
</div>
<?php $view['UI']->stop(); ?>
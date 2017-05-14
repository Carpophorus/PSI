<?php $view->extend('PsiUserBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_styles'); ?>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_header') ?>
<div class="header">
    <nav class="">
        <?php $view['UI']->output('_menu'); ?>
    </nav>
</div>
<?php $view['UI']->stop(); ?>
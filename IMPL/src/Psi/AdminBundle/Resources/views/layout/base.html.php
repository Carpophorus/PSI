<?php $view->extend('PsiAdminBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_styles'); ?>
<link href="<?php echo $view['assets']->getUrl('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/bootstrap-theme.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/pace.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/app.css') ?>" rel="stylesheet" type="text/css" />
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/jquery-3.2.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/pace.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/app.js') ?>"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_header') ?>
<div class="header">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#adminNav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">N2M Admin</a>
            </div>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="nav navbar-nav">
                    <?php
                    $links = [
                        'dashboard' => $router->generate('admin_dashboard_action'),
                        'system configuration' => $router->generate('configuration_index_action'),
                        'system statistics' => $router->generate('statistics_list_action'),
                        'display users' => $router->generate('admin_user_list_action'),
                        'new user' => $router->generate('admin_user_new_action')
                    ];

                    ?>
                    <?php foreach ($links as $label => $href): ?>
                        <li>
                            <a href="#" onclick="AdminUI.loadContent('<?php echo $href; ?>')"><?php echo $label; ?></a>
                        </li>                    
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<?php $view['UI']->stop(); ?>
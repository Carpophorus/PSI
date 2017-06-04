<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="NOOB 2 MASTER: your road to LoL mastery">
        <title><?php $view['UI']->output('title', 'N2M') ?></title>
        <?php $view['UI']->output('_styles'); ?>
        <?php $view['UI']->output('_scripts'); ?>
    </head>
    <body>
        <header>
            <?php $view['UI']->output('_header'); ?>
        </header>
        <div id="main-content">
            <?php $view['UI']->output('_content'); ?>            
        </div>
        <footer id="footer" class="panel-footer">
            <?php $view['UI']->output('_footer'); ?>
            <?php $view['UI']->output('_footer_scripts'); ?>
        </footer>
    </body>
</html>

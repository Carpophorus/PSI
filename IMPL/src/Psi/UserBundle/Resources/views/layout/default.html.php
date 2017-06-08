<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="NOOB 2 MASTER: your road to LoL mastery">
        <title><?php $view['UI']->output('title', 'N2M') ?></title>
        <link href="https://fonts.googleapis.com/css?family=Bangers|Oswald" rel="stylesheet">
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
        <footer>
            <?php $view['UI']->output('_footer'); ?>
            <?php $view['UI']->output('_footer_scripts'); ?>
        </footer>
    </body>
</html>

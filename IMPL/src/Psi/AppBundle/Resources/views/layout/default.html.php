<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="NOOB 2 MASTER: your road to LoL mastery">
        <title><?php $view['UI']->output('title', 'N2M') ?></title>
        <link href="https://fonts.googleapis.com/css?family=Bangers|Oswald" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/manifest.json">
        <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#960000">
        <meta name="theme-color" content="#ffffff">
        <?php $view['UI']->output('_styles'); ?>
        <?php $view['UI']->output('_scripts'); ?>
    </head>
    <body>
        <header>
            <?php $view['UI']->output('_header'); ?>
        </header>
        <div id="main-content">
            <?php $messages = $view['session']->getFlashes(); ?>
            <?php if ($messages && count($messages) > 0): ?>
                <div class="messages">
                    <?php foreach ($messages as $type => $flash_messages): ?>
                        <?php foreach ($flash_messages as $flash_message): ?>
                            <div class="flash-<?php echo $type ?>">
                                <?php echo $flash_message ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php $view['UI']->output('_content'); ?>
        </div>
        <footer>
            <?php $view['UI']->output('_footer'); ?>
            <?php $view['UI']->output('_footer_scripts'); ?>
        </footer>
    </body>
</html>

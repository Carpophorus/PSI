<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['UI']->output('title', 'N2M - Admin') ?></title>
        <?php $view['UI']->output('_styles'); ?>
        <?php $view['UI']->output('_scripts'); ?>
    </head>
    <body>
        <header>
            <?php $view['UI']->output('_header'); ?>
        </header>
        <div class="container">
            <div id="main-content">
                <div class="messages">
                    <?php foreach ($view['session']->getFlashes() as $type => $flash_messages): ?>
                        <?php foreach ($flash_messages as $flash_message): ?>
                            <div class="flash-<?php echo $type ?>">
                                <?php echo $flash_message ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>      
                </div>
                <?php $view['UI']->output('_content'); ?>            
            </div>
        </div>
        <footer>
            <?php $view['UI']->output('_footer'); ?>
            <?php $view['UI']->output('_footer_scripts'); ?>
        </footer>
    </body>
</html>

<div class="messages">
    <?php foreach ($view['session']->getFlashes() as $type => $flash_messages): ?>
        <?php foreach ($flash_messages as $flash_message): ?>
            <div class="flash-<?php echo $type ?>">
                <?php echo $flash_message ?>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>      
</div>
<div id="runes-bckgrnd"></div>
<div class="runes-container">
    <?php foreach ($runes as $slotId => $rune): ?>
        <?php
        if ($slotId < 10) {
            $class = "mark-" . $slotId;
        } elseif ($slotId >= 10 && $slotId < 20) {
            $class = "glyph-" . ($slotId - 10);
        } elseif ($slotId >= 20 && $slotId < 30) {
            $class = "seal-" . ($slotId - 20);
        } else {
            $class = "quint-" . ($slotId - 30);
        }

        ?>
        <div class="<?php echo $class; ?>">
            <img src="<?php echo $rune['file']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $rune['data']['description']; ?>" />
        </div>
    <?php endforeach; ?>
</div>


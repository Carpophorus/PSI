<div id="runes-bckgrnd"></div>
<div class="runes-container">
    <?php foreach ($runes as $slotId => $rune): ?>
        <?php
        if ($slotId < 10) {
            $class = "mark-" . $slotId;
        } elseif ($slotId >= 10 && $slotId < 19) {
            $class = "glyph-" . ($slotId - 9);
        } elseif ($slotId >= 19 && $slotId < 28) {
            $class = "seal-" . ($slotId - 18);
        } else {
            $class = "quint-" . ($slotId - 27);
        }

        ?>
        <div class="<?php echo $class; ?>">
            <img src="<?php echo $rune['file']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $rune['data']['description']; ?>" />
        </div>
    <?php endforeach; ?>
</div>

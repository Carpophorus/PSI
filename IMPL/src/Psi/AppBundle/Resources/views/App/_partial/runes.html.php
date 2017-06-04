<div id="runes-bckgrnd"></div>
<div class="runes-container">
    <?php foreach ($participant->getRunePage()->getRunes() as $index => $rune): ?>
        <?php
        if ($index < 10) {
            $class = "mark-" . $index;
        } elseif ($index >= 10 && $index < 20) {
            $class = "glyph-" . ($index - 10);
        } elseif ($index >= 20 && $index < 30) {
            $class = "seal-" . ($index - 20);
        } else {
            $class = "quint-" . ($index - 30);
        }

        ?>
        <div class="<?php echo $class; ?>">
            <img src="" />
        </div>
    <?php endforeach; ?>
</div>


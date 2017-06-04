<div class="<?php echo $wrapperClass; ?>">
    <div class="grayscale-champion-icon"></div>
    <div class="champion-icon-tint"></div>
    <div class="champion-mastery-icon"></div>
    <div class="champion-name"><?php echo $participant->getChampionId(); ?></div>
    <div class="summoner-name"><?php echo $participant->getName(); ?></div>
    <?php if (isset($renderAdvanced) && $renderAdvanced): ?>
        <div class="masteries-icon hidden"></div>
        <div class="runes-icon hidden"></div>
    <?php endif; ?>
    <div class="rank-solo"></div>
    <div class="rank-flex"></div>
    <div class="kda"></div>
</div>
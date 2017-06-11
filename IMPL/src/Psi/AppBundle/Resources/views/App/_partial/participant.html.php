<?php
/* @todo: refactor */
$renderAdvanced = true;

?>
<div class="<?php echo $wrapperClass; ?>">
    <div class="grayscale-champion-icon">
        <img src="<?php echo $static['file']['champion'][$participant->getChampionId()]; ?>" />
    </div>
    <div class="champion-icon-tint">
    </div>
    <div class="champion-mastery-icon"></div>
    <div class="summoner-icon"></div>
    <div class="summoner-spell-1"></div>
    <div class="summoner-spell-2"></div>
    <div class="champion-name"><?php echo $static['champion'][$participant->getChampionId()]['name']; ?></div>
    <div class="summoner-name"><?php echo $participant->getSummoner()->getName(); ?></div>
    <?php if (isset($renderAdvanced) && $renderAdvanced): ?>
        <div class="masteries-icon">
            <button onclick="App.getMasteries(<?php echo $participant->getId(); ?>);"></button>
        </div>
        <div class="runes-icon">
            <button onclick="App.getRunes(<?php echo $participant->getId(); ?>);"></button>
        </div>
    <?php endif; ?>
    <div id="summoner-runes-<?php echo $participant->getId(); ?>"></div>
    <div id="summoner-masteries-<?php echo $participant->getId(); ?>"></div>
    <?php /*
      <div class="rank-solo"></div>
      <div class="rank-flex"></div>
      <div class="kda"></div> */ ?>
</div>
